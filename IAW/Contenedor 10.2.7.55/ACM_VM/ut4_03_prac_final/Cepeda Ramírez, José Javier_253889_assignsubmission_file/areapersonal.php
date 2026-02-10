<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Área personal</title>
</head>
<body>

<?php
    include_once("comunes.php");

    if (fValidaSesion()==0){
        header("Location: acceso.php");
        exit();
    }

    echo "<p>Área personal del usuario <b>".$_SESSION["usuario"]."</b></p>";
    echo "<p><a href='correos.php'>Correos</a></p>";
    echo "<p><a href='salir.php'>Salir</a></p>";
?>

</body>
</html>