<?php
// Es vital configurar la zona horaria para que el saludo sea correcto
date_default_timezone_set('Europe/Madrid'); 

function obtenerSaludoDetallado($hora) {
    if ($hora >= 0 && $hora < 6) {
        return "¡Buenas madrugadas! 🌙";
    } elseif ($hora >= 6 && $hora < 12) {
        return "¡Buenos días! ☀️";
    } elseif ($hora >= 12 && $hora < 15) {
        return "¡Buen provecho, feliz mediodía! 🍲";
    } elseif ($hora >= 15 && $hora < 20) {
        return "¡Buenas tardes! ☕";
    } else {
        return "¡Buenas noches! 😴";
    }
}

//$horaActual = 14; // Imagina que esto viene del reloj del servidor
// Obtenemos la hora actual (formato 0-23)
$horaActual = (int)date('G'); 
$mensaje = obtenerSaludoDetallado($horaActual);

echo "Hola usuario. $mensaje";
?>