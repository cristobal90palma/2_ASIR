<?php

// Función para solicitar una entrada al usuario y devolverla
function solicitarEntrada(string $mensaje): string {
    // Si la función readline() está disponible (entorno de consola)
    if (function_exists('readline')) {
        return readline($mensaje);
    }
    // Si no está disponible, se usa una alternativa para entornos web/otros
    echo $mensaje;
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    fclose($handle);
    return trim($line);
}

// 1. Mostrar el menú
echo "CALCULADORA IES DH\n";
echo "=====================================\n";
echo "1. MULTIPLICACIÓN\n";
echo "2. DIVISIÓN\n";
echo "3. MÓDULO\n";
echo "=====================================\n";

// 2. Solicitar el número de operación
$opcion = solicitarEntrada("Indique el número de la operación a realizar: ");

// 3. Validar la opción de operación
if (!is_numeric($opcion) || !in_array((int)$opcion, [1, 2, 3])) {
    echo "\n❌ ERROR: Número de operación incorrecto. Debe ser 1, 2 o 3.\n";
    exit(1); // Terminar el script con código de error
}

// 4. Solicitar los operadores
$operador1 = solicitarEntrada("Introduzca el primer operador: ");
$operador2 = solicitarEntrada("Introduzca el segundo operador: ");

// 5. Validar que los operadores sean números enteros positivos
$operador1_valido = is_numeric($operador1) && (int)$operador1 == $operador1 && (int)$operador1 > 0;
$operador2_valido = is_numeric($operador2) && (int)$operador2 == $operador2 && (int)$operador2 > 0;

if (!$operador1_valido || !$operador2_valido) {
    echo "\n❌ ERROR: Ambos operadores deben ser números enteros positivos.\n";
    exit(1); // Terminar el script con código de error
}

// Convertir a enteros una vez validados
$num1 = (int)$operador1;
$num2 = (int)$operador2;
$resultado = 0;

// 6. Realizar la operación y mostrar el resultado
switch ($opcion) {
    case 1:
        $resultado = $num1 * $num2;
        echo "\n✅ Resultado de la MULTIPLICACIÓN ($num1 * $num2): $resultado\n";
        break;
    case 2:
        // Manejar la división por cero si fuera necesario, aunque la validación de > 0 lo previene
        if ($num2 == 0) {
            echo "\n❌ ERROR: No se puede dividir por cero.\n";
            exit(1);
        }
        $resultado = $num1 / $num2;
        echo "\n✅ Resultado de la DIVISIÓN ($num1 / $num2): $resultado\n";
        break;
    case 3:
        $resultado = $num1 % $num2;
        echo "\n✅ Resultado del MÓDULO ($num1 % $num2): $resultado\n";
        break;
    default:
        // Esto no debería ocurrir debido a la validación inicial, pero se incluye por seguridad
        echo "\n❌ ERROR: Opción no reconocida.\n";
        exit(1);
}

?>