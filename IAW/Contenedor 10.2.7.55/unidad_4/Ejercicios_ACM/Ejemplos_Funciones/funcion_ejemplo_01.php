<?php
function mostrarPerfil($nombre, $puesto, $sueldo) {
    echo "<h3>Ficha de Empleado</h3>";
    echo "Nombre: <strong>$nombre</strong><br>";
    echo "Cargo: $puesto<br>";
    echo "Sueldo neto: $" . ($sueldo * 0.85) . " (después de impuestos)<br>";
    echo "<hr>";
}

// Variables que podrían venir de un formulario $_POST
$user = "Laura García";
$job = "Diseñadora UX";
$salary = 3000;

mostrarPerfil($user, $job, $salary);
?>