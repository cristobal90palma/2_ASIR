<?php

$contador_do_while = 10;

echo "\n--- Bucle DO...WHILE ---\n";

do {
    echo "Esto SÍ se imprimirá al menos una vez. Contador: " . $contador_do_while . "\n";
    $contador_do_while++;
} while ($contador_do_while < 15);

echo "Valor final de \$contador_do_while: " . $contador_do_while . "\n";
// Salida: El código se ejecuta una vez (con 10) antes de comprobar
// que 11 NO es menor que 5.

?>