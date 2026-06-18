<?php

// Recibimos los datos del formulario de "datos_persona.php"
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nif = $_POST['nif'];
$telefono = $_POST['telefono'];


// Array con los mensajes de errores:
$mensajes = [
    1 => "El campo está vacío",
    2 => "El formato no es válido",
    3 => "La letra del NIF no es correcta"
];

// Las funciones nos darán un código de error. El "0" no existe, para que más adelante cuando $"mensajes" vuelva vacío, nos indique que todo está bien.


// La validación de nombre y apellidos tienen un formato para mayusculas, minusculas, tilde para vocales e incorpora la "ñ".
function fValidaNombre($n){
    if($n==null || $n=="") {
        return 1;
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,50}$/', $n)) {
        return 2;
    } else {
        return 0;
    }
}


function fValidaApellidos($a){
    if($a==null || $a=="") {
        return 1;
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,50}$/', $a)) {
        return 2;
    } else {
        return 0;
    }
}


function fValidaTLF ($tel){
    if($tel==null || $tel=="") {
        return 1;
    } elseif (!preg_match('/^[0-9]{9}$/', $tel)) {
        return 2;
    } else {
        return 0;
    }
}


function fValidaNIF ($nif){
    if($nif==null || $nif=="") {
        return 1;
    } elseif (preg_match('/^[0-9]{8}[A-Za-z]$/', $nif)==false) {
        return 2;
    }  

    //Extraemos número y letra por separado
    $numero = substr($nif, 0, 8);
    $letraProporcionada = strtoupper(substr($nif, -1));
    
    // El orden de las letras es estándar para el algoritmo del DNI.
    $letrasValidas = "TRWAGMYFPDXBNJZSQVHLCKE";
    $letraCalculada = $letrasValidas[$numero % 23];

    if ($letraCalculada !== $letraProporcionada) {
        return 3;
    } else {
        return 0;
    }
}

/* =========================
   VALIDAR FORMULARIO
   ========================= */
function fValidaFormulario($nombre, $apellido, $nif, $telefono, $mensajes){

    $errores = [];

    if (fValidaNombre($nombre) != 0) {
        $errores[] = "Nombre: " . $mensajes[fValidaNombre($nombre)];
    }

    if (fValidaApellidos($apellido) != 0) {
        $errores[] = "Apellidos: " . $mensajes[fValidaApellidos($apellido)];
    }

    if (fValidaNIF($nif) != 0) {
        $errores[] = "NIF: " . $mensajes[fValidaNIF($nif)];
    }

    if (fValidaTLF($telefono) != 0) {
        $errores[] = "Teléfono: " . $mensajes[fValidaTLF($telefono)];
    }

    if (!empty($errores)) {
        echo "<h2>Errores encontrados</h2>";
        echo "<ul>";
        foreach ($errores as $e) {
            echo "<li>$e</li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>Datos correctos</h2>";
    }
}




fValidaFormulario($nombre, $apellido, $nif, $telefono, $mensajes);

echo "<p>Return de la función de Nombre:" . fValidaNombre($nombre) . "</p>";
echo "<p>Return de la función de Apellidos:" . fValidaApellidos($apellido) . "</p>";
echo "<p>Return de la función de NIF:" . fValidaNIF($nif) . "</p>";
echo "<p>Return de la función de Teléfono:" . fValidaTLF($telefono) . "</p>";









?>