<?php
function esMayorDeEdad($edad) {
    if ($edad >= 18) {
        return true;
    } else {
        return false;
    }
}

$usuarioEdad = 16;

if (esMayorDeEdad($usuarioEdad)) {
    echo "Acceso concedido. Bienvenido al sistema.";
} else {
    echo "Acceso denegado. Eres menor de edad.";
}
?>