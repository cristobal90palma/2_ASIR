#!/bin/bash
echo "--- Iniciando provisionamiento de db01 ---"

# 1. Instalación de MySQL Server
sudo apt update
sudo apt install -y mysql-server

# 2. Configuración de Acceso Remoto
# Cambiar el 'bind-address' para que escuche en la IP privada (192.168.56.30)
# Esto permite que app01 se conecte, pero no es accesible desde la red por defecto (0.0.0.0)
# Si usas una versión moderna de MySQL/MariaDB, a menudo el bind-address está en el archivo .cnf
sudo sed -i "s/127\.0\.0\.1/0\.0\.0\.0/g" /etc/mysql/mysql.conf.d/mysqld.cnf
sudo systemctl restart mysql

# 3. Creación de Base de Datos e Importación
# Se asume que el usuario y la contraseña por defecto son root sin password para la conexión local.
# **IMPORTANTE**: Ajusta la seguridad y credenciales en un entorno real.
mysql -u root -e "CREATE DATABASE IF NOT EXISTS app_db;"
mysql -u root app_db < /vagrant/bbdd.sql # Cargar el script adjunto

# 4. Creación de Usuario con Acceso Restringido (Solo desde app01)
# Se crea un usuario 'app_user' que solo puede conectarse desde la IP de app01 (192.168.56.20)
mysql -u root -e "CREATE USER 'app_user'@'192.168.56.20' IDENTIFIED BY 'mi_password_segura';"
mysql -u root -e "GRANT ALL PRIVILEGES ON app_db.* TO 'app_user'@'192.168.56.20';"
mysql -u root -e "FLUSH PRIVILEGES;"

echo "--- Provisionamiento de db01 completado ---"