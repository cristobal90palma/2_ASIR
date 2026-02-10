<?php

/*Realiza una página en PHP que muestre una tabla de 6 filas con 4 columnas, usando estructuras de control repetitivas. 
En cada fila y columna debe aparecer el texto “Fila x, Columna y”, siendo x e y el número de fila y columna. 
Además si la fila y la columna coinciden (x == y), haz que aparezca en negrita. Si es la primera fila de la tabla,
 debe aparecer con un atributo de clase fijado al valor cabecera (class=”cabecera”), mientras que si es la última
  debe fijarse al valor pie (class=”pie”). Compruébalo desde el navegador.
*/
        // Inicio de la tabla HTML
        $num_filas = 6;
        $num_columnas = 4;
        echo '<table border="1">';

        // Bucle exterior para generar las filas (x = 1 a 6)
        for ($fila = 1; $fila <= $num_filas; $fila++) {

            // 1. Determinar la clase de la fila
            $clase_fila = '';
            if ($fila === 1) {
                $clase_fila = 'cabecera';
            } elseif ($fila === $num_filas) {
                $clase_fila = 'pie';
            }

            // Inicio de la etiqueta de fila, aplicando la clase
            echo "<tr class='{$clase_fila}'>";

            // Bucle interior para generar las columnas (y = 1 a 4)
            for ($columna = 1; $columna <= $num_columnas; $columna++) {

                // Contenido base de la celda
                $contenido = "Fila {$fila}, Columna {$columna}";

                // 2. Comprobar si la fila y la columna coinciden (diagonal)
                if ($fila === $columna) {
                    // Si coinciden, el contenido va en negrita (<b>)
                    $contenido = "<b>{$contenido}</b>";
                }

                // Generación de la celda (<td>) con el contenido
                echo "<td>{$contenido}</td>";
            }

            // Cierre de la etiqueta de fila
            echo '</tr>';
        }

        // Cierre de la tabla HTML
        echo '</table>';
        ?>