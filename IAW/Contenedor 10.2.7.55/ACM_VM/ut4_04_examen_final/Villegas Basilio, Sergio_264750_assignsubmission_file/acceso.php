<?php
session_start(); 
include_once 'comunes.php';

$mensaje_error = ""; 
// Recuperamos la cookie si existe
$usuario_cookie = isset($_COOKIE['recuerda']) ? $_COOKIE['recuerda'] : "";

// Si ya tiene sesión iniciada, va directo al área personal
if (fValidaSesion() == 1) {
    header("Location: formulario.php");
    exit();
}   

// Si se pulsa el botón de Enviar
if (isset($_POST['boton'])) {
    $correo = $_POST['correo'];
    $dni = $_POST['dni'];

    if (!empty($correo) && !empty($dni)) {
        if (fValidaAcceso($correo, $dni) == 1) {
            // Guardamos datos en la sesión
            $_SESSION['misesion'] = session_id();
            $_SESSION['correo'] = $correo;
            header("Location: formulario.php");
            exit();
        } else {
            $mensaje_error = "El usuario o la contraseña son incorrectos.";
        }
    } else {
        $mensaje_error = "Introduce usuario y contraseña.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso</title>
    <style>
        /* Color de fondo */
        body { 
            background-color: #f0f8ff; 
            font-family: Arial, sans-serif;
            padding: 100px;
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

    <?php 
    if ($mensaje_error != "") {
        echo "<p style='color: red;'><b>$mensaje_error</b></p>";
    }
    ?>

    <form action="acceso.php" method="POST">
        <label for="correo">Correo:</label><br/>
        <input type="text" name="correo"/>
        <br/><br/>
        
        <label for="dni">DNI:</label><br/>
        <input type="password" name="dni" />
        <br/><br/>
        
        <input type="submit" name="boton" value="Enviar"/>
    </form>

</body>
</html>