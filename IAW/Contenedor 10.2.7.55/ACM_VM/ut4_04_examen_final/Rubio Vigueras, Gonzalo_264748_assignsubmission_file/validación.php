<?php

// Recoger datos
$nombre = limpiar($_POST['nombre'] ?? '');
$cif = strtoupper(limpiar($_POST['cif'] ?? ''));
$ipv4 = limpiar($_POST['ipv4'] ?? '');
$ipv6 = limpiar($_POST['ipv6'] ?? '');
$ipv4fr = $_POST['ipv4fr'] ?? '';
$ipv6fr = $_POST['ipv6fr'] ?? '';

// Array de errores
$errores = [
    1 => "El campo está vacío",
    2 => "El formato no es válido",
    3 => "La fecha no es correcta"
];

// La validación de cada campo del formulario.

// 1. Nombre empresa
if (empty($nombre)) {
    $errores[] = "El nombre de la empresa es obligatorio.";
} elseif (mb_strlen($nombre) > 50) {
    $errores[] = "El nombre de la empresa no puede superar los 50 caracteres.";
}

// 2. CIF
if (!preg_match('/^ [A-Z] {1} [0-9] {7} ([0-9] | [A-Z]) {1}$/', $cif)) {
    $errores[] = "El CIF no tiene un formato válido.";
}

// 3. IPv4
if (!filter_var($ipv4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
    $errores[] = "La dirección IPv4 no es válida.";
}

// 4. IPv6
if (!filter_var($ipv6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
    $errores[] = "La dirección IPv6 no es válida.";
}

// 5 y 6. Fechas válidas
if (!$ipv4fr || !strtotime($ipv4fr)) {
    $errores[] = "La fecha de renovación IPv4 no es válida.";
}

if (!$ipv6fr || !strtotime($ipv6fr)) {
    $errores[] = "La fecha de renovación IPv6 no es válida.";
}

/* ================= RESULTADO ================= */

if (!empty($errores)) {
    echo "<h3>Errores encontrados:</h3><ul>";
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul>";
    echo "<a href='formulario.php'>Volver al formulario</a>";
    exit;
}

// Si todo es correcto
echo "<h2>Datos validados correctamente</h2>";
echo "<p><strong>Empresa:</strong> $nombre</p>";
echo "<p><strong>CIF:</strong> $cif</p>";
echo "<p><strong>IPv4:</strong> $ipv4</p>";
echo "<p><strong>IPv6:</strong> $ipv6</p>";
echo "<p><strong>Renovación IPv4:</strong> $ipv4fr</p>";
echo "<p><strong>Renovación IPv6:</strong> $ipv6fr</p>";

?>
