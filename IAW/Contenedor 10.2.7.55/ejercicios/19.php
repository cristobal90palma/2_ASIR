<?php
# 19.	Hacer una página PHP que muestre por pantalla todos los divisores (aquellos cuyo resto de la división es 0) de un número guardado en una variable cuyo valor se solicita por teclado al usuario. Por ejemplo: 16 sus divisores son: 1, 2, 4, 8, 16.


echo "Introduce un número: ";
$num = rtrim(fgets(STDIN));

for ($divisor=1; $divisor<=$num; $divisor++) {
    if ($num % $divisor == 0) {
        echo "El número ".$divisor." es divisor del ".$num."\n";
    }
}

?>