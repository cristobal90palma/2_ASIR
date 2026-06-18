<?php
    include_once "bbdd.php";
    session_start();

     //Conexión a la base de datos 
    try {
        // Control de sesión
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

        // Convertimos el resultado en un array
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
</head>
<body>

    <h2>Datos del cliente</h2>

    <form action="procesarPedido.php" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre"><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono"><br><br>

        <label>Dirección:</label><br>
        <input type="text" name="direccion"><br><br>

        <h2>Listado de Productos</h2>
        <table border="1">
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
                    
                    // Segundo foreach: Dentro de cada producto, recorre cada uno de sus campos (ID, nombre, precio).
                    foreach ($producto as $columna => $dato) {
                        // Comprueba si la columna que está leyendo es la de 'precio'. Si es así, le concatena el símbolo €. Si no, deja el dato tal cual.
                        if ($columna == 'precio') {
                            $mostrar = $dato . " €"; // Si es la columna precio, le pone el euro
                            } else {
                            $mostrar = $dato; // Si no, deja el dato tal cual
                            }
                        //Imprime el valor dentro de una celda de tabla <td>.
                        echo "<td>" . $mostrar . "</td>";
                        }

                    // Celda para el checkbox usando el ID del producto. Usa el valor de $producto['nproducto'] para la id en value.
                    // Al usar name='productos[]' en checkbox, PHP recibirá todos los seleccionados como un array.
                    echo "<td><input type='checkbox' name='productos[]' value='" . $producto['nproducto'] . "'></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <input type="submit" value="Realizar pedido">
    </form>
    
    <br>


        <a href="ver_pedidos.php">Ver mis pedidos</a>
        <br>
        <a href="logout.php">CERRAR SESIÓN</a>
  

</body>
</html>