param(
    [string]$SourcePath,
    [string]$DestinationPath
)

# Generar un sello de tiempo (ejemplo: 2023-10-27_22-00)
$Timestamp = Get-Date -Format "yyyy-MM-dd_HH-mm"

# Crear una subcarpeta nueva con la fecha dentro del destino de red
$FullDestinationPath = Join-Path -Path $DestinationPath -ChildPath "Backup_$Timestamp"

# Crear la carpeta y copiar los archivos
New-Item -ItemType Directory -Path $FullDestinationPath -Force
Copy-Item -Path $SourcePath -Destination $FullDestinationPath -Recurse