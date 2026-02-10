<?php
include_once "comunes.php";

if (fValidaSesion() == 0) {
    header("Location: acceso.php");
    exit();
}
$inicio = $_SESSION["inicio"];

session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Salir</title>
        <style>
    body {
        background-color: #87CEFA;
    }
</style>
</head>
<body>
    <h2> Sesion Cerrada <h2>
        <p>Inicio de sesion: <?= $inicio ?></p>
        <p> Fin de sesion: <?= date("Y-m-d H:i:s") ?></p>
        <a href="acceso.php">Volver al acceso</a>
</body>
</html>