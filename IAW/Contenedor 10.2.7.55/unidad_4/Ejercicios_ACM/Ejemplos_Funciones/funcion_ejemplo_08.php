<?php
function convertirDolaresAEuro($cantidad, $tasaCambio) {
    $resultado = $cantidad * $tasaCambio;
    return round($resultado, 2); // Redondea a 2 decimales
}

$misDolares = 150;
$tasaHoy = 0.92;

$misEuros = convertirDolaresAEuro($misDolares, $tasaHoy);

echo "$misDolares USD equivalen a $misEuros EUR.";
?>