<?php

session_start();
//$_SESSION['tareas'] = array();
//Si lo pusieramos directamente, resetearía el valor de la sesión cada vez que vuelve desde gestion_arrays.php

// Verifica si el array 'tareas' NO ha sido inicializado en la sesión.
// Si no existe, lo inicia como un array vacio.
if (!isset($_SESSION['tareas'])) {
    $_SESSION['tareas'] = array();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3 - Tema 4</title>
</head>
<body>  
        <h1>Ejercicio 3 - Tema 4</h1>
        <h1>Nuevas tareas</h1>
        <form action="gestion_arrays.php" method="POST">
        <p>
            <label for="nombre">Lista de Tareas:</label>
            <input type="text" id="tarea" name="tarea" placeholder="Escribe tu tarea">
            <input type="submit" value="Enviar" />
        </p>
        </form>

        <form action="gestion_arrays.php" method="POST">
        <h2>Tareas pendientes</h2>
        <?php
        foreach ($_SESSION['tareas'] as $indice => $tarea) {
            // El checkbox debe tener:
            // 1. name="borrar[]" -> Esto crea un array en $_POST llamado 'borrar' con los valores de los checkboxes marcados. Si pones solo "borrar", no borrará nada.
            // 2. value='{$indice}' -> El valor es la posición (índice) de la tarea en el array de la sesión.
            echo "<p>";
            echo "<input type='checkbox' name='borrar[]' value='{$indice}'>";
            echo $tarea;
            echo "</p>";
        }
                 
        echo "<input type='submit' value='Borrar Tareas Marcadas'/>";
       

        ?>
        </form>
        
        <br>    
        <a href="logout.php">Cerrar Sesión - CUIDADO: Lo borra todo.</a>
</body>
</html>