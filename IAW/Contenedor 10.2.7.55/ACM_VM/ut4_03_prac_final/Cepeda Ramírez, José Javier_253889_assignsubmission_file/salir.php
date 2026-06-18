<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Salir</title>
</head>
<body>

<?php
    include_once("comunes.php");

    if (fValidaSesion()==0){
        header("Location: acceso.php");
        exit();
    }

    $usuario = $_SESSION["usuario"];
    $inicio = $_SESSION["inicio"];
    $fin = date("d/m/Y H:i");

    session_destroy();

    echo "<p>Se ha cerrado la sesión del usuario <b>".$usuario."</b></p>";
    echo "<p>Fecha de inicio: ".$inicio."</p>";
    echo "<p>Fecha de fin: ".$fin."</p>";
    echo "<p><a href='acceso.php'>Volver al acceso principal</a></p>";
?>

</body>
</html>