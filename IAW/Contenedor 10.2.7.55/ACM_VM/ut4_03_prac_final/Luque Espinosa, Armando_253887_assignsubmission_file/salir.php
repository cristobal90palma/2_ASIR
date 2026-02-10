<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Salir</title>
</head>
<body>

<?php
require_once "comunes.php";

if (fValidaSesion() == 1) {

    echo "<h2>Sesión cerrada</h2>";
    echo "<p>Se ha cerrado la sesión para el usuario: " . $_SESSION["usuario"] . "</p>";
    echo "<p>Inicio: " . date("d/m/Y H:i:s", $_SESSION["inicio"]) . "</p>";
    echo "<p>Fin: " . date("d/m/Y H:i:s") . "</p>";
    echo "<p><a href='acceso.php'>Acceso principal</a></p>";

    unset($_SESSION["usuario"]);
    unset($_SESSION["misesion"]);
    unset($_SESSION["inicio"]);

} else {
    header("Location: acceso.php");
    exit();
}
?>

</body>
</html>


