<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Examen Tema 4</title>
</head>
<body>

<h1>Examen Tema 4</h1>

<form action="procesa_login.php" method="POST">
    <p>
        <label for="correo">Correo:</label>
        <input type="text" name="correo" id="correo" required>
        <p>Ejem: cristobal2590@gmail.com</p>
    </p>

    <p>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <p>Ejem: 48920818W</p>
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
                
                // Borramos el error de la "maleta" (sesión). Esto se hace para que no se quede guardado el mensaje de error incluso si recargamos la página.
                unset($_SESSION['error']);
    }

    if (isset($_SESSION['usuario']) && $_SESSION['usuario']!="" && $_SESSION['error']==false){
        header("Location: datos_cliente.php");
    }
    ?>

</body>
</html>
