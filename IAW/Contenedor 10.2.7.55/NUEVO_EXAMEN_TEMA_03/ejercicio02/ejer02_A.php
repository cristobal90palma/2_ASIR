<?php


$productos = [
    "laptop" => [

        "id"        => "101",
        "Producto"  => "Laptop Gamer Pro",
        "Descripcion" => "Potente portatil con tarjeta grafica dedicada",
        "Precio_Unitario" => 950.00,
        "Stock" => 5,
    ],

    "teclado" => [

        "id"        => "102",
        "Producto"  => "Teclado Mecanico RGB",
        "Descripcion" => "Teclado de respuest rapida con iluminacion personalizable",
        "Precio_Unitario" => 85.50,
        "Stock" => 15,
    ],

    "monitor" => [

        "id"        => "103",
        "Producto"  => "Monitor 4k Curvo",
        "Descripcion" => "Pantalal de alta resolucion ideal para diseño y juegos",
        "Precio_Unitario" => 420.75,
        "Stock" => 8,
    ]

];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
</head>
<body>

    <h1>Catálogo de Productos Disponibles</h1>
    <?php
    foreach ($productos as $codigo_producto => $datos_producto) {
        echo "ID: ".$datos_producto['id']."\n";
        echo "Producto: ".$datos_producto['Producto']."\n";
        echo "Descripcion: ".$datos_producto['Descripcion']."\n";
        echo "Precio Unitario: ".$datos_producto['Precio_Unitario']."\n";
        echo "Stock: ".$datos_producto['Stock']."\n<br><br>";
    }

    ?>

    <form action="calcular_pedido.php" method="POST">

    <h2>Realizar pedido</h2>


    <label for="puesto">Seleccionar Producto:</label>
    <select name="seleccion_producto" id="seleccion_producto">
        <option value="">-- Seleccione --</option>
        <?php
        foreach ($productos as $codigo_producto => $datos_producto) {
            echo "<option value=".$productos[$codigo_producto].">".$datos_producto['Producto']."</option>";
        }


        ?>
        </select>
        
        
        <label>Unidades a comprar:</label>
        <input type="text" name="unidades_comprar"><br><br>


        <input type="submit" value="Confirmar Pedido">
    </form>
    
</body>
</html>





<?php
?>