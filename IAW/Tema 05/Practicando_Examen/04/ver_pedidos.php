<?php
include_once "bbdd.php";
session_start();

// Control de sesión
if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
    header("Location: acceso.php");
    exit;
}

// Guardamos al usuario que ha iniciado la sesión
$usuario_logueado = $_SESSION['user'];

try {
    $conexion = mysqli_connect($servidor, $user, $password, $bd);

    // Consulta con JOIN y GROUP_CONCAT para listar los nombres de los productos --> La relación producto y pedido está en pedido-producto
    // Como un pedido tiene varios productos (varias filas), esta función los "encadena" todos en una sola celda separados por una coma
    // Usamos LEFT JOIN para que no desaparezca el pedido si hubo algún error en la relación
    $sql = "SELECT p.npedido, p.nombre, p.direccion, p.telefono, p.importe, p.username,
            GROUP_CONCAT(pr.nombre SEPARATOR ', ') AS lista_productos
            FROM pedido p
            LEFT JOIN `pedido-producto` pp ON p.npedido = pp.npedido
            LEFT JOIN producto pr ON pp.nproducto = pr.nproducto
            WHERE p.username = '$usuario_logueado'
            GROUP BY p.npedido";
    
    // Guarda y manda.
    $resultado = mysqli_query($conexion, $sql);
    $pedidos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    mysqli_close($conexion);
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Pedidos - IAW</title>
</head>
<body>

    <table border="1">
        <thead>
            <tr>
                <!--colspan es para que el encabezado "pedidos" ocupe el mismo espacio que las 8 columnas de abajo-->
                <th colspan="8">Pedidos</th>
            </tr>
            <!-- "tr" es la table row y "th" es la table head  -->
            <tr>
                <th>Nº Pedido</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Importe</th>
                <th>Username</th>
                <th>Pedido</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Si hay más de 0 pedidos
            if (count($pedidos) > 0) {
                // recorremos datos con foreach. El importe usa un number_format para los decimales
                // Los datos se obtienen de la variable $pedidos, que guarda el resultado del select anterior.
                foreach ($pedidos as $fila) {
                    // "td" es table data, distinta de la table head.
                    echo "<tr>";
                    echo "<td>" . $fila['npedido'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['direccion'] . "</td>";
                    echo "<td>" . $fila['telefono'] . "</td>";
                    echo "<td>" . number_format($fila['importe'], 2) . " €</td>";
                    echo "<td>" . $fila['username'] . "</td>";
                    echo "<td>" . $fila['lista_productos'] . "</td>";
                    echo "<td>
                            <a href='borrar_pedido.php?id=" . $fila['npedido'] . "' onclick=\"return confirm('¿Seguro que deseas eliminar este pedido?')\">
                               ELIMINAR
                            </a>
                          </td>";
                          //Boton de eliminar con ventana de advertencia. la "id" es el valor de npedido.
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                // Alinea el texto en el centro y que ocupe el mismo espacio que la cabecera
                echo "<td colspan='8' style='text-align: center;'>No tienes pedidos registrados.</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>


        <br>
        <a href="pedido.php">Volver al formulario</a>


</body>
</html>