<?php

$num1 = $_POST['numero1'];
$num2 = $_POST['numero2'];
$operacion = $_POST['operacion'];

if (isset($_POST['numero1']) && $_POST['numero1']!="" &&
    isset($_POST['numero2']) && $_POST['numero2']!="" &&
    isset($_POST['operacion']) && $_POST['operacion']!="") {

        switch ($operacion) {
            case 'suma':
                $resultado = $num1 + $num2;
                echo "La suma de ".$num1." y ".$num2." es: ".$resultado."\n";
                break;
            case 'resta':
                $resultado = $num1 - $num2;
                echo "La resta de ".$num1." y ".$num2." es: ".$resultado."\n";
                break;  
            case 'multiplicacion':
                $resultado = $num1 * $num2;
                echo "La multiplicación de ".$num1." por ".$num2." es: ".$resultado."\n";
                break;              
            case 'division':
                if ($num2 > 0) {
                $resultado = $num1 / $num2;
                echo "La división de ".$num1." entre ".$num2." es: ".$resultado."\n";
                break;  
                } else {
                    echo "El segundo número, es decir, el divisior, debe ser mayor que cero. Si no es incapaz de dividir.\n";
                    break;
                }
            default:
                echo "¿Como has podido meter un tipo de operación no válido?. No se si darte un premio o mandarte a Junio directamente.\n";
                exit;
        }
    } else {
        echo "Te falta por meter algún dato: tipo de operación, numeros o yo que se.\n";
    }








?>