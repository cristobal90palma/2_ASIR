<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 - Sesiones</title>
</head>
<body>
    <form action="login.php" method="POST">
        <label for=usuario>Usuario: </label>
        <input type="text" name="usuario"/>
        <br></br>
        <label for=password>Contraseña: </label>
        <input type="password" name="password"/>
        <br></br>
        <input type="submit" value="Enviar"/>
        <br></br>
        <?php
        session_start();
            if (isset($_SESSION['usuario']) && $_SESSION['usuario']!="") {
                header("Location: secreta.php");
            }
            if (isset($_SESSION['error']) && $_SESSION['error']==true) {
                echo "<span>Usuario y/o contraseña incorrectos</span>";
            }


        ?>

    </form>
</body>
</html>