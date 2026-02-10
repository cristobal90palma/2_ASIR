<?php
// Recuperamos lo que ya había en la cookie y lo convertimos a array
if (isset($_COOKIE['tareas']) && $_COOKIE['tareas'] != "") {
    $tareas = explode("|", $_COOKIE['tareas']);
} else {
    $tareas = array();
}

// AÑADIR
if (isset($_POST['tarea']) && $_POST['tarea'] != "") {
    // Usamos array_push para poner el valor en la última posición del array.
    array_push($tareas, $_POST['tarea']);
    
    // Convertimos el array a texto separado por "|" para guardarlo en la cookie
    $texto_cookie = implode("|", $tareas);
    /*
    Esta función toma cada elemento del array y los pega uno tras otro, poniendo el símbolo | entre ellos.

    Si tu array es: ["Lavar coche", "Comprar pan"]

    El resultado de implode es: "Lavar coche|Comprar pan"

    */

    setcookie("tareas", $texto_cookie, time() + 3600, "/");
    
    header("Location: arrays.php");

// BORRAR
} elseif (isset($_POST['borrar'])) {
    $indices_a_borrar = $_POST['borrar'];
    
    // Ordenamos de mayor a menor para no desordenar el array al borrar
    rsort($indices_a_borrar);
    
    /* La función array_splice() es la encargada de extirpar o eliminar un elemento específico del array de tareas
     basándose en su posición (índice).
     La sintaxis que usas es: array_splice($array, $posicion, $cantidad).

    $tareas: Es el array donde están todas tus tareas (ya convertido desde la cookie).

    $indice: Es el número de la posición que el usuario marcó en el checkbox (por ejemplo, la tarea 0, la 1, etc.).

    1: Indica que solo queremos borrar un elemento a partir de esa posición.

    */

    foreach ($indices_a_borrar as $indice) {
        array_splice($tareas, $indice, 1);
    }
    
    // Guardamos el array actualizado (si queda vacío, borramos la cookie)
    $texto_cookie = implode("|", $tareas);
    setcookie("tareas", $texto_cookie, time() + 3600, "/");
    
    header("Location: arrays.php");
} else {
    header("Location: arrays.php");
}
?>