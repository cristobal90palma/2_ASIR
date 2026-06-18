#!/bin/bash

API_KEY="376d28bee73649299b91db045a44d32d"
JELLYFIN_URL="http://localhost:8096"
PLANTILLA="Plantilla_2_ASIR"
CSV_FILE="2ASIR.csv"

echo "================================"
echo " SINCRONIZACIÓN MASIVA DE USUARIOS"
echo "================================"

# Obtener usuarios y plantilla
USER_DATA=$(curl -s "$JELLYFIN_URL/Users" -H "X-Emby-Token: $API_KEY")
PLANTILLA_ID=$(echo "$USER_DATA" | jq -r '.[] | select(.Name=="'"$PLANTILLA"'") | .Id')

if [ -z "$PLANTILLA_ID" ] || [ "$PLANTILLA_ID" == "null" ]; then
    echo "❌ No se encontró la plantilla: $PLANTILLA"
    exit 1
fi

# Obtener los datos maestros de la plantilla
PLANTILLA_FULL=$(curl -s "$JELLYFIN_URL/Users/$PLANTILLA_ID" -H "X-Emby-Token: $API_KEY")
PLANTILLA_POLICY=$(echo "$PLANTILLA_FULL" | jq -c '.Policy | .EnableAllFolders=false')
PLANTILLA_CONFIG=$(curl -s "$JELLYFIN_URL/Users/$PLANTILLA_ID/Configuration" -H "X-Emby-Token: $API_KEY")

TOTAL=0
MODIFICADOS=0

while IFS=, read -r username password email
do
    # Limpieza
    username=$(echo "$username" | tr -d '\r' | xargs)
    password=$(echo "$password" | tr -d '\r' | xargs)
    if [ -z "$username" ] || [ "$username" == "Nombre" ]; then continue; fi

    TOTAL=$((TOTAL+1))
    EXISTE=$(echo "$USER_DATA" | jq -r ".[] | select(.Name==\"$username\") | .Id")

    # 1. Crear usuario si no existe
    if [ -z "$EXISTE" ] || [ "$EXISTE" == "null" ]; then
        echo "--> Creando usuario: $username"
        RESPONSE=$(curl -s -X POST "$JELLYFIN_URL/Users/New" \
            -H "X-Emby-Token: $API_KEY" \
            -H "Content-Type: application/json" \
            -d "{\"Name\":\"$username\"}")
        EXISTE=$(echo "$RESPONSE" | jq -r '.Id')
        
        # Asignar contraseña inicial
        PW_JSON=$(jq -n --arg pw "$password" '{"CurrentPw":"","NewPw":$pw}')
        curl -s -X POST "$JELLYFIN_URL/Users/$EXISTE/Password" -H "X-Emby-Token: $API_KEY" -H "Content-Type: application/json" -d "$PW_JSON" > /dev/null
    else
        echo "--> Actualizando usuario: $username"
    fi

    # 2. Aplicar Política (Bibliotecas y permisos)
    curl -s -X POST "$JELLYFIN_URL/Users/$EXISTE/Policy" -H "X-Emby-Token: $API_KEY" -H "Content-Type: application/json" -d "$PLANTILLA_POLICY" > /dev/null
    
    # 3. Aplicar Configuración (Idioma, subtítulos, etc.)
    curl -s -X POST "$JELLYFIN_URL/Users/$EXISTE/Configuration" -H "X-Emby-Token: $API_KEY" -H "Content-Type: application/json" -d "$PLANTILLA_CONFIG" > /dev/null

    echo "✔ Sincronizado: $username"
    MODIFICADOS=$((MODIFICADOS+1))

done < <(tail -n +2 "$CSV_FILE")

echo "================================"
echo "Proceso finalizado. Total: $MODIFICADOS"
