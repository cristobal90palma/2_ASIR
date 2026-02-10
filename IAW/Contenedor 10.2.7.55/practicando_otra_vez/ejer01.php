<?php
echo "CALCULADORA IES DH\n";
echo "====================================\n";
echo "1. MULTIPLICACIÓN\n";
echo "2. DIVISIÓN\n";
echo "3. MÓDULO\n";
echo "====================================\n";

    echo "Indique el número de la operación a realizar: ";
    $operador = rtrim(fgets(STDIN));

    echo "Introduzca el primer operador: ";
    $num1 = rtrim(fgets(STDIN));

    echo "Introduzca el segundo operador: ";
    $num2 = rtrim(fgets(STDIN));

//COMIENZO DEL IF
    if($num1 < 0) {
        echo "Error: el primer operador debe ser mayor o igual a cero.\n";
        exit;
    } if ($num2 < 0) {
        echo "Error: el segundo operador debe ser mayor o igual a cero.\n";
        exit;
    } 

    $resultado = 0;

    switch ($operador) {
        case '1':
            $resultado = $num1 * $num2;
            echo "La multiplicación de ".$num1." por ".$num2." es: ".$resultado."\n";
            break;
        case '2':
            if ($num2 > 0) {
                $resultado = $num1 / $num2;
                echo "La división de ".$num1." entre ".$num2." es: ".$resultado."\n";
                break;
            } else {
                echo "El segundo operador debe ser mayor que 0 para realizar la división.\n";
                exit;
            }

        case '3':
            if ($num2 > 0) {
                $resultado = $num1 % $num2;
                echo "La división de ".$num1." entre ".$num2." da de resto: ".$resultado."\n";
                break;
            } else {
                echo "El segundo operador debe ser mayor que 0 para realizar la división.\n";
                exit;
            }
        default:
            echo "No has elegido un tipo de operación correcta. O ha habido algún otro fallo.\n";
            break;
    }








?>