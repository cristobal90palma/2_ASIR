<?php

/*Realiza una página en PHP que muestre una tabla de 6 filas con 4 columnas, usando estructuras de control repetitivas. 
En cada fila y columna debe aparecer el texto “Fila x, Columna y”, siendo x e y el número de fila y columna. 
Además si la fila y la columna coinciden (x == y), haz que aparezca en negrita. Si es la primera fila de la tabla,
 debe aparecer con un atributo de clase fijado al valor cabecera (class=”cabecera”), mientras que si es la última
  debe fijarse al valor pie (class=”pie”). Compruébalo desde el navegador.
*/


echo "<table border='1'>"
for ($f=1; $f<=6; $f++) {
    if ($f==1)


    echo "<tr>";
    for ($c=1; $c<=4; $c++)
}


?>