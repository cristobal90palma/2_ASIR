<?php
    include_once "bbdd.php";
    session_start();

    try {

        
        // Control de sesión (basado en tu archivo de averías)
        if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
            header("Location: acceso.php");
            exit;
        }
        

        // Conexión a la base de datos
        $conexion = mysqli_connect($servidor, $user, $password, $bd);

        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Consultamos todos los productos
        $sql = "SELECT * FROM producto";
        $resultado_sql = mysqli_query($conexion, $sql);

        if (!$resultado_sql) {
            echo "Error en la consulta: " . mysqli_error($conexion);
        }

        // Convertimos el resultado en un array para usar foreach
        $productos = mysqli_fetch_all($resultado_sql, MYSQLI_ASSOC);

        mysqli_close($conexion);

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido online - IAW</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .contenedor { width: 700px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        h2 { background-color: #333; color: white; padding: 10px; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #eee; }
        .btn { 
            padding: 10px 15px; 
            background-color: #333; 
            color: white; 
            border: none; 
            cursor: pointer; 
            border-radius: 4px; 
            text-decoration: none; 
            display: inline-block;
            margin-bottom: 10px; /* Añade separación vertical */
        }

        .btn-rojo {
            background-color: #d9534f; /* Color rojo */
        }

        .btn-rojo:hover {
            background-color: #c9302c; /* Rojo más oscuro al pasar el ratón */
        }
        label { font-weight: bold; }
        input[type="text"] { width: 95%; padding: 5px; margin-top: 5px; }
        .acciones { margin-top: 20px; display: flex; gap: 10px; }
    </style>
</head>
<body>

<div class="contenedor">
    <h2>Datos del cliente</h2>

    <form action="procesarPedido.php" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre"><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono"><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion"><br><br>

        <h2>Listado de Productos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Primer foreach: recorre cada fila (producto)
                foreach ($productos as $producto) {
                    echo "<tr>";
                    
                    // Segundo foreach: recorre cada columna dinámicamente
                    foreach ($producto as $columna => $dato) {
                        // Si es el precio, le añadimos el símbolo €
                        $mostrar = ($columna == 'precio') ? $dato . " €" : $dato;
                        echo "<td>" . $mostrar . "</td>";
                    }

                    // Celda para el checkbox usando el ID del producto
                    echo "<td><input type='checkbox' name='productos[]' value='" . $producto['nproducto'] . "'></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <input type="submit" class="btn" value="Realizar pedido">
    </form>
    
    <br>
    <?php
    ?>
<div class="acciones">
    <a href="ver_pedidos.php" class="btn">Ver mis pedidos</a>
    <br> <a href="logout.php" class="btn btn-rojo">CERRAR SESIÓN</a>
</div>

</div>

</body>
</html>

<?php


?>