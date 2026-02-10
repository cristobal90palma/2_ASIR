# 1. Imagen base
FROM ubuntu:22.04

# 2. Configurar entorno para instalación no interactiva
ENV DEBIAN_FRONTEND=noninteractive

# 3. Argumentos de build (con el puerto MySQL 3307 por defecto)
ARG DB_USER=admin
ARG DB_PASS=admin123
ARG SSH_PASS=sshpass123
ARG MYSQL_PORT=3307
ARG PG_PORT=5433

# 4. Actualizar e instalar todo el software necesario
RUN apt-get update && apt-get install -y \
    openssh-server \
    mysql-server \
    postgresql \
    postgresql-contrib \
    sudo \
    sed \
    && rm -rf /var/lib/apt/lists/*

# 5. Configurar SSH
RUN mkdir /var/run/sshd
RUN echo "root:${SSH_PASS}" | chpasswd
RUN sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# 6. Configurar MySQL
# CORREGIDO: Método de 2 pasos (Borrar y Añadir)
# 1. Borramos cualquier línea existente de 'bind-address' y 'port'
RUN sed -i "/^#\?bind-address/d" /etc/mysql/mysql.conf.d/mysqld.cnf && \
    sed -i "/^#\?port/d" /etc/mysql/mysql.conf.d/mysqld.cnf && \
# 2. Añadimos las líneas correctas bajo [mysqld]
    sed -i "/\[mysqld\]/a bind-address = 0.0.0.0" /etc/mysql/mysql.conf.d/mysqld.cnf && \
    sed -i "/\[mysqld\]/a port = ${MYSQL_PORT}" /etc/mysql/mysql.conf.d/mysqld.cnf

# Crear el usuario de MySQL en tiempo de construcción
RUN service mysql start && \
    # Espera breve a que el socket esté listo
    sleep 5 && \
    mysql -e "CREATE USER '${DB_USER}'@'%' IDENTIFIED BY '${DB_PASS}';" && \
    mysql -e "GRANT ALL PRIVILEGES ON *.* TO '${DB_USER}'@'%' WITH GRANT OPTION;" && \
    mysql -e "FLUSH PRIVILEGES;" && \
    service mysql stop

# 7. Configurar PostgreSQL
RUN PG_VERSION=$(ls /etc/postgresql/ | head -n 1) && \
    PG_CONF="/etc/postgresql/${PG_VERSION}/main/postgresql.conf" && \
    PG_HBA="/etc/postgresql/${PG_VERSION}/main/pg_hba.conf" && \
    sed -i "s/#listen_addresses\s*=\s*'localhost'/listen_addresses = '*'/" ${PG_CONF} && \
    sed -i "s/listen_addresses\s*=\s*'localhost'/listen_addresses = '*'/" ${PG_CONF} && \
    sed -i "s/port\s*=\s*5432/port = ${PG_PORT}/" ${PG_CONF} && \
    echo "host    all             all             0.0.0.0/0               md5" >> ${PG_HBA}

# Crear el usuario de PostgreSQL en tiempo de construcción
RUN service postgresql start && \
    sleep 5 && \
    sudo -u postgres psql -c "CREATE USER ${DB_USER} WITH PASSWORD '${DB_PASS}';" && \
    sudo -u postgres psql -c "ALTER USER ${DB_USER} CREATEDB;" && \
    sudo -u postgres psql -c "CREATE DATABASE ${DB_USER} OWNER ${DB_USER};" && \
    service postgresql stop

# 8. Script de Entrada (NUEVO)
# Copiamos el script al contenedor
COPY entrypoint.sh /entrypoint.sh
# Le damos permisos de ejecución
RUN chmod +x /entrypoint.sh

# 9. Exponer Puertos (usando los ARGs)
EXPOSE 22
EXPOSE ${MYSQL_PORT}
EXPOSE ${PG_PORT}

# 10. ENTRYPOINT (NUEVO)
# Especificamos el script que debe ejecutar el contenedor al iniciar
ENTRYPOINT ["/entrypoint.sh"]
