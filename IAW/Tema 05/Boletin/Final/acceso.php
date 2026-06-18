<?php
    
    session_start();

    // Si la sesión ya existe, saltamos directamente a pedido.php
    if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
        header("Location: pedido.php");
        exit(); // Se pone exit() para que no se cargue el resto del HTML.
    }

    ?>

 
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
        <input type="password" name="pass"/>
        <br/>
        <input type="submit" value="Acceso"/>        
    </form>
    <br/>
    <a href="registro.html">¿Aún no estás registrado? Regístrate</a>
</body>
</html>

<?php
    // Imprimir mensaje de error de sesión proviniente de login.php
    if (isset($_SESSION['error_login']) && $_SESSION['error_login']==true) {
            echo "<p style='color: red;'>El usuario y/o la contraseña no son correctas.</p>";
        // AQUÍ: Borramos el error para que no se quede "pegado"
            unset($_SESSION['error_login']);
    }

?>