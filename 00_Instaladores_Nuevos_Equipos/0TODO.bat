@echo off
setlocal
title Instalador Desatendido ASIR - Automatizacion de Equipos
color 0B

:: Forzar al script a trabajar en su propia carpeta (D:\2º_ASIR\...)
:: %~dp0 extrae la ruta completa de la carpeta donde reside este .bat
cd /d "%~dp0"

echo ==========================================================
echo    INSTALACION AUTOMATIZADA DE SOFTWARE (MODO QUIET)
echo ==========================================================
echo Directorio actual: %CD%
echo.

:: 1. 7-Zip (Instalador .exe de 64 bits)
echo [+] Instalando 7-Zip...
"7z2600-x64.exe" /S

:: 2. Google Chrome (Web Installer)
echo [+] Instalando Google Chrome...
"ChromeSetup.exe" /silent /install

:: 3. Mozilla Firefox
echo [+] Instalando Firefox...
"Firefox Installer.exe" -ms

:: 4. Java Runtime Environment (JRE)
echo [+] Instalando Java 8u481...
"jre-8u481-windows-i586-iftw.exe" /s

:: 5. .NET Framework 4.8.1 (Instalacion silenciosa sin reinicio)
echo [+] Instalando .NET Framework 4.8.1 (Tardara unos minutos)...
"NDP481-Web.exe" /q /norestart

:: 6. Microsoft Office (Instaladores segmentados)
echo [+] Instalando Componentes de Office...
start /wait "" "Office_01.exe" /quiet
start /wait "" "Office_02.exe" /quiet
start /wait "" "Office_03.exe" /quiet

:: 7. Python (Para todos los usuarios y en el PATH)
echo [+] Instalando Python 3.14.3...
"python-3.14.3-amd64.exe" /quiet InstallAllUsers=1 PrependPath=1

:: 8. Adobe Acrobat Reader
echo [+] Instalando Adobe Reader...
"Reader_es_install.exe" /sAll /rs

:: 9. Visual C++ Runtimes (Usando pushd/popd para evitar errores de ruta)
echo [+] Instalando Visual C++ Runtimes All-in-One...
if exist "Visual-C-Runtimes-All-in-One-Dec-2025" (
    pushd "Visual-C-Runtimes-All-in-One-Dec-2025"
    call install_all.bat
    popd
) else (
    echo [!] ERROR: No se encontro la carpeta de Visual C++
)

:: 10. VLC Media Player
echo [+] Instalando VLC Media Player...
"vlc-3.0.23-win32.exe" /S

:: 11. VSCodium
echo [+] Instalando VSCodium...
"VSCodiumSetup-x64-1.112.01907.exe" /VERYSILENT /MERGETASKS=!runcode

echo.
echo ==========================================================
echo    PROCESO COMPLETADO EXITOSAMENTE
echo ==========================================================
echo.
pause
exit