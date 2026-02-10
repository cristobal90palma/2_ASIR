<?php
    session_start();
    unset($_SESSION['nombre']);
    echo "Sesión cerrada correctamente.<br/><br/>";
    echo "<a href='login.php'>Iniciar sesión</a>";
?>