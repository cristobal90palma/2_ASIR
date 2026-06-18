<?php
/*35.	Dado el siguiente array, crear un programa que metiendo un número por teclado me diga si ese elemento está o no en el array.
 Después ordenar los elementos del array de menor a mayor y contar el número de elementos que tiene el array.  
$numeros = array (2,24,80,5,7,20,32,45,67);

 */

$numeros = array (2,24,80,5,7,20,32,45,67);

//print_r($numeros);

echo "Introduce un número: ";
$val = rtrim(fgets(STDIN));

if (in_array($val, $numeros)) {
    echo "El número está en el array\n";
} else {
    echo "No está en el array\n";
}

sort($numeros);
print_r($numeros);

$total_elementos= count($numeros);
echo "Hay un total de " . $total_elementos . " elementos en el array.\n";

?>