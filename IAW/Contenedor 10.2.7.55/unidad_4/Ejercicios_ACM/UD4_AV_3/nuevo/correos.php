<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Correos</title>
    </head>
<body>

<fieldset style="width: 300px; padding: 20px;">

    <?php
    session_start();
    require_once 'comunes.php';

    if (fValidaSesion() == 1) {
        echo "<h1>Bandeja de Correos</h1>"; 
        echo "<p>Los correos de " . $_SESSION['usuario'] . ".</p>";
        echo "<a href='areapersonal.php'>Volver a mi área personal</a>";
    } else {
        header("Location: acceso.php"); 
        exit();
    }
    ?>

</fieldset>
</body>
</html>