# 1️. BASE Y VARIABLES INICIALES
FROM ubuntu:22.04
ENV DEBIAN_FRONTEND=noninteractive

# 2. ARGUMENTOS DE CONSTRUCCIÓN
ARG SSH_USER=user
ARG SSH_PASSWORD=pass
ARG DB_USER=dbadmin
ARG DB_PASSWORD=dbpass
ARG DB_NAME=prueba_db

# 3️. VARIABLES DE ENTORNO PARA CMD / INIT
ENV SSH_USER=${SSH_USER} \
    SSH_PASSWORD=${SSH_PASSWORD} \
    DB_USER=${DB_USER} \
    DB_PASSWORD=${DB_PASSWORD} \
    DB_NAME=${DB_NAME}

# 4️. INSTALACIÓN DE PROGRAMAS
RUN apt-get update && apt-get install -y \
    openssh-server \
    mysql-server \
    postgresql \
    sudo \
    && rm -rf /var/lib/apt/lists/*

# 5️. CONFIGURACIÓN DE SSH Y USUARIO
RUN mkdir -p /var/run/sshd && \
    useradd -rm -d /home/${SSH_USER} -s /bin/bash -g root -G sudo -u 1000 ${SSH_USER} && \
    echo "${SSH_USER}:${SSH_PASSWORD}" | chpasswd
EXPOSE 22

# 6️. CONFIGURACIÓN DE BASES DE DATOS (puertos y accesos)
# --- MySQL: Puerto 3307 y conexiones externas ---
RUN sed -i 's/127.0.0.1/0.0.0.0/g' /etc/mysql/mysql.conf.d/mysqld.cnf && \
    sed -i 's/port\s*=.*/port = 3307/' /etc/mysql/mysql.conf.d/mysqld.cnf
EXPOSE 3307

# --- PostgreSQL: Puerto 5433 y conexiones externas ---
RUN sed -i "s/#listen_addresses = 'localhost'/listen_addresses = '*'/g" /etc/postgresql/14/main/postgresql.conf && \
    sed -i "s/port = 5432/port = 5433/" /etc/postgresql/14/main/postgresql.conf && \
    echo "host all all 0.0.0.0/0 md5" >> /etc/postgresql/14/main/pg_hba.conf
EXPOSE 5433

# 7️. SCRIPT DE INICIALIZACIÓN
COPY init.sh /init.sh
RUN chmod +x /init.sh

# 8️. CMD FINAL
CMD ["/init.sh"]
