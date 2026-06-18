<?php
session_start();
include_once 'comunes.php';

if (fValidaSesion() == 0) {
    header("Location: acceso.php");
    exit();
}

if (fValidaNombre($_POST['nombre']) == 1) {
    echo "Nombre de la empresa: ".$_POST['nombre'].". <br/>";
}/* elseif (fValidaNombre($_POST['nombre']) == 0) {
    echo "El nombre es demasiado largo. <br/>";
}*/ else {
    echo "Debes introducir el nombre. <br/>";
}

if (fValidaCif($_POST['cif']) == 1) {
    echo "CIF de la empresa: ".$_POST['cif'].". <br/>";
    setcookie('recuerda', $user, time() + 3600); 
} elseif (fValidaCif($_POST['cif']) == 0) {
    echo "El CIF no es correcto. <br/>";
    setcookie('recuerda', '', time() - 3600);
} else {
    echo "Debes introducir el CIF. <br/>";
}

if (fValidaIPv4($_POST['IPv4']) == 1) {
    echo "IPv4 de la empresa: ".$_POST['IPv4'].". <br/>";
} elseif (fValidaIPv4($_POST['IPv4']) == 0) {
    echo "La IPv4 introducida no es correcta o es privada. <br/>";
} else {
    echo "Debes introducir la IPv4. <br/>";
}

if (fValidaIPv6($_POST['IPv6']) == 1) {
    echo "IPv6 de la empresa: ".$_POST['IPv6'].". <br/>";
} elseif (fValidaIPv6($_POST['IPv6']) == 0) {
    echo "La IPv6 introducida no es correcta. <br/>";
} else {
    echo "Debes introducir la IPv6. <br/>";
}

if (fValidaFechaIPv4($_POST['fecha_IPV4']) == 1) {
    echo "Fecha de renovación de la IPv4 de la empresa: ".$_POST['fecha_IPV4'].". <br/>";
} else {
    echo "Debes introducir la fecha de renovación de la IPv4. <br/>";
}

if (fValidaFechaIPv6($_POST['fecha_IPV6']) == 1) {
    echo "Fecha de renovación de la IPv6 de la empresa: ".$_POST['fecha_IPV6'].". <br/>";
} else {
    echo "Debes introducir la fecha de renovación de la IPv6. <br/>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Correos</title>
    <style>
        body { font-family: sans-serif; background-color: #f0f8ff; padding: 50px; }
        h2 { color: black; font-weight: bold; }
        a { color: #225599; font-weight: bold; text-decoration: underline; }
    </style>
</head>
<body>
    <p><a href="formulario.php">Volver al formulario.</a></p>
    <p><a href="salir.php">Salir.</a></p>
</body>
</html>