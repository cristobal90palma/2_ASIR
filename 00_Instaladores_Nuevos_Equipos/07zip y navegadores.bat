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


echo.
echo [OK] Proceso finalizado correctamente.
pause