<?php
#Hacer una página PHP que muestre si un número es o no primo (recuerda que un número primo es aquel que solo es divisible por él mismo y por la unidad).

echo "Introduce un número: ";
$num = rtrim(fgets(STDIN));
$num_divisores = 0;

for ($divisor=1; $divisor<=$num; $divisor++) {
    if ($num % $divisor == 0) {
        $num_divisores += 1;
    }
}

if ($num==1 or $num_divisores==2) {
    echo "El número es primo\n";
} else {
    echo "No es primo\n";
}

?>