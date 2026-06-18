<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form action="sesion.php" method="POST">
        <p><input type="text" name="nombre"/></input></p>
        <p><input type="password" name="pass"/></input></p>
        <p><input type="submit" value="Login"/></p>
    </form>
    
    <?php
        if ($_COOKIE["error"]!=null and $_COOKIE["error"]!=""){
            echo "<p style='color: red;'>$_COOKIE[error]</p>";
        }
    ?>
</body>
</html>