<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Introduce un año: ";
$anio = intval(trim(fgets(STDIN)));  // Lee el año introducido por el usuario

// Variable lógica (booleana)
//$esBisiesto = false;

// Regla: divisible por 400, o divisible por 4 pero no por 100
if (($anio % 400 == 0) || (($anio % 4 == 0) && ($anio % 100 != 0))) {
    $esBisiesto = true;
}

// Mostrar resultado
if ($esBisiesto) {
    echo "El año $anio es bisiesto.\n";
} else {
    echo "El año $anio no es bisiesto.\n";
}
?>
