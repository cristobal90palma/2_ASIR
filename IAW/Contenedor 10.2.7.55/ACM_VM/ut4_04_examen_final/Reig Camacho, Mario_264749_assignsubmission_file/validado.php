<?php
session_start();
include_once("comun.php");

// Validar sesión activa 
if (fValidaSesion() == 0) {
    header("Location: formulario.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Se valido</title></head>
<body > <form method="post" action="areapersonal.php">
    <h1>El área personal de <?php echo $_SESSION['usuario']; ?></h1> <ul>
        <li><a href="salir.php">Salir</a></li> </ul>
</body>
</html>