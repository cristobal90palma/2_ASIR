<?php
include_once "funcionesLogin.php";
include_once "funcionesApp.php";
session_start();
compruebaSesion();

$listado = obtenerListadoProducto();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <style>
        table, th, td {
            border: 1px, solid, black;
        }
    </style>
</head>
<body>
    <h1>Listado de pedidos</h1>
    <form action="procesar.php" method="post">
        <input type="hidden" name="tipo" value="borrar">
    <table>
        <thead>
            <tr>
                <th>Nº Pedido</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Importe</th>
                <th>Pedido</th>
                <th>Borrar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listado as $pedido){?>
                <tr>
                    <td><?php echo $pedido['nPedido']?></td>
                    <td><?php echo $pedido['nombre']?></td>
                    <td><?php echo $pedido['direccion']?></td>
                    <td><?php echo $pedido['telefono']?></td>
                    <td><?php echo $pedido['importe']?> €</td>
                    <td>
                        <?php
                            echo obtenerProductosPorId($pedido['nPedido']);
                        ?>
                    </td>
                    <td><input type="checkbox" id="borrar" name="id[]" value="<?php echo $pedido['nPedido']?>"></td>
                </tr>
        <?php
                }
            ?>
        </tbody>
        
    </table>
    <br><br>
    <input type="submit" value="Borrar">
    </form>
<p><a href="pedir.php">Volver a pedir</a></p>
<p><a href="logout.php">Cerrar sesión</a></p>


</body>
</html>