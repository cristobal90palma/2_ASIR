#!/bin/bash
echo "Instalando Nginx..."
sudo apt update
sudo apt install -y nginx
sudo systemctl start nginx
sudo systemctl enable nginx
echo "He instalado nginx, como mola."