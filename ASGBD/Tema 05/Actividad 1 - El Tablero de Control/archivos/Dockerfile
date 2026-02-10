FROM alpine:latest

# Instalar dependencias
RUN apk add --no-cache sysbench mysql-client bash

WORKDIR /workdir

# Copiar y dar permisos al script
COPY run-stress.sh /workdir/run-stress.sh
RUN chmod +x /workdir/run-stress.sh

# Limpiar formato Windows-Linux
RUN sed -i 's/\r$//' run-stress.sh

# Ejecutar el script al iniciar
CMD ["./run-stress.sh"]

# Ejecutar el script y LUEGO el bucle infinito, pase lo que pase
CMD /bin/bash -c "./run-stress.sh; echo 'El script ha terminado o fallado'; tail -f /dev/null"