<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Correos</title>
</head>
<body>

<?php
    include_once("comunes.php");

    if (fValidaSesion()==0){
        header("Location: acceso.php");
        exit();
    }
?>

<h2>Correos</h2>

<p><a href="areapersonal.php">Volver al área personal</a></p>

</body>
</html>