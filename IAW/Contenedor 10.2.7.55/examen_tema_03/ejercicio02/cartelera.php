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
//Fin del array.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera</title>
</head>
<body>
    <h1>CINE IES DH</h1>
    <?php
    foreach ($peliculas as $codigo_pelicula => $datos_pelicula) {
        echo "===============================<br>";
        echo "Película ".$codigo_pelicula."\n<br>";
        echo "Descripción ".$datos_pelicula['Descripcion']."\n<br>";
        echo "Género ".$datos_pelicula['Genero']."\n<br>";
        echo "Precio ".$datos_pelicula['Precio']."\n<br>";
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

</body>
</html>






<?php


?>