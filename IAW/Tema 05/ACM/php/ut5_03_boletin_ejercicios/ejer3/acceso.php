<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de acceso</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" name="username"/>
        <br/>
        <label for="pass">Contraseña:</label>
        <input type="text" name="pass"/>
        <br/>
        <input type="submit" value="Acceso"/>        
    </form>
    <br/>
    <a href="registro.html">¿Aún no estás registrado? Regístrate</a>
    <?php
        session_start();
        if (isset($_SESSION['error_login']) && $_SESSION['error_login']==true) {
            echo "<p style='color: red;'>El usuario y/o la contraseña no son correctas.</p>";
        }
    ?>
</body>
</html>