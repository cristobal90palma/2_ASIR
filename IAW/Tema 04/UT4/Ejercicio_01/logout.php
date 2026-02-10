<?php

    session_start();
    unset($_SESSION['usuario']);
    unset($_SESSION['error']);
    header("Location: index.php");


?>