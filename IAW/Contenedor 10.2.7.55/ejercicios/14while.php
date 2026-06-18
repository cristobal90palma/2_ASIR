<?php
#numeros del 1 al 100 mostrados con coma de por medio

echo "Numeros del 1 al 100\n";

$i = 1; // Empezamos en 1
while($i <= 100) { // Continuamos hasta 100 (incluido)
    echo $i;

    // Si $i es menor que 100, imprimimos una coma y un espacio.
    if ($i < 100) {
        echo ", ";
    } else {
        // Si $i es 100 (el último número), imprimimos un salto de línea en lugar de la coma.
        echo "\n";
    }

    $i++; //le vamos sumando 1 cada vez que llega hasta aquí. Y vuelve a empezar.
}

// Alternativamente, se podría usar un bucle 'for' que es más compacto para este caso:
/*
echo "Numeros del 1 al 100 (con for)\n";
for ($i = 1; $i <= 100; $i++) {
    echo $i;
    if ($i < 100) {
        echo ", ";
    } else {
        echo "\n";
    }
}
*/
?>