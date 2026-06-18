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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera</title>
</head>
<body>

    <p>CINE IES DH</p>
    <?php
    foreach ($peliculas as $codigo_peli => $datos_peli) {
        echo "<p>======================</p><br>";
        echo "Pelicula ".$codigo_peli."\n<br>";
        echo "Nombre: ".$datos_peli['Titulo']."\n<br>";
        echo "Descripcion: ".$datos_peli['Descripcion']."\n<br>";
        echo "Genero: ".$datos_peli['Genero']."\n<br>";
        echo "Precio: ".$datos_peli['Precio']."\n<br>";
    }
    ?>
    <form action="calcular_entradas.php" method="POST">
        <h2>Compra de entradas.</h2>
        <label>Introduzca el código de la película: </label>
        <input type="text" id="codigo_pelicula" name="codigo_pelicula"><br><br>
                <label>Introduzca el número de entradas: </label>
        <input type="text" id="numero_entradas" name="numero_entradas"><br><br>
                <label>Introduzca la sesión (M, T o N): </label>
        <input type="text" id="tipo_sesion" name="tipo_sesion"><br><br>
    
    <button type="submit">
        Comprar entradas
    </button>

    </form>

    
</body>
</html>





<?php



?>