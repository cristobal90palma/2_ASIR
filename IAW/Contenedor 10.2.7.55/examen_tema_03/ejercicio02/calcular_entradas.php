<?php

$peliculas = [
    "pel1" => [
        "Nombre"        => "Terminator",
        "Descripcion"   => "Un robot del futuro viene a liquidar al futuro lider de la resitencia humana",
        "Genero"        => "Acción",
        "Precio"        => 8
    ],
        "pel2" => [
        "Nombre"        => "Rambo 2",
        "Descripcion"   => "Un veterano de Vietname es reclutado para una misión detras de las lineas enemigas",
        "Genero"        => "Acción",
        "Precio"        => 7
    ],
        "pel3" => [
        "Nombre"        => "El Señor de los Anillos: La Comunidad del Anillo",
        "Descripcion"   => "Sauron quiere dominar a los pueblos libres de la Tierra Media. Un grupo de valientes se une en una misión desesperada para detenerlo",
        "Genero"        => "Fantasía",
        "Precio"        => 9
        ]
        ];


    $precio_total = 0;
    $numero_entradas = $_POST['numero_entradas']; 
    $codigo_pelicula = $_POST['codigo_pelicula'];
    $sesion = ($_POST['tipo_sesion']); 

if (isset($_POST['numero_entradas']) && $_POST['numero_entradas']!="" &&
    isset($_POST['codigo_pelicula']) && $_POST['codigo_pelicula']!="" &&
    isset($_POST['tipo_sesion']) && $_POST['tipo_sesion']!="") {

    //Valida sesión
    if (!isset($peliculas[$codigo_pelicula])) {
        echo "Error: Código de película no válido.";
    } else if ($numero_entradas > 10 || $numero_entradas <= 0) {
        echo "Error con el número de entradas: debe ser entre 1 y 10.";
    } else {
        
        $precio_base_unidad = $peliculas[$codigo_pelicula]['Precio'];
        
        $descuento_aplicado = 0;
		
		
        switch ($sesion) {
            case 'M':
                $descuento_aplicado = 0;
                break;
            case 'T':
                $descuento_aplicado = 0.25;
                break;
            case 'N':
                $descuento_aplicado = 0.50;
                break;
            default:
                echo "Has metido una sesión no válida. Solo pueden ser M, T o N.";
                exit;
        }

        
        //hacer cáculo de descuentos y precios bases.

        $precio_unidad_final = $precio_base_unidad * (1 - $descuento_aplicado);
        $precio_total = $precio_unidad_final * $numero_entradas;

       
        $precio_sin_descuento = $precio_base_unidad * $numero_entradas;
        $descuento_total_euros = $precio_sin_descuento - $precio_total;

       
        echo "<p>Título de la película: " . $peliculas[$codigo_pelicula]['Nombre'] . "</p>";
        echo "<p>Número de entradas compradas: " . $numero_entradas . "</p>";
        echo "<p>Sesión elegida: " . $sesion . "</p>";
        echo "<p>Precio sin descuento: " . number_format($precio_base_unidad, 2) . " €</p>";
        echo "<p>Descuento total aplicado: ". number_format($descuento_total_euros, 2)."€</p>";
        echo "<p>Precio final: " . number_format($precio_total, 2) . " €</p>";
    }




    }


?>