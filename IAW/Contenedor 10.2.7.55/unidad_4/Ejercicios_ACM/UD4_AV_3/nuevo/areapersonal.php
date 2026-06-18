<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Área Personal</title>
    </head>
<body>

<fieldset style="width: 300px; padding: 20px;">

    <?php
    session_start();
    require_once 'comunes.php';

    if (fValidaSesion() == 1) {
        echo "<h1>El área personal de " . $_SESSION['usuario'] . "</h1>"; 
        echo "<a href='correos.php'>Correos</a>";
        echo "<br><a href='salir.php' class='logout-link'>Salir</a>";
    } else {
        header("Location: acceso.php");
        exit();
    }
    ?>

</fieldset>

</body>
</html>