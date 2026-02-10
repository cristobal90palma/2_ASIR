<?php
    //session_start();
    //session_destroy();
    setcookie('error', null, time() - 6400);
    setcookie('nombre', null, time() - 6400);
    header("Location: login.php");
?>