<?php

$contador_while = 1;

echo "--- Bucle WHILE ---\n";

while ($contador_while < 25) {
    echo "Esto NUNCA se imprimirá. Contador: " . $contador_while . "\n";
    $contador_while++;
}

echo "Valor final de \$contador_while: " . $contador_while . "\n";
// Salida: El bucle se salta porque 10 NO es menor que 5.

?>