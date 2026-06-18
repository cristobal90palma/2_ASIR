<?php

    session_start();
    //Borra ambas variables, para cerrar las sesiones exitosas y cualquier mensaje de error.
    //Si no se borra el error, cuando vuelvas a index.php tomará el mensaje de error como si estuviese activo.
    unset($_SESSION['usuario']);
    unset($_SESSION['error']);
    header("Location: index.php");


?>