FROM alpine:latest

# Instalar dependencias
RUN apk add --no-cache sysbench mysql-client bash

WORKDIR /workdir

# Copiar y dar permisos al script
COPY run-stress.sh /workdir/run-stress.sh
RUN chmod +x /workdir/run-stress.sh

# Ejecutar el script al iniciar
CMD ["./run-stress.sh"]