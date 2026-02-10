<?php
    echo "Dame un número: ";
    $nota = rtrim(fgets(STDIN));

    if ($nota < 0 and $nota > 10) {
        echo "Debe ser un número entre 0 y 10\n";
    } elseif ($nota >= 0 and $nota < 5) {
        echo "Has suspendido\n";
    } elseif ($nota >= 5 and $nota < 7) {
        echo "Tienes un Bien\n";
    } elseif ($nota >= 7 and $nota < 9) {
        echo "Tienes un Notable\n";
    } elseif ($nota >= 9 and $nota <= 10) {
        echo "Tienes un Sobresaliente\n";
    } else {
        echo "Ha habido un error. Prueba de nuevo.\n";
    }

?>