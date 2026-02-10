<?php

$puntuacion = 85;

if ($puntuacion >= 90) {
    echo "Calificación: A (Excelente)\n";
} elseif ($puntuacion >= 80) { // <-- Se prueba si la puntuación está entre 80 y 89
    echo "Calificación: B (Notable)\n";
} elseif ($puntuacion >= 70) {
    echo "Calificación: C (Aprobado)\n";
} else {
    echo "Calificación: F (Suspenso)\n";
}

?>