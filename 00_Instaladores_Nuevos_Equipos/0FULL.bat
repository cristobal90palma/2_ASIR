@echo off
setlocal
title Instalacion Desatendida de Software - ASIR
echo Iniciando instalacion silenciosa... Por favor, espere.
echo.

:: 1. 7-Zip
echo [+] Instalando 7-Zip...
"7z2600-x64.exe" /S

:: 2. Google Chrome
echo [+] Instalando Google Chrome...
"ChromeSetup.exe" /silent /install

:: 3. Mozilla Firefox
echo [+] Instalando Firefox...
"Firefox Installer.exe" -ms

:: 4. Java Runtime Environment (JRE)
echo [+] Instalando Java...
"jre-8u481-windows-i586-iftw.exe" /s

:: 5. .NET Framework 4.8.1
echo [+] Instalando .NET Framework (Esto puede tardar)...
"NDP481-Web.exe" /q /norestart

:: 6. Microsoft Office (Suponiendo que son instaladores tipo Click-to-Run o personalizados)
echo [+] Instalando Office Partes 1, 2 y 3...
start /wait "" "Office_01.exe" /quiet
start /wait "" "Office_02.exe" /quiet
start /wait "" "Office_03.exe" /quiet

:: 7. Python (Instalacion para todos los usuarios y en el PATH)
echo [+] Instalando Python 3.14...
"python-3.14.3-amd64.exe" /quiet InstallAllUsers=1 PrependPath=1

:: 8. Adobe Reader
echo [+] Instalando Adobe Reader...
"Reader_es_install.exe" /sAll /rs

:: 9. Visual C++ Runtimes (Usando el script incluido en su carpeta)
echo [+] Instalando Visual C++ Runtimes All-in-One...
cd "Visual-C-Runtimes-All-in-One-Dec-2025"
call install_all.bat
cd ..

:: 10. VLC Media Player
echo [+] Instalando VLC...
"vlc-3.0.23-win32.exe" /S

:: 11. VSCodium
echo [+] Instalando VSCodium...
"VSCodiumSetup-x64-1.112.01907.exe" /VERYSILENT /MERGETASKS=!runcode

echo.
echo [OK] Proceso finalizado correctamente.
pause