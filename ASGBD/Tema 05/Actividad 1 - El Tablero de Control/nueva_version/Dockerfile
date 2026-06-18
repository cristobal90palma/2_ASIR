# Usamos Ubuntu 24.04. Alpine me daba problemas con el sysbench
FROM ubuntu:24.04

# Evitar prompts interactivos durante la instalación
ENV DEBIAN_FRONTEND=noninteractive

# Instalar dependencias usando apt
RUN apt-get update && apt-get install -y \
    sysbench \
    mariadb-client \
    bash \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /workdir

# Copiar el script
COPY run-stress.sh .

# Corregir formato de línea (CRLF a LF) y dar permisos
# Instalamos 'sed' explícitamente si fuera necesario, aunque Ubuntu ya lo trae
RUN sed -i 's/\r$//' run-stress.sh && \
    chmod +x run-stress.sh

# Ejecutar el script y mantener el contenedor vivo
CMD ["/bin/bash", "-c", "./run-stress.sh; tail -f /dev/null"]