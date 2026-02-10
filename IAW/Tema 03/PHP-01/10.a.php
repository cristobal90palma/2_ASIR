<?php
echo "Introduce el capital: ";
$capital = floatval(trim(fgets(STDIN)));

#https://coding-gym.org/snippets/php/ combinación para pillar los datos y luego "limpiar" los espacios en blanco.
#https://stackoverflow.com/questions/24342026/in-php-how-to-get-float-value-from-a-mixed-string/24342050 usa "floatval" para que php traduzca lo que has metido de texto a número.

echo "Introduce el rédito (%): ";
$redito = floatval(trim(fgets(STDIN)));

echo "Introduce el tiempo (en años): ";
$tiempo = floatval(trim(fgets(STDIN)));

$interes = ($capital * $redito * $tiempo) / 100;

echo "El interés simple es: $interes\n";
?>
