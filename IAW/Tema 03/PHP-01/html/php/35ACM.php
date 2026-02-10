<?php
/*35.	Dado el siguiente array, crear un programa que metiendo un número por teclado me diga si ese elemento está o no en el array.
 Después ordenar los elementos del array de menor a mayor y contar el número de elementos que tiene el array.  
$numeros = array (2,24,80,5,7,20,32,45,67);

 */

$numeros = array (2,24,80,5,7,20,32,45,67);

//print_r($numeros);

echo "Dime el número que quieres buscar: ";
$buscar = rtrim(fgets(STDIN));
$encontrado = 0;

foreach ($numeros as $num) {
    if($num == $buscar) {
        $encontrado = true;
        break;
    }
}

if ($encontrado) {
    echo "El numero está en el array\n";
} else {
    echo "El número no está en el array\n";
}


$array_ordenado = asort($numeros);
print_r($numeros);
echo "El array tiene ".count($numeros)." elementos\n";

?>