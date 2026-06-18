#!/bin/bash

API_KEY="376d28bee73649299b91db045a44d32d"
JELLYFIN_URL="http://localhost:8096"
PLANTILLA="Plantilla_2_ASIR"
CSV_FILE="2ASIR.csv"

echo "================================"
echo " CREACIÓN MASIVA DE USUARIOS"
echo "================================"

# Obtener usuarios existentes
USER_DATA=$(curl -s "$JELLYFIN_URL/Users" -H "X-Emby-Token: $API_KEY")

# Buscar plantilla
PLANTILLA_ID=$(echo "$USER_DATA" | jq -r '.[] | select(.Name=="'"$PLANTILLA"'") | .Id')

if [ -z "$PLANTILLA_ID" ] || [ "$PLANTILLA_ID" == "null" ]; then
    echo "❌ No se encontró la plantilla: $PLANTILLA"
    exit 1
fi

echo "✔ Plantilla encontrada (ID: $PLANTILLA_ID)"

# Obtener configuración completa de la plantilla
PLANTILLA_FULL=$(curl -s "$JELLYFIN_URL/Users/$PLANTILLA_ID" -H "X-Emby-Token: $API_KEY")

# EXTRAEMOS LA POLÍTICA Y FORZAMOS LOS CAMPOS CLAVE PARA BIBLIOTECAS
# 1. Obtenemos la política base
# 2. Forzamos EnableAllFolders a false
# 3. Nos aseguramos de que EnabledFolders contenga los IDs de la plantilla
MOD_POLICY=$(echo "$PLANTILLA_FULL" | jq -c '.Policy | .EnableAllFolders=false')

echo ""
echo "Bibliotecas permitidas (IDs):"
echo "$MOD_POLICY" | jq '.EnabledFolders'
echo ""

TOTAL=0
CREADOS=0
EXISTENTES=0

# Procesar el CSV
while IFS=, read -r username password email
do
    TOTAL=$((TOTAL+1))

    # Limpieza de strings y saltos de línea de Windows (\r)
    username=$(echo "$username" | tr -d '\r' | xargs)
    password=$(echo "$password" | tr -d '\r' | xargs)

    if [ -z "$username" ]; then continue; fi

    echo "--------------------------------"
    echo "Procesando: $username"

    # Comprobar si existe
    EXISTE=$(echo "$USER_DATA" | jq -r ".[] | select(.Name==\"$username\") | .Id")

    if [ -n "$EXISTE" ] && [ "$EXISTE" != "null" ]; then
        echo "⚠ Usuario ya existe"
        EXISTENTES=$((EXISTENTES+1))
        continue
    fi

    # 1. Crear usuario
    RESPONSE=$(curl -s -X POST "$JELLYFIN_URL/Users/New" \
        -H "X-Emby-Token: $API_KEY" \
        -H "Content-Type: application/json" \
        -d "{\"Name\":\"$username\"}")

    USER_ID=$(echo "$RESPONSE" | jq -r '.Id')

    if [ "$USER_ID" == "null" ] || [ -z "$USER_ID" ]; then
        echo "❌ Error creando usuario"
        continue
    fi

    echo "✔ Usuario creado (ID: $USER_ID)"

    # 2. Asignar contraseña (usando jq para escapar caracteres especiales)
    PW_JSON=$(jq -n --arg pw "$password" '{"CurrentPw":"","NewPw":$pw}')
    curl -s -X POST "$JELLYFIN_URL/Users/$USER_ID/Password" \
        -H "X-Emby-Token: $API_KEY" \
        -H "Content-Type: application/json" \
        -d "$PW_JSON" > /dev/null

    echo "✔ Contraseña asignada"

    # 3. Aplicar Política (Esto define el acceso a bibliotecas)
    # Importante: Usamos POST o PUT según la versión, pero enviamos el MOD_POLICY completo
    curl -s -X POST "$JELLYFIN_URL/Users/$USER_ID/Policy" \
        -H "X-Emby-Token: $API_KEY" \
        -H "Content-Type: application/json" \
        -d "$MOD_POLICY" > /dev/null

    echo "✔ Bibliotecas y permisos aplicados"

    CREADOS=$((CREADOS+1))

done < <(tail -n +2 "$CSV_FILE")

echo ""
echo "================================"
echo "             RESUMEN"
echo "================================"
echo "Usuarios procesados : $TOTAL"
echo "Usuarios creados    : $CREADOS"
echo "Usuarios existentes : $EXISTENTES"
