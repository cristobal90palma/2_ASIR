<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Personal</title>
</head>
<body>
<?php
session_start();
require_once 'comunes.php';



if ( fValidaSesion() == 1 ){
    echo "<h1>Area Personal de: ".$_SESSION['usuario']."</h1>";
    echo "<p><a href='correos.php'>Correos</a></p>";
    echo "<p><a href='salir.php'>Salir</a></p>";
}else{
    header("Location: acceso.php");
    exit();
}



?>
</body>
</html>