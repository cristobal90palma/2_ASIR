<?php
session_start();
include_once("comunes.php");

// Validar sesión activa 
if (fValidaSesion() == 0) {
    header("Location: acceso.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Área Personal</title></head>
<body style="background-color: #A9D0F5;"> <form method="post" action="areapersonal.php">
    <h1>El área personal de <?php echo $_SESSION['usuario']; ?></h1> <ul>
        <li><a href="correos.php">Correos</a></li> <li><a href="salir.php">Salir</a></li> </ul>
</body>
</html>