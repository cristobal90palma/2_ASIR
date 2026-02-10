<?php

$es_fin_de_semana = true;  // Condición A: Cierta
$tarea_terminada = false; // Condición B: Falsa

// Solo se ejecuta el bloque if si AMBAS son VERDADERAS
if ($es_fin_de_semana and $tarea_terminada) {
    echo "¡Genial! Puedes ir al cine.\n";
} else {
    echo "No puedes ir al cine porque ambas condiciones deben cumplirse.\n";
}

?>