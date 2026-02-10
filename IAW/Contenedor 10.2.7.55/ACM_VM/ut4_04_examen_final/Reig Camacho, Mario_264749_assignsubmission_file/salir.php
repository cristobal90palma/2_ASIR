<?php
session_start();
include_once("comun.php");


// Validar sesion activa sino redigiremos al usuario a acceso.php 
if (!isset($_SESSION['misesion']) || fValidaSesion() == 0) {
    header("Location: formulario1.php");
    exit();
}


// Destruir la sesión 
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cierre de Sesión</title>
</head>
<body > <form method="post" action="salir.php">
    <h1>Se ha cerrado la sesión para el usuario <?php echo $usuario; ?></h1> 
    <br>
    <a href="formulario1.php">Formulario principal.</a> 
</body>
</html>