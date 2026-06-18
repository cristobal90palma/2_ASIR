<?php

    //session_start();
    //unset($_SESSION['usuario']);
    //unset($_SESSION['error']);
        setcookie('usuario', "", time() - 3600);
        setcookie('error', false, time() - 3600);
    header("Location: index.php");

?>