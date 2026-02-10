<?php
    //session_start();
    if ($_COOKIE["nombre"]!=null and $_COOKIE["error"]==null){
        echo "Bienvenido. Está usted dentro de una página privada.<br>";
        echo "<p><a href='cerrar.php'>Cerrar sesión</a></p>";
    } else {
        header("Location: login.php");
    }
?>