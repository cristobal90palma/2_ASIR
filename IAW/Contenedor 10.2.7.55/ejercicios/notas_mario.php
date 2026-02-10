<?php
    echo "Dame un número: ";
    $nota = rtrim(fgets(STDIN));
    $nota = (float)$nota;

    if ($nota >= 9) {
        echo "SOBRESALIENTE\n";
    } elseif ($nota >= 7 ) { 
        echo "NOTABLE\n";
    } elseif ($nota >= 5) { 
        echo "BIEN\n";
    } else {
        echo "SUSPENSO\n";
    }
?>