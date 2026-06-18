<?php
/*
Galería de imágenes con array.
Muestra una tabla de 4 filas y 2 columnas:
 - En la primera columna: imagen del componente
 - En la segunda columna: descripción
El array se baraja con shuffle() para mostrar orden aleatorio.
*/

// Array asociativo: "nombre_imagen" => "descripción"
$componentes = array(
    "cpu-ryzen.jpg" => "CPU Ryzen",
    "ram.jpg" => "Memoria RAM",
    "placa.jpg" => "Placa base",
    "gpu.jpg" => "Tarjeta gráfica"
);

// Barajar el array para mostrar orden aleatorio
$claves = array_keys($componentes);
shuffle($claves);

echo "<table border='1' cellspacing='10' cellpadding='10' style='text-align:center;'>";

foreach ($claves as $imagen) {
    echo "<tr>";
    // Columna 1: imagen
    echo "<td><img src='$imagen' width='200'></td>";
    // Columna 2: descripción
    echo "<td>{$componentes[$imagen]}</td>";
    echo "</tr>";
}

echo "</table>";
?>
