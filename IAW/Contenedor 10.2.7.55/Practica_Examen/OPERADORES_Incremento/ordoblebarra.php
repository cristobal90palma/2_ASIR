<?php

// --- Variables de entrada ---
$cliente_presente = false;
$vecino_acepto_paquete = true;

echo "--- Estado de la Entrega ---\n";
echo "Cliente presente: " . ($cliente_presente ? "Sí" : "No") . "\n";
echo "Vecino aceptó paquete: " . ($vecino_acepto_paquete ? "Sí" : "No") . "\n";
echo "------------------------------\n";


// La condición 'if' verifica si (A es True) O (B es True)
if ($cliente_presente || $vecino_acepto_paquete) {
    echo "✅ Entrega exitosa. El paquete fue recibido por alguien.\n";
} else {
    echo "❌ Entrega fallida. No se pudo entregar el paquete.\n";
}

?>