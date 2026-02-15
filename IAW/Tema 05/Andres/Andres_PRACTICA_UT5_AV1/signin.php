<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <h1>Sign In</h1>
    <form action="procesar.php" method="post">
        <input type="hidden" name="tipo" value="signin">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <label for="password2">Repetir contraseña:</label>
        <input type="password" id="password2" name="password2" required><br><br>
        <input type="submit" value="Registrarse">
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


    <p>¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí.</a></p>

</body>
</html>