<?php
// Creamos o actualizamos la cookie (esta línea debe ir antes de cualquier salida HTML)
setcookie("nombre", "Pepito Conejo", time() + 60); 

echo "<h1>Estado de la Cookie</h1>";
echo "<p>La cookie se ha intentado crear/actualizar.</p>";

// ----------------------------------------------------
// PASO CLAVE: IMPRIMIR LOS DATOS DE LA COOKIE
// ----------------------------------------------------

// Comprobamos si la cookie 'nombre' ha sido enviada por el navegador
if (isset($_COOKIE["nombre"])) {
    
    // Si existe, accedemos al valor a través del array $_COOKIE
    $valor_cookie = $_COOKIE["nombre"];
    
    print "<p style='color: green; font-weight: bold;'>✅ Valor de la cookie 'nombre' (disponible en esta carga): $valor_cookie</p>";
    echo "El nombre del dueño de la cookie: ".$valor_cookie."\n";
    
} else {
    
    // Si no existe (porque es la primera carga o ya ha caducado)
    echo "<p style='color: red;'>❌ La cookie 'nombre' NO está disponible en la variable \$_COOKIE en esta carga. Recargue la página si acaba de crearla.</p>";
}

// Opcional: Imprimir todas las cookies para depuración
echo "<h2>Todas las Cookies recibidas por el servidor (\$_COOKIE):</h2>";
print_r($_COOKIE);

echo "<pre>"; // Usar <pre> es buena práctica para dar formato a la salida de print_r
print_r($_COOKIE);
echo "</pre>";

$valores_cookie = print_r($_COOKIE);
echo "El valor de cookie es $valores_cookie\n";

echo "<h2>Resumen de Cookies</h2>";
echo "<p>Aquí está la representación completa de lo que hay en la variable \$_COOKIE:</p>";
echo "<pre>".$valores_cookie."</pre>";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="cerrado_cookie.php">Cerramos cookies</a>
</body>
</html>