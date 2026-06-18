<?php


for ($i=1; $i<=10; $i++) { //recorrio por filas ($i). Fijamos el valor de "i"
    for($j=1; $j<=$i; $j++) { //Recorrido por columna ($j) Usamos el valor de "i" como limite para "j". Ejemplo, cuando "i" vale 4, el bucle de "j" hace que este marque valores de jota de 1 a 4, una vez que llega al 4, el bucle de "j" se acaba y pasa al bucle de "i" y este aumenta de valor y vuelve luego al bucle de "j".
        echo "* ";
    }
    echo "\n";
}

echo "\n";

?>