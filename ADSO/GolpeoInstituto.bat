@echo off
REM --- Ejecutar nmap (asegúrate de tener nmap en el PATH y ejecutar este .bat como Administrador para -sS) ---
echo Ejecutando nmap...
nmap -r -p 42101,58156,26457 -sS proxmox.institutodh.net

REM --- Lanzar OpenVPN Connect (ruta con espacios entre comillas) ---
echo Lanzando OpenVPN Connect...
start "" "C:\Program Files\OpenVPN Connect\OpenVPNConnect.exe"

echo.
echo Proceso finalizado. Pulsa una tecla para continuar...
pause
