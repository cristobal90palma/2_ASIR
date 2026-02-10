<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Área personal</title>
</head>
<body>

<?php
require_once "comunes.php";

if (fValidaSesion() == 1) {
    echo "<h2>Área personal</h2>";
    echo "<p>El área personal de <b>" . $_SESSION["usuario"] . "</b></p>";
    echo "<p><a href='correos.php'>Correos</a></p>";
    echo "<p><a href='salir.php'>Salir</a></p>";
} else {
    header("Location: acceso.php");
    exit();
}
?>

</body>
</html>

