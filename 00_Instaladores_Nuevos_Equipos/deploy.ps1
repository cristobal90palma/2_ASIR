# Script de despliegue Notepad++ con icono garantizado
$Installer = "npp_setup.exe"
$NppPath = "C:\Program Files\Notepad++"
$LogFile = "C:\Windows\Temp\NPP_Installation.log"

Write-Output "--- Instalando Notepad++ con Acceso Directo ---" | Out-File $LogFile

# /S: Silencioso
# /noUpdater: Sin actualizaciones molestas
# /closeRunningNpp: Cierra versiones viejas
# /D: Ruta de instalación (Debe ser el último argumento según el manual)
$Arguments = "/S /noUpdater /closeRunningNpp /D=$NppPath"

try {
    $Process = Start-Process -FilePath $Installer -ArgumentList $Arguments -Wait -PassThru
    
    if ($Process.ExitCode -eq 0) {
        Write-Output "Instalación exitosa. Verificando acceso directo..." | Out-File $LogFile -Append
        
        # Ruta del acceso directo en el escritorio público (para que lo vean TODOS los usuarios)
        $DesktopPath = "$env:Public\Desktop\Notepad++.lnk"
        $ExePath = "$NppPath\notepad++.exe"

        # Si el instalador no creó el icono, lo creamos nosotros por script
        if (-not (Test-Path $DesktopPath)) {
            $WshShell = New-Object -ComObject WScript.Shell
            $Shortcut = $WshShell.CreateShortcut($DesktopPath)
            $Shortcut.TargetPath = $ExePath
            $Shortcut.WorkingDirectory = $NppPath
            $Shortcut.Save()
            Write-Output "Acceso directo creado manualmente por script." | Out-File $LogFile -Append
        } else {
            Write-Output "El instalador ya creó el acceso directo." | Out-File $LogFile -Append
        }
        exit 0
    } else {
        exit $Process.ExitCode
    }
} catch {
    Write-Output "Error: $_" | Out-File $LogFile -Append
    exit 1
}