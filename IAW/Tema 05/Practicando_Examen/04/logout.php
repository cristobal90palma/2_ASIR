<?php

    session_start();

    if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
    }

    unset($_SESSION['user']);
    unset($_SESSION['error_login']);
    session_unset();    // Libera todas las variables de sesión
    session_destroy();  // Destruye la sesión
    header("Location: acceso.php");

?>