<?php
include_once 'comunes.php';

if (fValidaSesion() == 0) {
    header("Location: acceso.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Área Personal</title></head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['usuario']; ?></h1>
    <p>Has accedido a tu área personal de forma segura.</p>
    <ul>
        <li><a href="correos.php">Correos</a></li>
        <li><a href="salir.php">Salir</a></li>
    </ul>
</body>
</html>