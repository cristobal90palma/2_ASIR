<?php


// Definimos la función igual que antes
function familyName($fname, $year) {
  echo "$fname Refsnes. Born in $year.<br>";
}

// Creamos las variables con los datos
$nombrePersona = "Lucas";
$anioNacimiento = 1995;

// Llamamos a la función usando las variables
familyName($nombrePersona, $anioNacimiento);

// Segunda llamada, usando de un array.
$familia = [
    ["Ana", 2001],
    ["Pedro", 1992],
    ["Marta", 1985]
];

foreach ($familia as $persona) {
    // $persona[0] es el nombre, $persona[1] es el año
    familyName($persona[0], $persona[1]);
}


?>