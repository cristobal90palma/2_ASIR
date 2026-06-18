<?php
// Si la cookie existe, cortamos el texto por el símbolo "|" para crear el array.
// Si no existe, creamos un array vacío.
if (isset($_COOKIE['tareas']) && $_COOKIE['tareas'] != "") {
    $tareas = explode("|", $_COOKIE['tareas']);
} else {
    $tareas = array();
}

//¿Que hace explode?
/*
La función explode busca ese símbolo separador (|) y corta la cadena de texto cada vez que lo encuentra.

    Entrada (String): "Comprar pan|Estudiar PHP|Ir al gimnasio".

    Acción: Detecta el "palito" | y separa las palabras.

    Salida (Array): 1. [0] => "Comprar pan" 2. [1] => "Estudiar PHP" 3. [2] => "Ir al gimnasio"

*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 - Cookies Sencillo</title>
</head>
<body>  
    <h1>Lista de Tareas (con Cookies)</h1>
    
    <form action="gestion_cookies.php" method="POST">
        <p>
            <label>Nueva Tarea:</label>
            <input type="text" name="tarea" placeholder="Escribe aquí">
            <input type="submit" value="Añadir">
        </p>
    </form>

    <form action="gestion_cookies.php" method="POST">
        <h2>Tareas pendientes</h2>
        <?php
        foreach ($tareas as $indice => $tarea) {
            echo "<p>";
            // El checkbox debe tener:
            // 1. name="borrar[]" -> Esto crea un array en $_POST llamado 'borrar' con los valores de los checkboxes marcados. Si pones solo "borrar", no borrará nada.
            // 2. value='{$indice}' -> El valor es la posición (índice) de la tarea en el array de la sesión.
            echo "<input type='checkbox' name='borrar[]' value='$indice'> $tarea";
            echo "</p>";
        }
        ?>
        <input type="submit" value="Borrar Marcadas">
    </form>
    
    <br>    
    <a href="logout_cookies.php">Limpiar todo</a>
</body>
</html>