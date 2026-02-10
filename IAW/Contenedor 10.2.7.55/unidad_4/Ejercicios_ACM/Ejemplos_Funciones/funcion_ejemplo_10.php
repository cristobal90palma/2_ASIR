<?php
function aplicarDescuento($precio, $porcentaje) {
    $ahorro = $precio * ($porcentaje / 100);
    $precioFinal = $precio - $ahorro;
    
    return "Precio original: $$precio | Descuento: $porcentaje% | **Total: $$precioFinal**";
}

$costoProducto = 1200;
$oferta = 15;

echo aplicarDescuento($costoProducto, $oferta);
?>