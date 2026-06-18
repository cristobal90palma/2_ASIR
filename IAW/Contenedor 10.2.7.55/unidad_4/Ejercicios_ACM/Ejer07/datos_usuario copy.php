<?php

/* Si el usuario es mayor de edad, muestra el nombre
Si el usuario es menor de edad, muestra el apellido
Todo ello dentro de una función.
*/

function    mostrarDatos($n, $a, $e) {
    if ($e>=18) {
        return "Nombre: ".$n."\n";
    } else {
        return "Apellidos: ".$a."\n";
    }

    }


$nombre = rtrim(fgets(STDIN));
$apellidos = rtrim(fgets(STDIN));
$edad = rtrim(fgets(STDIN));

//Lama a la función. Los valores deben ir en orden.
mostrarDatos($nombre, $apellidos, $edad);

$salida = mostrarDatos($nombre, $apellidos, $edad);

echo $salida;


?>
