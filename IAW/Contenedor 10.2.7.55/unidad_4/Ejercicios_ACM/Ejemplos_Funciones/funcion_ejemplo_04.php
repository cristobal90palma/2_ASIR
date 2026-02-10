<?php
function calcularPrecioTotal($precioBase, $iva = 21) {
    $impuesto = $precioBase * ($iva / 100);
    $total = $precioBase + $impuesto;
    return $total; // La función "termina" y entrega este valor
}

$producto = "Smartphone";
$precioSinIva = 500;

// Guardamos el resultado de la función en una nueva variable
$precioFinal = calcularPrecioTotal($precioSinIva);

echo "El $producto cuesta $precioFinal € con IVA incluido.";
?>