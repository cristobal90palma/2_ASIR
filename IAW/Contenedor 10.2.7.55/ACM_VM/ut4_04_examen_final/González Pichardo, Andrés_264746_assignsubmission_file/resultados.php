<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
</head>
<body>
<?php

session_start();
require_once 'comunes.php';

$nombre = $_POST['nombre'];
$cif = strtoupper($_POST['cif']);
$ip4 = $_POST['ip4'];
$ip6 = $_POST['ip6'];
$fecha4 = $_POST['reno4']; 
$fecha6 = $_POST['reno6']; 

$errorNombre = fValidaNombre($nombre);
$errorCif = fValidaCIF($cif);
$errorIp4 = fValidaIPv4($ip4);
$errorIp6 = fValidaIPv6($ip6);
#$errorFecha4 = comprobarFecha($fecha4);
#$errorFecha6 = comprobarFecha($fecha6);



    if ( $errorNombre=="" && $errorCif=="" && $errorIp4=="" && $errorIp6=="" ){
       echo "<p>No hay errores.</p>";
    }else{
        echo "<p>Errores encontrados:</p>";
        echo "<ul>";
        if ($errorNombre!="") {
            echo "<li>".$errorNombre."</li>";
        }
        if ($errorCif!="") {
            echo "<li>".$errorCif."</li>";
        }
        if ($errorIp4!="") {
            echo "<li>".$errorIp4."</li>";
        }
        if ($errorIp6!="") {
            echo "<li>".$errorIp6."</li>";
        }
        #if ($errorFecha4!="") {
        #    echo "<li>[IPV4]".$errorFecha4."</li>";
        #}
        #if ($errorFecha6!="") {
        #    echo "<li>[IPV6]".$errorFecha6."</li>";
        #}
        echo "</ul>";
    }



    
?> 
<p><a href="formulario.php">Volver al formulario</a></p>
<p><a href="salir.php">Cerrar sesión</a></p>

</body>
</html>