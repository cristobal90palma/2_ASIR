<?php
#Hacer una página PHP que muestre por pantalla los números del 100 al 0 en orden descendente, dando el salto de 2 en 2 números. Es decir: 100, 98, 96, ..., 2, 0.

echo "Numeros del 100 al 0, solo pares.\n";

for ($i = 100; $i >= 0; $i-=2) {
    echo $i;

    if ($i > 0) {
        echo ", ";
    }
}
echo "\n";

?>