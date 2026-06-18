#!/bin/bash
echo "--- Iniciando provisionamiento de app01 ---"

# 1. Instalación de Python y pip
sudo apt update
sudo apt install -y python3 python3-pip

# 2. Instalación de Dependencias de Python
# El comando pip install Flask mysql-connector-python Flask-Cors
pip install Flask mysql-connector-python Flask-Cors

# 3. Copiar y Levantar el Servicio Backend
# Copia el script de la API al home o a un directorio de trabajo
cp /vagrant/api_alumnos.py /home/vagrant/
chown vagrant:vagrant /home/vagrant/api_alumnos.py

# El servicio backend se debe levantar: nohup python3 api_alumnos.py &
# Usamos 'su - vagrant' para ejecutar el comando como el usuario vagrant
# y 'nohup' para que el servicio siga corriendo después de que termine el provisionamiento.
su - vagrant -c "nohup python3 /home/vagrant/api_alumnos.py > /home/vagrant/api.log 2>&1 &"

echo "--- Provisionamiento de app01 completado ---"