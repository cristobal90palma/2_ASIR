<?php
function generarEmail($nombre, $apellido) {
    $dominio = "@empresa.com";
    // strtolower convierte a minúsculas
    // Concatenamos la primera letra del nombre con el apellido
    // $nombre[0] = da la primera letra de la variable, en este caso "r".
    $email = strtolower($nombre[0] . $apellido . $dominio);
    return $email;
}

$nom = "Roberto";
$ape = "Sanchez";

$correoFinal = generarEmail($nom, $ape);

echo "El correo de $nom es: $correoFinal"; 
// Resultado: rsanchez@empresa.com
?>