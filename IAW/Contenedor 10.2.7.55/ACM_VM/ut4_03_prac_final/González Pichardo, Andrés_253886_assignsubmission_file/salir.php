<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salir</title>
</head>
<body>
<?php
session_start();
require_once 'comunes.php';
if ( fValidaSesion() == 1 ){
    echo "<h1>Se ha cerrado la sesión de: ".$_SESSION['usuario']."</h1>";
    echo "<p>Fecha de inicio: ".date('d/m/Y H:i:s', $_SESSION['inicio'])."</p>";
    echo "<p>Fecha fin: ".date('d/m/Y H:i:s', time())."</p>";
    echo "<p><a href='acceso.php'>Acceso principal</a></p>";

    unset($_SESSION['usuario']);
    unset($_SESSION['misesion']);
    unset($_SESSION['inicio']);
}else{
    header("Location: acceso.php");
    exit();
}



?>
</body>
</html>