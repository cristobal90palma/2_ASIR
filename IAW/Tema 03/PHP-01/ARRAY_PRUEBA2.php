<?php


$palabras = array("hola", "adios", "hasta luego");
//print_r($palabras);
echo $palabras[0]."\n";

$monedas = array("españa" => "euro", "usa" => "dolar", "mexico" => "peso", "usa" => "dolar americano"); //si pones dos veces la misma clave, la última se come a la primera.
//print_r($monedas);

echo $monedas["usa"]."\n";

$numeros = array(array(10,2), array(7,8), array(6,3), array(4,7));
//print_r($numeros);
echo $numeros[1][1]."\n";

$pelis = array("s1" => array ("Torrente", 12), "s2" => array ("Avatar", 15), "s3" => array ("Peter Pan", 10));
//print_r($pelis);
/*
echo $pelis["s2"][0]."\n";
$pelis["s3"][1]=8; //CAMBIAR VALOR
echo $pelis["s3"][1]."\n";
*/
//FUNCIONES DE ARRAYS

//print_r(array_values($palabras)); //Listar los valores contenidos en mi_array

ksort($monedas); //Ordena el array por orden alfabético.

print_r($monedas); //Si ahora lo imprimimos sale en orden definido antes.


?>