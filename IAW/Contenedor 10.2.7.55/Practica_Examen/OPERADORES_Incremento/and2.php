<?php

// --- Variables de entrada ---
$usuario_autenticado = true;
$carrito_no_vacio = true;

echo "--- Estado del Pedido ---\n";
echo "Usuario autenticado: " . ($usuario_autenticado ? "Sí" : "No") . "\n";
echo "Carrito con artículos: " . ($carrito_no_vacio ? "Sí" : "No") . "\n";
echo "---------------------------\n";


// La condición 'if' verifica si (A es True) Y (B es True)
if ($usuario_autenticado && $carrito_no_vacio) {
    echo "✅ Pedido procesado con éxito.\n";
} else {
    echo "❌ No se puede procesar el pedido. Faltan requisitos.\n";
}

?>