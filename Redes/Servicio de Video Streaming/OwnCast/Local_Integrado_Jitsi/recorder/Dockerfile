FROM alpine:latest

# Instalamos ffmpeg, curl, bash y coreutils (para un ls más robusto)
RUN apk add --no-cache ffmpeg curl bash coreutils

WORKDIR /app

# Copiamos el script al contenedor
COPY owncast_stream_recorder.sh .
RUN chmod +x owncast_stream_recorder.sh

# Creamos la carpeta de grabaciones dentro del contenedor
RUN mkdir /recordings

# Ejecutamos el script
CMD ["./owncast_stream_recorder.sh"]
