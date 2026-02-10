<?php

if (isset($_POST['numero1']) && $_POST['numero1'] != "" &&
    isset($_POST['numero2']) && $_POST['numero2'] != "") {
        //Comprobación de que se han puesto los dos numeros.
        if($_POST['operacion'] =='suma') {
            
            echo "La suma de los números es: ".($_POST['numero1'] + $_POST['numero2']);
        }
        if($_POST['operacion'] =='resta') {
            echo "La resta de los números es: ".($_POST['numero1'] - $_POST['numero2']);
        }
        if($_POST['operacion'] =='multiplicacion') {
            echo "La multiplicacion de los números es: ".($_POST['numero1'] * $_POST['numero2']);
        }
        if($_POST['operacion'] =='division') {
            if($_POST['numero2'] == 0) {
                echo "La división entre 0 no existe. El segundo número debe ser distinto a 0.<br/>";
                echo "<a href='calculadora.html'>Volver a la calculadora</a>";
            } else {
                echo "La division de los números es: ".($_POST['numero1'] / $_POST['numero2']);
            }
            
        }


    } else {
        echo "Debes rellenar los dos valores de los números para hacer la oeración.<br/>";
        echo "<a href='calculadora.html'>Volver a la calculadora</a>";
    }


?>