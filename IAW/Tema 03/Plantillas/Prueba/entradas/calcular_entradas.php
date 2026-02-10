<?php

$peliculas = [
    "sala1" => [
        "Nombre"        => "Terminator",
        "Descripcion"   => "Un robot del futuro viene a liquidar al futuro lider de la resitencia humana",
        "Genero"        => "Acción",
        "Precio"        => 8
    ],
        "sala2" => [
        "Nombre"        => "Rambo 2",
        "Descripcion"   => "Rambo, un veterano de la Guerra de Vietnam, es reclutado de nuevo para llevar a cabo una misión tras las líneas enemigas",
        "Genero"        => "Acción",
        "Precio"        => 7
    ],
        "sala3" => [
        "Nombre"        => "El Señor de los Anillos: La Comunidad del Anillo",
        "Descripcion"   => "Sauron quiere dominar a los pueblos libres de la Tierra Media. Un grupo de valientes se une en una misión desesperada para detenerlo",
        "Genero"        => "Fantasía",
        "Precio"        => 9
    ],
        "sala4" => [
        "Nombre"        => "La Caza del Octubre Rojo",
        "Descripcion"   => "Un Submarino Soviético se dispone a realizar una misión suicida para atacar a los Estados Unidos.",
        "Genero"        => "Thriller",
        "Precio"        => 4
    ],
        "sala5" => [
        "Nombre"        => "Dos Tontos muy tontos",
        "Descripcion"   => "Dos amigos que son muy tontos hacen tonterías",
        "Genero"        => "Comedia",
        "Precio"        => 6.50
    ]
        ];


    $precio_total = 0;
    $numero_entradas = (int)$_POST['numero_entradas']; // Convertimos a entero para las validaciones
    $codigo_pelicula = $_POST['codigo_pelicula'];
    $sesion = strtoupper($_POST['sesion']); // Convertimos a mayúsculas para que el switch funcione

if (isset($_POST['numero_entradas']) && $_POST['numero_entradas']!="" &&
    isset($_POST['codigo_pelicula']) && $_POST['codigo_pelicula']!="" &&
    isset($_POST['sesion']) && $_POST['sesion']!="") {

    // 2. VALIDACIÓN Y EXTRACCIÓN DEL PRECIO
    if (!isset($peliculas[$codigo_pelicula])) {
        echo "Error: Código de película no válido.";
    } else if ($numero_entradas > 10 || $numero_entradas <= 0) {
        echo "Error con el número de entradas: debe ser entre 1 y 10.";
    } else {
        // --- OBTENEMOS EL PRECIO BASE DE LA PELÍCULA ---
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

        //Calcular el precio total:

        $precio_unidad_final = $precio_base_unidad * (1 - $descuento_aplicado);
        $precio_total = $precio_unidad_final * $numero_entradas;

        // PARA CALCULAR EL DESCUENTO TOTAL EN EUROS
        $precio_sin_descuento = $precio_base_unidad * $numero_entradas;
        $descuento_total_euros = $precio_sin_descuento - $precio_total;

        //Mostrar el resultado
        echo "<p>Título de la película: " . $peliculas[$codigo_pelicula]['Nombre'] . "</p>";
        echo "<p>Número de entradas compradas: " . $numero_entradas . "</p>";
        echo "<p>Sesión elegida: " . $sesion . " (Descuento: " . ($descuento_aplicado * 100) . "%)</p>";
        echo "<p>Precio base/entrada: " . $precio_base_unidad . " €</p>";
        echo "<p>Descuento total aplicado: ". $descuento_total_euros."€</p>";
        echo "<h2>El Precio Total es: " . number_format($precio_total, 2) . " €</h2>";
    }




    }


?>