<?php
    // Para borrar una cookie, se pone una fecha de expiración en el pasado
    setcookie("mis_tareas", "", time() - 3600, "/");
    header("Location: arrays.php");
    exit();
?>