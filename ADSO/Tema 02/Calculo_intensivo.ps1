function Get-Factorial($n) {
$result = [System.Numerics.BigInteger] 1
for ($i = 2; $i -le $n; $i++) {
$result = $result * $i
}
} return $result
$start_time = Get-Date
Write-Host "Iniciando cálculo intensivo..."
# Aumentamos el número a un valor que debería forzar un tiempo de ejecución mayor
# (El tiempo exacto variará por sistema)
Get-Factorial 80000 | Out-Null
$end_time = Get-Date
$duration = $end_time - $start_time
Write-Host "Cálculo completado en: $($duration.TotalSeconds) segundos."