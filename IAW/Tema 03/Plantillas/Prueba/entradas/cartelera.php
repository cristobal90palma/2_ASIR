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
]

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartelera Cine del Bueno.</title>
</head>
<body>

            <h1>CINE IES DH</h1>
            <p>================</p>
            <?php
            // Recorremos el array principal. $codigo será 'sala1', 'sala2', etc.
            // $pelicula será el array anidado con los datos de la película.
            foreach ($peliculas as $codigo => $pelicula) {
                // Usamos etiquetas HTML (como <p> y <strong>) para formatear la salida.
                echo "<h2>Película $codigo</h2>"; //Muestr el código de la película.
                echo "<p>======================</p>";
                echo "<p>Nombre: ".$pelicula['Nombre']."</p>";
                echo "<p>Descripción: ".$pelicula['Descripcion']."</p>";
                echo "<p>Género: ".$pelicula['Genero']."</p>";
                echo "<p>Precio: ".$pelicula['Precio']." €</p>";
                echo "<hr>"; // Línea separadora para cada película

            }

            ?>

<h2>Compre sus tickets</h2>
    <form action="calcular_entradas.php" method="POST">

        <label for="codigo_pelicula">Introduzca el código de la película:</label>
        <input type="text" id="codigo_pelicula" name="codigo_pelicula" required>
        <br><br>

        <label for="codigo_pelicula">Introduzca el número de entradas:</label>
        <input type="text" id="numero_entradas" name="numero_entradas" required>
        <br><br>

        <label for="codigo_pelicula">Introduzca la sesión (M, T o N):</label>
        <input type="text" id="sesion" name="sesion" required>
        <br><br>


        <button type="submit">Comprar</button>
    </form>
    
</body>
</html>