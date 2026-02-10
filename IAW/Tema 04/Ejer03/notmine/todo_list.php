<?php
// 1. Iniciar la sesión
session_start();

// 2. Inicializar el array de tareas en $_SESSION si no existe
if (!isset($_SESSION['tareas'])) {
    $_SESSION['tareas'] = array();
}

$mensaje = "";

// --- Procesamiento del Formulario ---

// 3. Procesar para añadir nuevas tareas
if (isset($_POST['accion']) && $_POST['accion'] == 'añadir') {
    $nueva_tarea = trim($_POST['tarea_descripcion'] ?? '');

    if (!empty($nueva_tarea)) {
        // Usar array_push para añadir la nueva tarea al final del array
        array_push($_SESSION['tareas'], $nueva_tarea);
        $mensaje = "Tarea añadida correctamente.";
    } else {
        $mensaje = "La descripción de la tarea no puede estar vacía.";
    }
}

// 4. Procesar las solicitudes de borrado de tareas
if (isset($_POST['accion']) && $_POST['accion'] == 'borrar') {
    
    // Obtenemos los índices de las tareas marcadas para borrar
    $indices_a_borrar = $_POST['borrar_tarea'] ?? array();
    
    // Convertir a array si solo se marcó un elemento (PHP a veces lo pasa como string/int)
    if (!is_array($indices_a_borrar)) {
        $indices_a_borrar = array($indices_a_borrar);
    }

    // Para evitar problemas de índice al borrar, borramos de mayor a menor índice.
    // Esto asegura que el índice de la siguiente tarea a borrar no se vea afectado por la eliminación anterior.
    rsort($indices_a_borrar);

    if (!empty($indices_a_borrar)) {
        $tareas_eliminadas = 0;
        foreach ($indices_a_borrar as $indice) {
            
            // Verificamos que el índice sea válido (numérico y dentro del rango)
            if (is_numeric($indice) && $indice >= 0 && $indice < count($_SESSION['tareas'])) {
                // Usar array_splice para eliminar el elemento en la posición $indice.
                // Los parámetros son: (array, inicio, longitud)
                array_splice($_SESSION['tareas'], $indice, 1);
                $tareas_eliminadas++;
            }
        }
        
        if ($tareas_eliminadas > 0) {
            $mensaje = "$tareas_eliminadas tarea(s) eliminada(s) correctamente.";
        } else {
            $mensaje = "No se encontraron tareas válidas para eliminar.";
        }
    } else {
        $mensaje = "No se seleccionó ninguna tarea para borrar.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas (To-Do List) con Sesiones PHP</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .tarea-list { border: 1px solid #ccc; padding: 15px; max-width: 400px; margin-top: 20px; }
        .tarea-item { padding: 5px 0; border-bottom: 1px dotted #eee; display: flex; align-items: center; }
        .tarea-item:last-child { border-bottom: none; }
        .tarea-item input[type="checkbox"] { margin-right: 10px; }
        .mensaje { margin-top: 10px; padding: 10px; border: 1px solid green; background-color: #e6ffe6; color: green; }
        .formulario-borrar { margin-top: 15px; }
    </style>
</head>
<body>

    <h1>📋 Mi Lista de Tareas</h1>

    <?php if (!empty($mensaje)): ?>
        <div class="mensaje"><?php echo htmlspecialchars($mensaje); ?></div>
    <?php endif; ?>

    <h2>Añadir Nueva Tarea</h2>
    <form action="todo_list.php" method="post">
        <label for="tarea_descripcion">Tarea:</label>
        <input type="text" id="tarea_descripcion" name="tarea_descripcion" placeholder="Descripción de la tarea" required>
        <input type="hidden" name="accion" value="añadir">
        <button type="submit">Añadir Tarea</button>
    </form>

    <hr>

    <h2>Tareas Pendientes (<?php echo count($_SESSION['tareas']); ?>)</h2>

    <?php if (empty($_SESSION['tareas'])): ?>
        <p>No tienes tareas pendientes. ¡Añade una nueva!</p>
    <?php else: ?>
        
        <form action="todo_list.php" method="post" class="formulario-borrar">
            <input type="hidden" name="accion" value="borrar">

            <div class="tarea-list">
                <?php 
                // Iterar sobre el array de tareas almacenado en la sesión
                foreach ($_SESSION['tareas'] as $indice => $tarea): 
                ?>
                    <div class="tarea-item">
                        <input type="checkbox" id="tarea_<?php echo $indice; ?>" name="borrar_tarea[]" value="<?php echo $indice; ?>">
                        <label for="tarea_<?php echo $indice; ?>"><?php echo htmlspecialchars($tarea); ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit" style="margin-top: 10px;">Eliminar Tareas Marcadas</button>
        </form>

    <?php endif; ?>

</body>
</html>