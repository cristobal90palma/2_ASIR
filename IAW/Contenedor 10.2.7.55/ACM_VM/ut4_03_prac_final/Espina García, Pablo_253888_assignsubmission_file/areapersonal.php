<?php
include_once "comunes.php";

if (fValidaSesion() == 0) {
    header("Location: acceso.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Area Personal</title>
        <style>
    body {
        background-color: #87CEFA;
    }
</style>
</head>
<body>
    <h2> Bienvenido , <?= $_SESSION["usuario"] ?></h2>

    <ul>
        <li><a href="correos.php">Correos</a></li>
        <li><a href="salir.php">Salir</a></li>
</ul>
</body>
</html>
