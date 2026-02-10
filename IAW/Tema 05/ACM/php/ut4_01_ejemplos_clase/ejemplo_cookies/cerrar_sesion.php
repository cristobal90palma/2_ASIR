<?php
    setcookie('nombre', $_POST['nombre'], time() - 10*60*60);
    echo "Sesión cerrada correctamente.<br/><br/>";
    echo "<a href='login.php'>Iniciar sesión</a>";
?>