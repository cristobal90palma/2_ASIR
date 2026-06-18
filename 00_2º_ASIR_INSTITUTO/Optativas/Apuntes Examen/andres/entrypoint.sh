#!/bin/bash

echo "Iniciando script de entrada..."

# 1. Arreglar el socket de MySQL
# Este directorio es temporal y se borra, por eso
# debemos crearlo en cada inicio del contenedor.
echo "Creando directorio para socket MySQL..."
mkdir -p /var/run/mysqld
chown mysql:mysql /var/run/mysqld

# 2. Iniciar los servicios
echo "Iniciando PostgreSQL..."
service postgresql start

echo "Iniciando MySQL..."
service mysql start

echo "Iniciando SSH..."
service ssh start

echo "--- Servicios iniciados. El contenedor está listo. ---"

# 3. Mantener el contenedor vivo
# Esta es la parte clave: el script no debe terminar,
# o el contenedor se detendrá.
tail -f /dev/null
