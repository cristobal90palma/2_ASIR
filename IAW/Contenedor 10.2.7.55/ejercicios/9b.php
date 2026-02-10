<?php

echo "Introduce un año: ";
$anio = intval(trim(fgets(STDIN)));  // Lee el año introducido por el usuario

#https://coding-gym.org/snippets/php/ combinación para pillar los datos y luego "limpiar" los espacios en blanco.
#intval = convertir el valor que introduces a través del teclado en un número entero (un integer).

$esBisiesto = false;

// Regla: divisible por 400, o divisible por 4 pero no por 100
if (($anio % 400 == 0) || (($anio % 4 == 0) && ($anio % 100 != 0))) {
    $esBisiesto = true;
}

# https://www.php.net/manual/es/language.operators.logical.php "||" significan que o uno u otro. Es decir, o se divide entre 400 o entre 4 pero no entre 100

// Mostrar resultado
if ($esBisiesto) {
    echo "El año $anio es bisiesto.\n";
} else {
    echo "El año $anio no es bisiesto.\n";
}
?>
