<?php
// Versión más simple del script PHP.

// 1. Preparamos el inicio del HTML
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Pedido</title>
</head>
<body>';

// Array para guardar mensajes de error.
$errores = [];

// 2. VALIDACIÓN DE DATOS DE CONTACTO
// Comprobamos si los campos de contacto están vacíos.
if (empty(trim($_POST['nombre']))) {
    $errores[] = "Falta rellenar el Nombre del cliente.";
}

if (empty(trim($_POST['telefono']))) {
    $errores[] = "Falta rellenar el Teléfono.";
}

if (empty(trim($_POST['direccion']))) {
    $errores[] = "Falta rellenar la Dirección.";
}

// 3. VALIDACIÓN y CÁLCULO DE PRODUCTOS
$productos_disponibles = [
    'nachos' => 'Nachos clásicos', 'cesar' => 'Ensalada Cesar', 'alitas' => 'Combo de alitas',
    'carbonara' => 'Pizza carbonara', 'ranchera' => 'Pizza ranchera', 'taco' => 'Pizza taco',
    'trufa' => 'Tarta trufa', 'helados' => 'Helados variados',
];

$total_pedido = 0.0;
$productos_seleccionados_resumen = [];

// Recorremos los datos para sumar el total y ver qué se pidió.
foreach ($_POST as $clave => $valor) {
    if (array_key_exists($clave, $productos_disponibles)) {
        $precio = floatval($valor);
        $total_pedido += $precio;
        $productos_seleccionados_resumen[] = [
            'nombre' => $productos_disponibles[$clave],
            // Usamos el precio del formulario para ser más simples, aunque en un 
            // sistema real el precio debería venir de la base de datos.
            'precio' => $precio
        ];
    }
}

// Comprobamos si no se seleccionó ningún producto.
if (count($productos_seleccionados_resumen) === 0) {
    $errores[] = "No se ha seleccionado ningún producto para el pedido.";
}


// 4. MOSTRAR EL RESULTADO
if (count($errores) > 0) {
    // Si hay ERRORES
    echo '<h1>Error en el Pedido</h1>';
    echo '<p>Los datos de contacto no han sido rellenados correctamente.</p>';
    
    // Mostramos todos los errores encontrados.
    echo '<ul>';
    foreach ($errores as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
    
    // Opción de volver
    echo '<p><a href="pedido.html">Volver al formulario</a></p>';

} else {
    // Si todo está CORRECTO
    echo '<h1>Su pedido se está tramitando.</h1>';
    
    echo '<h2>Resumen del pedido</h2>';
    
    // Datos del cliente
    echo '<p><strong>Cliente:</strong> ' . htmlspecialchars(trim($_POST['nombre'])) . '</p>';
    echo '<p><strong>Teléfono:</strong> ' . htmlspecialchars(trim($_POST['telefono'])) . '</p>';
    echo '<p><strong>Dirección:</strong> ' . htmlspecialchars(trim($_POST['direccion'])) . '</p>';

    // Lista de productos
    echo '<h3>Productos solicitados:</h3>';
    echo '<ul>';
    foreach ($productos_seleccionados_resumen as $item) {
        $precio_formateado = number_format($item['precio'], 2, ',', '.') . ' €';
        echo '<li>' . $item['nombre'] . ' (' . $precio_formateado . ')</li>';
    }
    echo '</ul>';

    // Importe total
    $total_formateado = number_format($total_pedido, 2, ',', '.');
    echo '<p><b>El importe total será ' . $total_formateado . ' €.</p></b>';
}

// 5. Cerramos el HTML
echo '</body></html>';
?>