<?php

function validarDNI($dni) {
    // 1. Limpiar espacios y convertir a mayúsculas
    $dni = strtoupper(trim($dni));

    // 2. Comprobar que el formato sea básico (8 números + 1 letra)
    if (!preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
        return false;
    }

    // 3. Extraer la letra y la parte numérica
    $letra = substr($dni, -1);
    $numeros = substr($dni, 0, 8);

    // 4. Calcular la letra que le corresponde al número
    // El orden de las letras es estándar (Algoritmo del módulo 23)
    $letrasValidas = "TRWAGMYFPDXBNJZSQVHLCKE";
    $letraCorrecta = $letrasValidas[$numeros % 23];

    // 5. Comparar si la letra proporcionada coincide con la calculada
    return ($letra === $letraCorrecta);
}

?>