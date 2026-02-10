<?php

// --- Variables de entrada ---
$inicio_sesion = false;
$tarea_completada = false;

echo "--- Estado de Recompensa ---\n";
echo "Inició sesión: " . ($inicio_sesion ? "Sí" : "No") . "\n";
echo "Completó tarea: " . ($tarea_completada ? "Sí" : "No") . "\n";
echo "----------------------------\n";


// La condición es TRUE solo si una variable es TRUE y la otra es FALSE.
if ($inicio_sesion xor $tarea_completada) {
    echo "🎉 ¡Recompensa otorgada!\n";
    echo "Condición: El usuario solo cumplió un requisito (OR Exclusivo).\n";
} else {
    echo "❌ No se otorga la recompensa.\n";
    echo "Condición: O se cumplieron AMBOS (True XOR True = False) o NINGUNO (False XOR False = False).\n";
}

?>