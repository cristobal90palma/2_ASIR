<?php
function listaDeCompras($items) {
    $salida = "<ul>";
    foreach ($items as $producto) {
        $salida .= "<li>$producto</li>"; // .= sirve para ir acumulando texto
    }
    $salida .= "</ul>";
    return $salida;
}

$miLista = ["Pan", "Leche", "Huevos", "Manzanas"];
echo "<h3>Mi lista de hoy:</h3>";
echo listaDeCompras($miLista);
?>