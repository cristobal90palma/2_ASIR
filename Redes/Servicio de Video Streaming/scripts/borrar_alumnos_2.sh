#!/bin/bash

API_KEY="b459c9766f9841d6bc0e1039c62df4bc"
JELLYFIN_URL="http://localhost:8096"
CSV_FILE="alumnos_2.csv"

echo "==============================="
echo " BORRADO MASIVO DE USUARIOS"
echo "==============================="

# Obtener lista actual de usuarios para buscar sus IDs
USER_DATA=$(curl -s "$JELLYFIN_URL/Users" -H "X-Emby-Token: $API_KEY")

if [ -z "$USER_DATA" ]; then
  echo "❌ No se pudo conectar con Jellyfin o la API Key es incorrecta."
  exit 1
fi

echo "Procesando archivo $CSV_FILE..."
echo ""

BORRADOS=0
NO_ENCONTRADOS=0

# Leer CSV saltando la cabecera
tail -n +2 "$CSV_FILE" | while IFS=, read -r username password email
do
  # Limpiar espacios en blanco (igual que en el script de creación)
  username=$(echo "$username" | xargs)
  
  if [ -z "$username" ]; then continue; fi

  # Buscar el ID del usuario basado en el nombre
  USER_ID=$(echo "$USER_DATA" | jq -r ".[] | select(.Name==\"$username\") | .Id")

  if [ -n "$USER_ID" ] && [ "$USER_ID" != "null" ]; then
    echo "🗑️ Borrando usuario: $username (ID: $USER_ID)..."
    
    # Petición DELETE a la API
    RESPONSE_CODE=$(curl -s -o /dev/null -w "%{http_code}" -X DELETE "$JELLYFIN_URL/Users/$USER_ID" \
    -H "X-Emby-Token: $API_KEY")

    if [ "$RESPONSE_CODE" == "204" ] || [ "$RESPONSE_CODE" == "200" ]; then
      echo "✅ Usuario eliminado."
      BORRADOS=$((BORRADOS+1))
    else
      echo "❌ Error al borrar (HTTP $RESPONSE_CODE)."
    fi
  else
    echo "⚠️ Usuario no encontrado en el servidor: $username"
    NO_ENCONTRADOS=$((NO_ENCONTRADOS+1))
  fi

done

echo ""
echo "==============================="
echo "Limpieza terminada"
echo "==============================="
echo "Usuarios borrados: $BORRADOS"
echo "Usuarios no encontrados: $NO_ENCONTRADOS"
