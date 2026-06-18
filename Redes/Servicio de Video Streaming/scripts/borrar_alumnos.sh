#!/bin/bash

# Configuración
API_KEY="b459c9766f9841d6bc0e1039c62df4bc"
JELLYFIN_URL="http://localhost:8096"
CSV_FILE="alumnos.csv"

echo "==============================="
echo " BORRADO MASIVO DE USUARIOS"
echo "==============================="

# Obtener lista actual de usuarios del servidor
USER_DATA=$(curl -s "$JELLYFIN_URL/Users" -H "X-Emby-Token: $API_KEY")

if [ -z "$USER_DATA" ]; then
  echo "❌ Error: No se pudo conectar con Jellyfin. Verifica la API_KEY y la URL."
  exit 1
fi

echo "Procesando archivo $CSV_FILE..."
echo ""

BORRADOS=0
NO_ENCONTRADOS=0

# Usamos < <(comando) para evitar subshell y que los contadores se actualicen bien
while IFS=, read -r username password email
do
  # Limpiar espacios y caracteres invisibles de fin de línea de Windows (\r)
  username=$(echo "$username" | tr -d '\r' | xargs)
  
  if [ -z "$username" ] || [ "$username" == "Username" ]; then continue; fi

  # Buscar el ID del usuario en la lista descargada
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

done < <(tail -n +2 "$CSV_FILE")

echo ""
echo "==============================="
echo "Limpieza terminada"
echo "==============================="
echo "Usuarios borrados: $BORRADOS"
echo "Usuarios no encontrados: $NO_ENCONTRADOS"
