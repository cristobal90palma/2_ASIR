FROM ubuntu:22.04

# Instalar SSH y Python
RUN apt-get update && apt-get install -y \
    openssh-server \
    python3 \
    && rm -rf /var/lib/apt/lists/*

# Configurar SSH
RUN mkdir /var/run/sshd
# Crear usuario 'ansible' con contraseña 'password'
RUN useradd -m -s /bin/bash ansible && \
    echo "ansible:password" | chpasswd

# Permitir acceso root por SSH (opcional, para laboratorios)
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# Exponer puerto 22
EXPOSE 22

CMD ["/usr/sbin/sshd", "-D"]