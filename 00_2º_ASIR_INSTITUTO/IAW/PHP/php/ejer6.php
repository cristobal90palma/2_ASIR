<?php

    echo "Dame un número: ";
    $n1 = rtrim(fgets(STDIN));

    echo "Dame otro número: ";
    $n2 = rtrim(fgets(STDIN));



    if ($n1>0) {
	if ($n2<$n1) {
		echo "Antonio Carlos\n";
    } else {
        echo "Maraver\n";
    } else {
	echo "Antonio Carlos Maraver Martín\n";
    }

?>
