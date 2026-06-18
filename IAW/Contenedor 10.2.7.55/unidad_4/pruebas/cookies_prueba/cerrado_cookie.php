<?php
// Paso 1: Intentar eliminar la cookie 'nombre'.
// Establecemos el valor a '' y la expiración en el pasado (hace 10 horas).
setcookie('nombre', '', time() - 10*60*60);

echo "<h1>Cookie 'nombre' eliminada</h1>";
echo "<p>El servidor ha enviado la instrucción al navegador para eliminar la cookie.</p>";

// Paso 2 (Opcional pero recomendable): Eliminar la variable del array $_COOKIE en la memoria del script actual.
// Esto garantiza que el script no la vea, aunque el navegador sí la haya enviado en esta petición.
if (isset($_COOKIE['nombre'])) {
    unset($_COOKIE['nombre']);
}

echo "<h2>Estado de la variable \$_COOKIE en este script:</h2>";
print_r($_COOKIE);

echo "<p style='font-weight: bold;'>Recarga la página principal o haz clic en el enlace de nuevo para ver el efecto final en el navegador.</p>";
?>
<br>
<a href="la_pagina_principal.php">Volver a la página principal</a>