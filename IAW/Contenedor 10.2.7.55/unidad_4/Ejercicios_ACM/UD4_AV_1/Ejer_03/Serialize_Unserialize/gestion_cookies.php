<?php
$cookie_name = "mis_tareas";

// Recuperamos el array actual de la cookie
//unserialize() actúa como un "traductor" o "reconstructor" de datos.
if (isset($_COOKIE[$cookie_name])) {
    $tareas = unserialize($_COOKIE[$cookie_name]);
} else {
    $tareas = array();
}

// LÓGICA PARA AÑADIR
if (isset($_POST['tarea']) && trim($_POST['tarea']) != "") {
    // Usamos array_push como pide el ejercicio
    array_push($tareas, $_POST['tarea']);
} 
// LÓGICA PARA BORRAR
elseif (isset($_POST['borrar']) && is_array($_POST['borrar'])) {
    $indices_a_borrar = $_POST['borrar'];
    rsort($indices_a_borrar); // Orden descendente para no desordenar el índice al borrar
    
    foreach ($indices_a_borrar as $indice) {
        array_splice($tareas, $indice, 1);
    }
}

// GUARDAR CAMBIOS: Serializamos el array y actualizamos la cookie (expira en 24h)
setcookie($cookie_name, serialize($tareas), time() + 86400, "/");

// Redirigir de vuelta
header("Location: arrays.php");
exit();
?>