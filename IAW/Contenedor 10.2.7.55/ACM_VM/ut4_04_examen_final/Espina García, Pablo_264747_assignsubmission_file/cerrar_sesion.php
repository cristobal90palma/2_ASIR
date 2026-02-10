<?php
    session_start();
    unset($_SESSION['correo']);
    echo "Sesión cerrada correctamente.<br/><br/>";
    echo "<a href='login.php'>Iniciar sesión</a>";
    session_destroy();
?>