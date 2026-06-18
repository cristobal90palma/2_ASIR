<?php
function limpiarNombre($nombreSucio) {
    $paso1 = trim($nombreSucio); // Quita espacios en blanco
    $paso2 = strtolower($paso1); // Pone todo en minúsculas
    $resultado = ucfirst($paso2); // Pone la primera en mayúscula
    
    return $resultado;
}

$entradaUsuario = "   jUAN pEREZ   ";
$nombreCorregido = limpiarNombre($entradaUsuario);

echo "Nombre original: '$entradaUsuario'<br>";
echo "Nombre para base de datos: '$nombreCorregido'";
?>