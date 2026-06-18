<?php
include_once 'comunes.php';

if (fValidaSesion() == 0) {
    header("Location: acceso.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Correos</title></head>
<body>
    <h1>Bandeja de Entrada</h1>
    <p>Lista de correos de <?php echo $_SESSION['usuario']; ?>...</p>
    <br>
    <a href="areapersonal.php">Volver al Área Personal</a>
</body>
</html>