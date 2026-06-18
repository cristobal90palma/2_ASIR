<?php

    echo "Dame un número: ";
    $a = rtrim(fgets(STDIN));

    echo "Dame otro número: ";
    $b = rtrim(fgets(STDIN));


    $sum = $a + $b;
    $mul = $a * $b;

    if ($sum > $mul) {
        echo "La suma de los números es mayor que su multiplicación\n";
    } else {
        echo "La suma de los números NO es mayor que su multiplicación\n";
    }

?>