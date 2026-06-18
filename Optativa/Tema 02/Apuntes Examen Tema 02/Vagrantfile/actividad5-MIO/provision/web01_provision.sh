#!/bin/bash
echo "--- Iniciando provisionamiento de web01 ---"

# 1. Instalación de Nginx
sudo apt update
sudo apt install -y nginx

# 2. Configuración de Nginx
# Eliminar la configuración por defecto
sudo rm /etc/nginx/sites-enabled/default

# Crear un archivo de configuración para Nginx que actúe como Proxy Inverso
# Hacemos que escuche en el puerto 80 y redirija las peticiones a la API en app01 (192.168.56.20:5000)
# Se asume que api_alumnos.py corre en el puerto 5000 por defecto.

NGINX_CONF="/etc/nginx/sites-available/app_proxy.conf"
cat << EOF | sudo tee $NGINX_CONF
server {
    listen 80;
    server_name web01;

    location / {
        root /var/www/html;
        index index.html;
    }

    # Redirige las peticiones de API al servidor de aplicaciones
    location /api/ {
        proxy_pass http://192.168.56.20:5000;
        proxy_set_header Host \$host;
        proxy_set_header X-Real-IP \$remote_addr;
    }
}
EOF

# Habilitar la configuración
sudo ln -s $NGINX_CONF /etc/nginx/sites-enabled/

# 3. Añadir index.html adjunto
sudo cp /vagrant/index.html /var/www/html/index.html

# 4. Reiniciar Nginx
sudo systemctl restart nginx

echo "--- Provisionamiento de web01 completado ---"