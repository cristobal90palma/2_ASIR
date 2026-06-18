<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usar calculadora</title>
</head>
<body>

<h1>Usar calculadora</h1>

<form action="procesa_login.php" method="POST">
    <p>
        <label for="nombre">Pon tu nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <p>Ejem: cristobal</p>
    </p>

    <p>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>
        <p>Ejem: suarez</p>
    </p>

    <input type="submit" value="Entrar">
</form>

<?php // Para poder mostrarlos en la misma pantalla. Se recepcionan desde 
//"procesa_login.php"
?>
    <?php
    session_start();
    // Si error existe y tiene un valor de "true": Se indica que hay problemas.
    if (isset($_SESSION['error']) && $_SESSION['error']==true){
        echo "<span style='color:red;'> Usuario/contraseña incorrectos.</span>";
    }
        //Si el usuario existe y tiene valor CONTRARIO a nada, y además error es "false", se redirige a la página
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']!="" && $_SESSION['error']==false){
        header("Location: index_01.php");
    }
    ?>

</body>
</html>
