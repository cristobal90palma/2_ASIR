<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="procesar.php" method="post">
        <input type="hidden" name="tipo" value="login">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>

    <?php

    session_start();
    include_once "funcionesApp.php";

    if (!empty($_SESSION['user'])) {
        header("Location: pedidos.php"); 
        exit(); 
    }

    echo obtenerError($_SESSION['error']);


    ?>

    <a>¿No tienes una cuenta? <a href="signin.php">Regístrate aquí.</a></a>
</body>
</html>