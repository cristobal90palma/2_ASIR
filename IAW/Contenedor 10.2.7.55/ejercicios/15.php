<?php
#Hacer una página PHP que muestre por pantalla la tabla de multiplicar de una variable dada por teclado (desde el 1 al 10).

echo "Introduce un número: ";
$val_num = rtrim(fgets(STDIN));

for ($i = 1; $i <= 10; $i++) {
    $resultado = $val_num * $i;
    
    echo "$val_num x $i = $resultado\n";
}

?>