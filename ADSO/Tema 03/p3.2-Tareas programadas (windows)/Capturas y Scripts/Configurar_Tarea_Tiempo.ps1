# 1. Definir las rutas de origen (Usuario) y destino (Servidor)
$Origen = "C:\Users\Administrador\Documents\fuente"  # Cambia por la carpeta del usuario
$Destino = "C:\Users\Administrador\Documents\destino" # Cambia por tu ruta de red

# 2. Configurar la acción
# Usamos el script que modificamos en el Paso 1
$Action = New-ScheduledTaskAction -Execute 'C:\Windows\System32\WindowsPowerShell\v1.0\powershell.exe' `
-Argument "-NonInteractive -NoLogo -NoProfile -File 'C:\Users\Administrador\Documents\CopyFiles.ps1' -SourcePath '$Origen' -DestinationPath '$Destino'"

# 3. Configurar el Gatillo (Todos los viernes a las 10:00 PM)
# -Weekly indica semanal, -DaysOfWeek Friday indica el día
$Trigger = New-ScheduledTaskTrigger -Weekly -DaysOfWeek Friday -At '10:00PM'

# 4. Registrar la tarea en el sistema
Register-ScheduledTask -TaskName "Respaldo_Semanal_Historial" `
-Action $Action `
-Trigger $Trigger `
-User "Administrador" `
-Password "usuario.12345" `
-Settings (New-ScheduledTaskSettingsSet)