FROM ubuntu:22.04

# Instalar Ansible y dependencias
RUN apt-get update && apt-get install -y \
    ansible \
    openssh-client \
    sshpass \
    nano \
    iputils-ping \
    && rm -rf /var/lib/apt/lists/*

# Crear directorio de trabajo
WORKDIR /ansible

COPY proyecto1 /ansible/proyecto2

# Mantener el contenedor activo
CMD ["tail", "-f", "/dev/null"]