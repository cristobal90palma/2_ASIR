<?php
    echo "Dame un número: ";
    $nota = rtrim(fgets(STDIN));

    if ($nota < 5) {
        echo "SUSPENSO\n";
    } elseif ($nota < 7 ) { 
        echo "BIEN\n";
    } elseif ($nota < 9) { 
        echo "Notable\n";
    } elseif ($nota <= 10 ) {
        echo "Sobresaliente\n";
    }
?>