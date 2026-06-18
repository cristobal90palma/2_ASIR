<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Correos</title>
</head>
<body>

<?php
require_once "comunes.php";

if (fValidaSesion() == 1) {
    echo "<h2>Correos de " . $_SESSION["usuario"] . "</h2>";
    echo "<p><a href='areapersonal.php'>Volver a mi área personal</a></p>";
} else {
    header("Location: acceso.php");
    exit();
}
?>

</body>
</html>


