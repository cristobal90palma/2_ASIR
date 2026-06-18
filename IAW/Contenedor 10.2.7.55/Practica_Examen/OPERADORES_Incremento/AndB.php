<?php

$temperatura = 120; // La temperatura actual del horno en °C

// Condición A: $temperatura > 180 (¿Es mayor a 180?)
$condicion_a = ($temperatura > 180); // True (205 > 180)

// Condición B: $temperatura <= 220 (¿Es menor o igual a 220?)
$condicion_b = ($temperatura <= 220); // True (205 <= 220)

// La condición del 'if' une ambas condiciones con AND:
// if (Condición A AND Condición B)
if ($condicion_a and $condicion_b) {
    echo "¡Temperatura óptima! ($temperatura °C)\n";
} else {
    echo "La temperatura ($temperatura °C) está fuera del rango óptimo.\n";
}

?>