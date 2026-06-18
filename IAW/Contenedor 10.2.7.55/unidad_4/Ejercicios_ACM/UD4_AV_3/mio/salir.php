<?php
include_once 'comunes.php';

if (fValidaSesion() == 0) {
    header("Location: acceso.php");
    exit();
}

$inicio = $_SESSION['inicio'];
$ahora = date("Y-m-d H:i:s");

// Destruir sesión
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head><title>Sesión Cerrada</title></head>
<body>
    <h2>Sesión finalizada correctamente</h2>
    <p>Fecha de inicio: <?php echo $inicio; ?></p>
    <p>Fecha actual: <?php echo $ahora; ?></p>
    <br>
    <a href="acceso.php">Ir a la web de acceso</a>
</body>
</html>