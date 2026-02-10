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



$seleccion_producto = $_POST['seleccion_producto'];
$unidades_comprar = $_POST['unidades_comprar'];
//$stock_actual = $productos['$codigo_producto']['Stock'];


if (isset($_POST['seleccion_producto']) && $_POST['seleccion_producto']!="" &&
    isset($_POST['unidades_comprar']) && $_POST['unidades_comprar']!="") {
        

        if($unidades_comprar > $productos[$codigo_producto]['Stock']) {
            echo "Detalles de la Transacción.\n";
            echo "Error: Stock Insuficiente.\n";
                                
                                //$peliculas[$codigo_pelicula]['Nombre']
            echo "Producto: ".$productos[$codigo_producto]['Producto']."\n";
            echo "Usted solicitó ".$unidades_comprar." unidades, pero solo quedan ".$productos[$codigo_producto]['Stock']."\n";
            ?>

            <a href='ejer02_A.php'>Volver al Catálogo</a>
            <?php

        } else {
            echo "Detalles de la Transacción.\n";
            echo "Pedido confirmado con éxito.\n";
            echo "Producto: ".$productos[$codigo_producto]['Producto']."\n";
            echo "Cantidad solicitada: ".$unidades_comprar."\n";
            echo "Precio Unitario: ".$productos[$codigo_producto]['Precio_Unitario']."";
            
            $total_pagar = 0;
            $total_pagar = $unidades_comprar * $productos[$codigo_producto]['Precio_Unitario']."\n";
            echo "Total a pagar: ".$total_pagar."\n";
        }


    } //Else de que los valos POST estén vacios

    else {
        echo "Faltan datos";
        exit;
    }
    



















?>