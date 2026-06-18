<?php
session_start();
include_once("comunes.php");


// Validar sesion activa sino redigiremos al usuario a acceso.php 
if (!isset($_SESSION['misesion']) || fValidaSesion() == 0) {
    header("Location: acceso.php");
    exit();
}

// Si está activa, recoger datos necesarios antes de destruirla 
$usuario = $_SESSION['usuario']; 
$fecha_inicio = $_SESSION['inicio'];  
$fecha_actual = date("d/m/Y H:i");    

// 3. Destruir la sesión 
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cierre de Sesión</title>
</head>
<body style="background-color: #A9D0F5;"> <form method="post" action="salir.php">
    <h1>Se ha cerrado la sesión para el usuario <?php echo $usuario; ?></h1> 
    
    <p>Fecha inicio <?php echo $fecha_inicio; ?></p> 
    <p>Fecha fin <?php echo $fecha_actual; ?></p> 
    
    <br>
    <a href="acceso.php">Acceso principal.</a> 
</body>
</html>