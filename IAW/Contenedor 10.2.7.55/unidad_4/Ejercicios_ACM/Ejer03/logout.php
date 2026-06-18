<?php

    session_start();
    unset($_SESSION['tareas']);
    header("Location: arrays.php");

?>