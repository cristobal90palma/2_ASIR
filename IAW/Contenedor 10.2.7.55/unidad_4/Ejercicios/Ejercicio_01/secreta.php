<?php

    session_start();
    //Aquí solo comprueba que los datos no están vacíos, porque ya se ha comprobado su autenticidad en login.php
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']!="") {
        echo "Has iniciadio sesión.</br>";
        echo "Estas en una página privada.</br>";
        echo "<a href='logout.php'>Cerrar sesión.</a></br>";
    } else {
        echo "No tienes acceso a esta página.</br>";
        echo "<a href='index.php'>Iniciar Sesión</a></br>";
    }





?>