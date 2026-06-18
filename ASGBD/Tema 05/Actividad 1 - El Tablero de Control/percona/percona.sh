docker run --detach --restart always --publish 443:443 -v pmm-data:/srv --name pmm-server percona/pmm-server:2




docker run -d --restart always --publish 443:443 --publish 80:80 -v pmm-data:/srv --name pmm-server percona/pmm-server:2

docker run -d --restart always --publish 443:443 -v pmm-data:/srv --name pmm-server percona/pmm-server:2


  pmm-server:
    image: percona/pmm-server:latest
    container_name: pmm-server
    hostname: pmm-server
    restart: always
    # Exponemos los puertos para ver el panel web
    ports:
      - "80:80"   # Acceso HTTP
      - "443:443" # Acceso HTTPS
    # Volumen para que no pierdas los datos de las gráficas al reiniciar
    volumes:
      - pmm-data:/srv