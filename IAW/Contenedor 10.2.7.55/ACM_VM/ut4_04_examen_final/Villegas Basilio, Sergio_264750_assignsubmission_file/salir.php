<?php

    session_start();
    unset($_SESSION['misesion']);
    unset($_SESSION['correo']);
    header("Location: acceso.php");

?>