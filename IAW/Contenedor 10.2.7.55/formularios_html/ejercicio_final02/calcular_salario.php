<?php

//Tomamos los valores del HTML
$salario_bruto_anual = $_POST["salario_bruto_anual"];
$estado_civil = $_POST["estado_civil"];
$num_hijos = $_POST["num_hijos"];
$num_pagas = $_POST["num_pagas"];



//Comprobamos que están todos. Esto es un poco raro, porque en el HTML ya hemos puesto un "required". Pero puede haber problemas si en hijos damos un valor de "0".
//Basicamente estamos diciendo que si no nos ha llegado ningún valor, pues "Tienes que meter algún dato".
if (empty($_POST["salario_bruto_anual"]) AND empty($_POST["estado_civil"]) AND empty($_POST["num_hijos"]) AND empty($_POST["num_pagas"])) {
    echo "<h1>Tienes que meter algún dato.</h1>";
} else {
    if ($estado_civil == "casado" && $num_hijos > 0) {
        $salario_bruto_anual = $salario_bruto_anual - ($num_hijos * 1000);
    } 



   if ($salario_bruto_anual <= 12000) {
    $irpf = $salario_bruto_anual * 0.15;
   } elseif ($salario_bruto_anual >= 12001 AND $salario_bruto_anual <= 24000) {
    $irpf = $salario_bruto_anual * 0.20;
   } elseif ($salario_bruto_anual >= 24001) {
    $irpf = $salario_bruto_anual * 0.25;
   }
}


echo "<h1>Su salario bruto anual es ".number_format((float)$salario_bruto_anual, 2, '.', '')."€</h1>";

//https://www.php.net/manual/en/function.number-format.php
//number_format((float) es para que la cifra pueda mostrar decimales.
//https://es.stackoverflow.com/questions/126407/como-darle-formato-num%C3%A9rico-a-una-variable-en-php
/*

    2 Indica el número de decimales a mostrar
    ',' Indica el separador que se va a usar para el separador de los decimales
    '.' Indica el separador que se va a usar para el separador de los miles

*/

$salario_NETO_anual = ($salario_bruto_anual - $irpf);
echo "<h1>Su salario neto anual es ".number_format((float)$salario_NETO_anual, 2, '.', '')."€</h1>";

$salario_NETO_mensual = $salario_NETO_anual / $num_pagas;
echo "<h1>Su salario neto mensual es ".number_format((float)$salario_NETO_mensual, 2, '.', '')."€</h1>";


?>