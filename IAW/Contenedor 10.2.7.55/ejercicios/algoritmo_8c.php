<?php
echo "Dame la hora en formato HHMM (por ejemplo, 0730): ";
$date = intval(trim(fgets(STDIN))); // convierte a número

if ($date >= 730 && $date <= 1400) {
    echo "Buenos días\n";
} elseif ($date >= 1401 && $date <= 2030) { 
    echo "Buenas tardes\n";
} elseif (($date >= 2031 && $date <= 2359) || ($date >= 0 && $date <= 729)) {
    echo "Buenas noches\n";
} else {
    echo "Hora no válida\n";
}
?>