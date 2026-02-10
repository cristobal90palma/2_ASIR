<?php
# Hacer una página PHP que muestre por pantalla:
# - La suma de los números pares del 1 al 200
# - La multiplicación de los números impares del 1 al 200

$suma_pares = 0;
$multi_impares = 1;  // ¡Importante! Empezar en 1, no en 0

for ($i = 1; $i <= 200; $i++) {
    if ($i % 2 == 0) {
        // Número par: sumar
        $suma_pares += $i;
    } else {
        // Número impar: multiplicar
        $multi_impares *= $i;
    }
}

# Resultados
echo "Suma de los números pares (1 al 200): $suma_pares\n";
echo "Multiplicación de los números impares (1 al 200): $multi_impares\n";

?>