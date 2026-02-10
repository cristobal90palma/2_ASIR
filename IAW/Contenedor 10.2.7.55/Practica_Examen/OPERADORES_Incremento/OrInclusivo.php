<?php

$temperatura = 120; // La temperatura actual del horno en °C

// Condición A: $temperatura < 180 (¿Es demasiado FRÍA?)
$condicion_a = ($temperatura < 180); // True (120 < 180)

// Condición B: $temperatura > 220 (¿Es demasiado CALIENTE?)
$condicion_b = ($temperatura > 220); // False (120 > 220)

// La condición del 'if' une ambas condiciones con OR:
// Si se cumple A OR se cumple B, la temperatura es INSEGURA.
if ($condicion_a or $condicion_b) {
    echo "🚨 ¡ADVERTENCIA! La temperatura ($temperatura °C) está FUERA del rango seguro.\n";
} else {
    echo "✅ La temperatura ($temperatura °C) está dentro del rango seguro (180 °C a 220 °C).\n";
}

?>