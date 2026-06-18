#!/bin/bash

# Definir la ruta base
BASE_DIR="/video_streaming"

echo "--- 🛠️  Iniciando RECONSTRUCCIÓN de servicios ---"

# 1. Proxy (Nginx Proxy Manager)
echo "Reconstruyendo Proxy..."
cd $BASE_DIR/proxy && docker compose up -d --force-recreate

# 2. Jitsi (Con todos sus archivos YAML específicos)
echo "Reconstruyendo Jitsi (Web, JVB, Jibri, Whiteboard, Etherpad)..."
cd $BASE_DIR/jitsi/jitsi-docker-jitsi-meet-35879bb && \
docker compose -f docker-compose.yml -f whiteboard.yml -f etherpad.yml -f jibri.yml up -d --force-recreate

# 3. Jellyfin / Owncast (Forzamos build por si hay cambios en el recorder)
echo "Reconstruyendo Jellyfin y Owncast Recorder..."
cd $BASE_DIR/jellyfin_owncast && docker compose up -d --force-recreate --build

echo "--- ✅ Reconstrucción finalizada. Verificando estado ---"

sleep 3
docker ps --format "table {{.Names}}\t{{.Status}}\t{{.Image}}"
