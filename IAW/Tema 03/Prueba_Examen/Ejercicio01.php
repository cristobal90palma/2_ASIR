<?php
// Presentamos el menú
echo "CALCULADORA IES DH\n";
echo "===========================================================================\n";
echo "1. MULTIPLICACIÓN\n";
echo "2. DIVISIÓN\n";
echo "3. MÓDULO\n";
echo "===========================================================================\n";

// Pedimos entrada de tipo de operación
    echo "Indique el número de la operación a realizar: ";
    $tipo_operacion = rtrim(fgets(STDIN));

    // Comprobar que los valores solo pueden ser 1, 2 o 3.
    if (!in_array($tipo_operacion, [1, 2, 3])) {
    echo "ERROR: Número de operación incorrecto. Debe ser 1, 2 o 3.\n";
    exit; // Terminar el script con código de error
}

    echo "Indique el primer operador: ";
    $num1 = rtrim(fgets(STDIN));
    if ($num1 < 0 ) {
        echo "Debe ser un número positivo.\n";
        exit;
    }

    echo "Indique el segundo operador: ";
    $num2 = rtrim(fgets(STDIN));
    if ($num2 < 0 ) {
        echo "Debe ser un número positivo.\n";
        exit;
    }

    switch ($tipo_operacion) {
        case '1':
            $resultado = $num1 * $num2;
            echo "El resultado de ".$num1." por ".$num2." es : ".$resultado."\n";
            break;
        case '2':
            $resultado = $num1 / $num2;
            echo "El resultado de ".$num1." entre ".$num2." es : ".$resultado."\n";
            break;
        case '3':
            $resultado = $num1 % $num2;
            echo "El resultado del módulo de ".$num1." % ".$num2." es : ".$resultado."\n";
            break;                    
        default:
            echo "Elige una de las tres opciones.\n";
            exit;
    }

?>