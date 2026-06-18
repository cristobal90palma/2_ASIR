#!/bin/bash

# Definir la ruta base
BASE_DIR="/video_streaming"

echo "--- Iniciando el despliegue de servicios ---"

# 1. Proxy (Normalmente es mejor subir el proxy primero)
echo "Levantando Proxy..."
cd $BASE_DIR/proxy && docker compose up -d

# 2. Jitsi
echo "Levantando Jitsi..."
cd $BASE_DIR/jitsi/jitsi-docker-jitsi-meet-35879bb && docker compose -f docker-compose.yml -f whiteboard.yml -f etherpad.yml -f jibri.yml up -d

# 3. Jellyfin / Owncast
echo "Levantando Jellyfin/Owncast..."
cd $BASE_DIR/jellyfin_owncast && docker compose up -d

echo "--- Verificando que todo esté arriba ---"

# Esperamos 2 segundos para que Docker procese el arranque
sleep 2

# Mostrar tabla de contenedores activos
docker ps --format "table {{.Names}}\t{{.Status}}\t{{.Ports}}"
