<?php
    echo "Dame un valor: ";
    $a = rtrim(fgets(STDIN));

    if ($a%2==0) {
        echo "El número ".$a." es par\n";
    } else {
        echo "El número ".$a." es impar\n";
    }

?>