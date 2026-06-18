<?php

$cliente_presente = false;
$vecino_presente = false;

echo "Estado de la entrega: \n";
echo "Cliente presente: " . ($cliente_presente ? "Si" : "No" ) . "\n";
echo "Vecino presente: " . ($vecino_presente ? "Si" : "No" ) . "\n";

if ($cliente_presente || $vecino_presente) {
    echo "Alguno de los dos lo ha recogido\n";
} else {
    echo "Ninguno lo ha recogido.\n";
}

?>