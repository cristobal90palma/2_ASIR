<?php

/* =========================
   MENSAJES DE ERROR
   ========================= */
$mensajes = [
    1 => "El campo está vacío",
    2 => "El formato no es válido",
    3 => "La letra del NIF no es correcta"
];

/* =========================
   VALIDACIÓN NOMBRE
   ========================= */
function fValidaNombre($n) {
    if ($n == "") {
        return 1;
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,50}$/', $n)) {
        return 2;
    }
    return 0;
}

/* =========================
   VALIDACIÓN APELLIDOS
   ========================= */
function fValidaApellidos($a) {
    if ($a == "") {
        return 1;
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,50}$/', $a)) {
        return 2;
    }
    return 0;
}

/* =========================
   VALIDACIÓN TELÉFONO
   ========================= */
function fValidaTLF($t) {
    if ($t == "") {
        return 1;
    } elseif (!preg_match('/^[0-9]{9}$/', $t)) {
        return 2;
    }
    return 0;
}

/* =========================
   VALIDACIÓN NIF
   ========================= */
function fValidaNIF($nif) {
    if ($nif == "") {
        return 1;
    } elseif (!preg_match('/^[0-9]{8}[A-Za-z]$/', $nif)) {
        return 2;
    }

    $numero = substr($nif, 0, 8);
    $letraUsuario = strtoupper(substr($nif, -1));

    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $letraCorrecta = $letras[$numero % 23];

    if ($letraUsuario != $letraCorrecta) {
        return 3;
    }

    return 0;
}

/* =========================
   VALIDACIÓN FORMULARIO
   ========================= */
function fValidaFormulario($nombre, $apellido, $nif, $telefono) {

    global $mensajes;
    $errores = [];

    $cod = fValidaNombre($nombre);
    if ($cod != 0) {
        $errores[] = "Nombre: " . $mensajes[$cod];
    }

    $cod = fValidaApellidos($apellido);
    if ($cod != 0) {
        $errores[] = "Apellidos: " . $mensajes[$cod];
    }

    $cod = fValidaNIF($nif);
    if ($cod != 0) {
        $errores[] = "NIF: " . $mensajes[$cod];
    }

    $cod = fValidaTLF($telefono);
    if ($cod != 0) {
        $errores[] = "Teléfono: " . $mensajes[$cod];
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
?>