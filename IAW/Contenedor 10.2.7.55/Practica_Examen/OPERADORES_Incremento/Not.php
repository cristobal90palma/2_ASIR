<?php

// --- Variables de entrada ---
$cuenta_bloqueada = false;

echo "--- Estado de la Cuenta ---\n";
echo "Cuenta bloqueada: " . ($cuenta_bloqueada ? "Sí" : "No") . "\n";
echo "----------------------------\n";


// La condición 'if' verifica: !($cuenta_bloqueada)
// Es decir, 'Si NO es verdad que la cuenta está bloqueada...'
if (!$cuenta_bloqueada) {
    echo "✅ Acceso concedido. La cuenta NO está bloqueada.\n";
} else {
    echo "❌ Acceso denegado. La cuenta está bloqueada.\n";
}

?>