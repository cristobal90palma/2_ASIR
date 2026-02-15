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
<?php
include_once "funcionesApp.php";
include_once "funcionesLogin.php";
compruebaSesion();
$rows = obtenerMenu();

?>
<body>
    <form action="procesar.php" method="post">
        <input type="hidden" name="tipo" value="pedir">
        
        <label for="tlf">Nombre:</label>
        <input type="text" id="nombre" name="nombre" maxlength="50" required><br><br>
        <label for="tlf">Telefono:</label>
        <input type="number" id="tlf" name="tlf" maxlength="9" required ><br><br>
        <label for="dir">Dirección:</label>
        <input type="text" id="dir" name="dir" maxlength="100" required><br><br>
        
    <br><br>
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
                foreach($rows as $productos){?>
                <tr>
                    <td><?php echo $productos['n_producto']?></td>
                    <td><?php echo $productos['nombre']?></td>
                    <td><?php echo $productos['precio']?></td>
                    <td><input type="checkbox" id="prodSel" name="prodSel[]" value="<?php echo $productos['n_producto']?>"></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
        <br><br>
        <input type="submit" value="Tramitar pedido">
    </form>

<p><a href="pedidos.php">Ver los pedidos.</a></p>
<p><a href="logout.php">Cerrar sesión</a></p>

<?php
    echo obtenerError($_SESSION['error']);
?>
    
</body>
</html>