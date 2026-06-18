<?php
session_start();
include_once 'comunes.php';

if (fValidaSesion() == 0) {
    header("Location: acceso.php");
    exit();
}

$usuario_cookie = isset($_COOKIE['recuerda']) ? $_COOKIE['recuerda'] : "";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
    <style>
        /* Color de fondo */
        body { 
            background-color: #f0f8ff; 
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        
        label { 
            font-weight: bold; 
            color: black; 
        }
        /* Estilo del formulario */
        form {
            background-color: white;
            display: inline-block;
            padding: 20px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <form action="resultados.php" method="POST">
        <label for="nombre">Nombre de la empresa:</label><br/>
        <input type="text" name="nombre"/>
        <br/><br/>
        
        <label for="cif">CIF:</label><br/>
        <input type="text" name="cif" default="$usuario_cookie"/>
        <br/><br/>

        <label for="IPv4">IPv4:</label><br/>
        <input type="text" name="IPv4" />
        <br/><br/>

        <label for="IPv6">IPv6:</label><br/>
        <input type="text" name="IPv6" />
        <br/><br/>
        
        <label for="fecha_IPV4">Fecha de renovación IPv4:</label><br/>
        <input type="date" name="fecha_IPV4" />
        <br/><br/>

        <label for="fecha_IPV6">Fecha de renovación IPv6:</label><br/>
        <input type="date" name="fecha_IPV6" />
        <br/><br/>

        <input type="submit" name="boton" value="Enviar"/>
    </form>

</body>
</html>