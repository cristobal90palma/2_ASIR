<?php

// Recibimos los datos del formulario de "datos_persona.php"
$nombre   = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nif      = $_POST['nif'];
$telefono = $_POST['telefono'];

// Array con los mensajes de errores:
$mensajes = [
    1 => "El campo está vacío",
    2 => "El formato no es válido",
    3 => "La letra del NIF no es correcta"
];

//Funciones de validación
function fValidaNombre($n) {
    if ($n == null || $n == "") {
        return 1;
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,50}$/', $n)) {
        return 2;
    } else {
        return 0;
    }
}


function fValidaApellidos($a) {
    if ($a == null || $a == "") {
        return 1;
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéÍÓÚÑñ\s]{1,50}$/', $a)) {
        return 2;
    } else {
        return 0;
    }
}


function fValidaTLF($tel) {
    if ($tel == null || $tel == "") {
        return 1;
    } elseif (!preg_match('/^[0-9]{9}$/', $tel)) {
        return 2;
    } else {
        return 0;
    }
}

// Validación de NIF: formato 8 números + letra y cálculo de letra correcta.
function fValidaNIF($nif) {
    if ($nif == null || $nif == "") {
        return 1;
    } elseif (preg_match('/^[0-9]{8}[A-Za-z]$/', $nif) == false) {
        return 2;
    }

    // Extraemos número y letra por separado
    //Substrae del valor de nif desde la posición 0 hasta la 8, dejando la letra "9" a parte.
    $numero = substr($nif, 0, 8);
    // strtoupper = Convierte a mayúsculas, así evitamos el problema por el cual no reconoce si metemos una letra minúscula.
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


//Función final. Apartado f.

/*Va llamanda a cada una de las funciones anteriores, si el valor es distinto de 0, 
guarda en el array "errores" el mensaje correspondiente. Después se usa un foreach para mostrar 
cada uno de los valores que se han guardado en el array.
*/
function fValidaFormulario($nombre, $apellido, $nif, $telefono, $mensajes) {
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
        echo "<h2>Hay errores</h2>";
        foreach ($errores as $e) {
            echo "<p>".$e."</p>";
        }
    } else {
        echo "<h2>Datos correctos</h2>";
    }
}

// LLamada a la función de validación del formulario
fValidaFormulario($nombre, $apellido, $nif, $telefono, $mensajes);


// Comprobación de los códigos de error.
echo "======================================";
echo "<h2>Comprobación de los códigos de error.</h2>";

echo "<p>Return de la función de Nombre: ".fValidaNombre($nombre)."</p>";
echo "<p>Return de la función de Apellidos: ".fValidaApellidos($apellido)."</p>";
echo "<p>Return de la función de NIF: ".fValidaNIF($nif)."</p>";
echo "<p>Return de la función de Teléfono: ".fValidaTLF($telefono)."</p>";

?>