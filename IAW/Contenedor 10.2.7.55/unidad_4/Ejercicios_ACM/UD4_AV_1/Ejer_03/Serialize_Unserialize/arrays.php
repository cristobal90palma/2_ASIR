<?php
$cookie_name = "mis_tareas";

// Si la cookie existe, la deserializamos para obtener el array. 
// Si no, inicializamos un array vacío.
if (isset($_COOKIE[$cookie_name])) {
    $tareas = unserialize($_COOKIE[$cookie_name]);
} else {
    $tareas = array();
}

/* unserialize tiene la función de "reconstruir" tus datos para que PHP pueda entenderlos de nuevo como una lista.


*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Cookies</title>
</head>
<body>  
    <h1>Ejercicio 3 - Lista con Cookies</h1>
    <form action="gestion_cookies.php" method="POST">
        <p>
            <label for="tarea">Nueva Tarea:</label>
            <input type="text" id="tarea" name="tarea" placeholder="Escribe tu tarea">
            <input type="submit" value="Añadir" />
        </p>
    </form>

    <form action="gestion_cookies.php" method="POST">
        <h2>Tareas pendientes</h2>
        <?php
        if (!empty($tareas)) {
            foreach ($tareas as $indice => $tarea) {
                echo "<p>";
            // El checkbox debe tener:
            // 1. name="borrar[]" -> Esto crea un array en $_POST llamado 'borrar' con los valores de los checkboxes marcados. Si pones solo "borrar", no borrará nada.
            // 2. value='{$indice}' -> El valor es la posición (índice) de la tarea en el array de la sesión.
                echo "<input type='checkbox' name='borrar[]' value='{$indice}'> ";
                echo htmlspecialchars($tarea);
                echo "</p>";
            }
            echo "<input type='submit' value='Borrar Tareas Marcadas'/>";
        } else {
            echo "<p>No hay tareas en la lista.</p>";
        }
        ?>
    </form>
    
    <br>    
    <a href="logout.php">Borrar todas las Cookies (Reset)</a>
</body>
</html>