<?php
session_start();

//Añadir tarea.
if (isset($_POST['tarea']) && $_POST['tarea']!="") {
    $nueva_tarea = $_POST['tarea'];
    array_push($_SESSION['tareas'], $nueva_tarea);
    //print_r($_SESSION['tareas']);
    //Nos devuelve a arrays.php. No estoy seguro de si quitar exit.
    header("Location: arrays.php");
    //exit();

    //Borrar tareas
} elseif (isset($_POST['borrar']) && is_array($_POST['borrar'])) {
    // Los metemos en una variable
    $indices_a_borrar = $_POST['borrar'];
    // MUY IMPORTANTE: Ordenar los índices de forma DESCENDENTE
    // Si borramos primero el índice 0, todas las tareas se "mueven".
    // Si borramos de mayor a menor índice, las posiciones de los elementos anteriores no cambian.
    // Te dará problemas a la hora de borrar.
    rsort($indices_a_borrar);
    foreach ($indices_a_borrar as $indice) {
        // array_splice(array, inicio, cantidad)
        // 1. array: El array al que le vamos a quitar elementos.
        // 2. inicio: El índice (posición) desde donde empezar a borrar (es decir, la tarea que se ha marcado, ten en cuenta que va por cada una que has marcado).
        // 3. cantidad: Cuántos elementos borrar (1 en este caso => Solo una porque vamos de tarea en tarea con el foreach).
        array_splice($_SESSION['tareas'], $indice, 1);
    }
    header("Location: arrays.php");
    //exit();
}



else {
    //echo "No se ha enviado ninguna tarea";
    header("Location: arrays.php");
    //exit();
}



?>