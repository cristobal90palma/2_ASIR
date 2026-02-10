<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesión ITV</title>
</head>
<body>

<h1>Acceso ITV</h1>

<form action="procesa_login.php" method="POST">
    <p>
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" required>
        <p>Ejem: 12345678Z</p>
    </p>

    <p>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <p>Ejem: itv123</p>
    </p>

    <input type="submit" value="Entrar">
</form>

<?php // Para poder mostrarlos en la misma pantalla. Se recepcionan desde 
//"procesa_login.php"
?>
    <?php
    session_start();

    if (isset($_SESSION['error']) && $_SESSION['error']==true){
        echo "<span style='color:red;'> Usuario/contraseña incorrectos.</span>";
    }

    if (isset($_SESSION['usuario']) && $_SESSION['usuario']!="" && $_SESSION['error']==false){
        header("Location: datos_cliente.php");
    }
    ?>

</body>
</html>
