<?php
    session_start();
    unset($_SESSION['nombre']); //Esto borra al usuario de la sesión
    echo "Sesión cerrada correctamente.<br/><br/>";
    echo "<a href='login.php'>Iniciar Sesión</a>";
?>