<?php

    //session_start();

    if (isset($_COOKIE['usuario']) && $_COOKIE['usuario']!=''){
        echo "Has iniciado sesión.<br/>";
        echo "Estás en tu página privada.<br/>";
        echo "<a href='logout.php'>Cerrar sesión</a>";
    } else {
        echo "No tienes acceso a esta página.<br/>";
        echo "<a href='index.php'>Iniciar sesión</a>";
    }

?>