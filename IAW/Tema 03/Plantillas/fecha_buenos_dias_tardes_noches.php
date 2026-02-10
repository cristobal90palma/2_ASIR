<?php


 # Obtiene la hora actual como cadena "HHMM" --> Ejemplo: 2230 para las 22:30 horas
$time_str = date('Hi');


# Usamos "int" para convertir el valor de la variable anterior (que php entiende como un string) a un número, en este caso entero.
$time_int = (int)$time_str;

#Mostramos la hora.
echo "$time_int\n";

if ($time_int >= 730 && $time_int <= 1400) {
    echo "Buenos días\n";
} elseif ($time_int >= 1401 && $time_int <= 2030) { 
    echo "Buenas tardes\n";
} elseif (($time_int >= 2031 && $time_int <= 2359) || ($time_int >= 0 && $time_int <= 729)) {
    echo "Buenas noches\n";

    # https://www.php.net/manual/es/language.operators.logical.php "||" es un "or".

     # para cualquier otro valor
} else {
    echo "Hora no válida\n";
}

?>