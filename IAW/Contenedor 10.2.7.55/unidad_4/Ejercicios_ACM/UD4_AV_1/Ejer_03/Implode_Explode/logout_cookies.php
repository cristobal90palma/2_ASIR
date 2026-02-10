<?php
    // Para borrar, ponemos la fecha en el pasado (hace una hora)
    setcookie("tareas", "", time() - 3600, "/");
    header("Location: arrays.php");
?>