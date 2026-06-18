<?php
#Diseñar un algoritmo para escribir en pantalla los n primeros números naturales, sus cuadrados, sus cubos y la suma de todos ellos.

echo "Introduce un número: ";
$numero = rtrim(fgets(STDIN));
$suma = 0;

echo "Impresión por pantalla de los ",$numero." primeros números naturales\n";
echo "----------------------------------------------------------------------\n";

for ($i=1; $i<=$numero; $i++){
    if ($i <$numero){
        echo $i.", ";
    }
    echo $i. ", \n\n";
    $suma = $suma + $i;
}


echo "Impresión por pantalla de los ",$numero." primeros números cuadrados\n";
echo "----------------------------------------------------------------------\n";

for ($i=1; $i<=$numero; $i++){
    if ($i <$numero){
        echo $i*$i.", ";
    }
    echo $i*$i. ", \n\n";
}

echo "Impresión por pantalla de los ",$numero." primeros números cubo\n";
echo "----------------------------------------------------------------------\n";

for ($i=1; $i<=$numero; $i++){
    if ($i <$numero){
        echo $i*$i.", ";
    }
        echo $i*$i. ", \n\n";
}

echo "La suma de los números es $suma \n";

?>