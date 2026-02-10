<?php
/*
Galería de imágenes con array. Realiza una página en PHP que muestre una tabla de 4 filas con 2 columnas. 
En la primera columna de cada fila se deberá mostrar una imagen de un componente de pc y en segunda columna su correspondiente descripción. Pistas:

Crear un array en donde el índice de cada elemento sea el nombre de una imagen (fichero.jpg) que deberemos alojar en nuestro sitio web local.
 El elemento en cuestión será la descripción de esa imagen o componente de pc.
Recorrer el array, mostrando las imágenes y el texto correspondiente formateando la salida con los tag de html (table, td, tr e img).
Invocar a la función shuffle($miArray) para ordenar de manera aleatoria el array y así mostrar los componentes en un orden diferente en cada ejecución.
*/

    $componentes = array ("cpu-ryzen.jpg" => "CPU Ryzen", "ram.jpg" => "RAM", "placa.jpg" =>"Placa base", "gpu.jpg" => "Tarjeta gráfica");

echo "<table border='1'>";


foreach($componentes as $fichero => $descripcion) {

    echo "<tr>";

    echo "<td><img src='$fichero' width='200'></td>";
    echo "<td>".$descripcion."</td>";
    echo "</tr>";

}


echo "</table>";


?>