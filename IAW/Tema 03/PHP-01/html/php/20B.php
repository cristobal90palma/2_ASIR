<?php
# Diseñar un algoritmo para escribir en pantalla los n primeros números naturales,
# sus cuadrados, sus cubos y la suma de todos ellos.

echo "Introduce un número: ";
$numero = intval(trim(fgets(STDIN)));
$suma = 0;

echo "\nImpresión por pantalla de los $numero primeros números naturales\n";
echo "----------------------------------------------------------------------\n";

for ($i = 1; $i <= $numero; $i++) {
    echo $i;
    if ($i < $numero) echo ", ";
    $suma += $i;
}
echo "\n\n";

echo "Impresión por pantalla de los $numero primeros números cuadrados\n";
echo "----------------------------------------------------------------------\n";

for ($i = 1; $i <= $numero; $i++) {
    echo ($i * $i);
    if ($i < $numero) echo ", ";
}
echo "\n\n";

echo "Impresión por pantalla de los $numero primeros números cubo\n";
echo "----------------------------------------------------------------------\n";

for ($i = 1; $i <= $numero; $i++) {
    echo ($i * $i * $i);
    if ($i < $numero) echo ", ";
}
echo "\n\n";

echo "La suma de los números naturales hasta $numero es: $suma\n";
?>
