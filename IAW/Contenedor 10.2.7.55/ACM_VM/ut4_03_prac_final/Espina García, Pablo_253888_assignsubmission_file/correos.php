<?php
include_once "comunes.php";
if(fValidaSesion() == 0) {
    header("Location: accesso.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Correos</title>
        <style>
    body {
        background-color: #87CEFA;
    }
</style>
</head>
<body>
    <h2> Mis correos <h2>
        <p>Aquí estarían todos tus correos</p>
        <a href="areapersonal.php">Volver al área personal</a>
</body>
</html>
