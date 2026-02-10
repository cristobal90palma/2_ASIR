<?php

// Mostrar todo el contenido enviado (para depuración)
echo "<h2>Contenido de la superglobal \$_POST:</h2>";
print_r($_POST);
echo "<hr>";

// 1. Validación de campos obligatorios (Nombre y Email)
if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
    echo "ERROR - Debe rellenar el **Nombre**.</br>";
} elseif (!isset($_POST['email']) || empty($_POST['email'])) {
    echo "ERROR - Debe rellenar el **Email**.</br>";
} else {
    // Si Nombre y Email están OK, mostrar los datos
    echo "Mi nombre es **" . htmlspecialchars($_POST['nombre']) . "**</br>";
    echo "Mi email es **" . htmlspecialchars($_POST['email']) . "**</br>";
    
    // Si se ha seleccionado una provincia
    if (isset($_POST['provincia']) && $_POST['provincia'] != '0') {
        echo "Mi provincia es **" . htmlspecialchars($_POST['provincia']) . "**</br>";
    }
}

// 2. Validación de Contraseñas
if (isset($_POST['pass1']) && isset($_POST['pass2'])) {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    if ($pass1 != $pass2) {
        echo "ERROR - LAS **CONTRASEÑAS NO COINCIDEN**.</br>";
    } else {
        // Se añade una comprobación adicional de que no estén vacías, aunque el HTML lo pide con `required`
        if (empty($pass1)) {
             echo "ERROR - Las contraseñas no pueden estar vacías.</br>";
        } else {
             echo "Correcto. Las **contraseñas coinciden**.</br>";
        }
    }
}

// 3. Mostrar Preferencias seleccionadas (Opcional)
if (isset($_POST['preferencias']) && is_array($_POST['preferencias'])) {
    echo "Mis **Preferencias** son: " . implode(", ", array_map('htmlspecialchars', $_POST['preferencias'])) . "</br>";
}

// 4. Mostrar Método de Envío (Opcional)
if (isset($_POST['envio'])) {
    echo "El método de **Envío** seleccionado es: **" . htmlspecialchars($_POST['envio']) . "**</br>";
}

?>