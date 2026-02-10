<?php
session_start();
include_once("comunes.php");

// Validar si la sesión está activa 
if (fValidaSesion() == 0) {
    header("Location: acceso.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Correos</title></head>
<body style="background-color: #A9D0F5;"> <form method="post" action="correos.php">
    <h1>Correos</h1> <p>Bienvenido a su bandeja de entrada.</p>
    <br>
    <a href="areapersonal.php">Volver a mí área personal.</a> </body>
</html>