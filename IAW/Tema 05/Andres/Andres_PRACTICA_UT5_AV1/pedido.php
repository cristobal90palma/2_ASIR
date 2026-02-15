<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido finalizado</title>
</head>
<body>
<?php
include_once "funcionesApp.php";
include_once "funcionesLogin.php";
compruebaSesion();
$pedidos = $_SESSION['pedidos'];
?>

<h1>Resumen del pedido</h1>
<p>Nombre: <?php echo $pedidos[0]['nombre']?></p>
<p>Dirección: <?php echo $pedidos[0]['direccion']?></p>
<p>Teléfono: <?php echo $pedidos[0]['telefono']?></p>
<h2>Productos:</h2>
<ul>
    <?php
    foreach($_SESSION['productos'] as $prod){

        echo "<li>".$prod['nombre']."</li>";
        $n += 1;
    }
    ?>
</ul>
<h3>Importe total: <?php echo $pedidos[0]['importe']?> €</h3>
<p><i>Su pedido se está procesando</i></p>
<br><br>
<p><a href="pedir.php">Volver a pedir</a></p>
<p><a href="pedidos.php">Ver los pedidos.</a></p>
<p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
<?php
#limpiamos las variables de sesion
unset($_SESSION['pedidos']);
unset($_SESSION['productos']);
?>