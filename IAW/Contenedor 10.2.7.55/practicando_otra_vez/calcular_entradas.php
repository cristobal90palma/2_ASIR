<?php
$peliculas = [
        "1" => [
            "Titulo"      => "Heat",
            "Descripcion" => "Un grupo de ladrones de bancos tiene en jaque a la policía",
            "Genero"      => "Thriller",
            "Precio"      => 10 
        ],

        "2" => [
            "Titulo"      => "Independence Day",
            "Descripcion" => "Unos extraterrestres quieren destruir la Tierra",
            "Genero"      => "Ciencia Ficcion",
            "Precio"      => 12 
        ],

        "3" => [
            "Titulo"      => "Neon Genesis Evangelion",
            "Descripcion" => "Unos ángeles quieren destruir la Tierra",
            "Genero"      => "Animacion",
            "Precio"      => 11 
        ]


];

$precio_total = 0;
$codigo_pelicula = $_POST['codigo_pelicula'];
$numero_entradas = $_POST['numero_entradas'];
$tipo_sesion = $_POST['tipo_sesion'];

//Primer if
if (isset($_POST['numero_entradas']) && $_POST['numero_entradas']!="" &&
isset($_POST['codigo_pelicula']) && $_POST['codigo_pelicula']!="" &&
isset($_POST['tipo_sesion']) && $_POST['tipo_sesion']!="") {

    //validar sesión del POST con el del Array
    if (!isset($peliculas[$codigo_pelicula])) {
        echo "Error: Código de película no válido.";
    } elseif ($numero_entradas > 10 || $numero_entradas <= 0) {
        echo "Error con el número de entradas: debe ser entre 1 y 10.";
    }

    //Calculamos descuento sesiones



    switch ($tipo_sesion) {
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
            echo "Error al elegir sesión. Debe ser M, T o N.\n";
            exit;
    }

    // Ya tenemos validado peli, entradas y descuento. Ahora hay que calcular.

    $precio_base_unidad = $peliculas[$codigo_pelicula]['Precio'];

    $precio_unidad_final = $precio_base_unidad * (1- $descuento_aplicado);
    $precio_total = $precio_unidad_final * $numero_entradas;

    $precio_sin_descuento = $precio_base_unidad * $numero_entradas;
    $descuento_total_euros = $precio_sin_descuento - $precio_total;

    echo "<p>Titulo de la película: ".$peliculas[$codigo_pelicula]['Titulo']."</p>";
    echo "<p>Número de entradas compradas: ".$numero_entradas."</p>";
    echo "<p>Sesión elegida: ".$tipo_sesion."</p>";
    echo "<p>Precios sin descuento: ".$precio_sin_descuento."</p>";
    echo "<p>Descuento total aplicado: ".$descuento_total_euros."</p>";
    echo "<p>Precio final: ".$precio_total."</p>";


} //¿Final del primer if?









?>