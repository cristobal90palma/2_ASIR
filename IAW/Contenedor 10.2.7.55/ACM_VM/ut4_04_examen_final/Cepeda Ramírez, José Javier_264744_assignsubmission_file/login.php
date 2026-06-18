<?php
//Apartado "a" pagina inicial de login mediante correo y contraseña.

include_once("validaciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

}
?> 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form method="POST" action="login.php">
            <p>
            <label for="correo">Correo Electrónico:</label><br>
            <input type="email" id="correo" name="correo" required>
            </p>

            <p>
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena" required>
            </p>

            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>

    

