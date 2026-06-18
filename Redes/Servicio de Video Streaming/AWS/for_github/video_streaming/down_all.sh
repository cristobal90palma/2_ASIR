#!/bin/bash

# Definir la ruta base
BASE_DIR="/video_streaming"

echo "--- Iniciando el apagado de servicios ---"

# 1. Jitsi (con sus archivos específicos)
echo "Parando Jitsi..."
cd $BASE_DIR/jitsi/jitsi-docker-jitsi-meet-35879bb && docker compose -f docker-compose.yml -f whiteboard.yml -f etherpad.yml -f jibri.yml down

# 2. Jellyfin / Owncast
echo "Parando Jellyfin/Owncast..."
cd $BASE_DIR/jellyfin_owncast && docker compose down

# 3. Proxy
echo "Parando Proxy..."
cd $BASE_DIR/proxy && docker compose down

echo "--- Verificando estado final ---"

# Mostrar si queda algún contenedor corriendo
RUNNING=$(docker ps -q)

if [ -z "$RUNNING" ]; then
    echo "✅ Todos los contenedores se han detenido correctamente."
else
    echo "⚠️  Atención: Aún hay contenedores activos:"
    docker ps --format "table {{.Names}}\t{{.Status}}\t{{.Ports}}"
fi
