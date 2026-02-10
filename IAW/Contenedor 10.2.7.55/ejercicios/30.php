<?php
#numeros aleatoriso del 0 al 30
/*Inicializar un array de 10 elementos, con valores aleatorios entre 1 y 30. 
●	Una vez que ha inicializado el array, imprima todos los valores que almacena. 
●	Calcula el valor medio de los valores del array. 
●	Mostrar el valor medio que ha calculado.
*/


//$numeros = array();
$sum = 0;
for ($i=0; $i<=9; $i++) {
    $numeros[$i] = rand(0,30);
    echo $numeros[$i]."\n";
    $sum = $sum + $numeros[$i];
}
//print_r($numeros);


echo "La media es ".$sum/sizeof($numeros)."\n";
echo "La media es ".$sum/count($numeros)."\n";
?>