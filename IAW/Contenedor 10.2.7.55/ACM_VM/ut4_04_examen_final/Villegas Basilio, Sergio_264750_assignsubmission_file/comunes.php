<?php
function fValidaAcceso($usuario_input, $password_input) {

    $usuarios = [
        "sergiovillegasbasilio@institutodh.net" => password_hash("77383601A", PASSWORD_DEFAULT)
    ];

    // Comprobamos si el nombre de usuario existe
    if (array_key_exists($usuario_input, $usuarios)) {
        // Obtenemos el hash asociado a ese usuario
        $password_hash = $usuarios[$usuario_input];
        
        // Validamos la contraseña
        if (password_verify($password_input, $password_hash)) {
            return 1; // Correcto
        } else {
            return 0; // Incorrecto
        }
    }

}


function fValidaSesion() {

    if (isset($_SESSION['misesion'])) {
        return 1; // Sesión válida
    } else {
        return 0; // Sesión no válida
    }

}

//NO he hecho la verificacion de si es correcta

function fValidaNombre($nombre) {

    if(!isset($nombre) or empty($nombre)) {
        return 0; 
    } else {
        return 1;
    }

}

function fValidaCif($cif) {

    /*if(!isset($cif) or empty($cif)) {*/

    if (preg_match('/^[A-Z]{1}[0-9]{7}([0-9]|[A-Z]){1}$/', $cif)) {
        return 1;
    } else {
        return 0;
    }

    /*} else {
        return 2;
    }*/

}

function fValidaIPv4($IPv4) {

    /*if(!isset($IPv4) or empty($IPv4)) {
        return 2;
    } else*/if (filter_var($IPv4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE)) {
        return 1;
    } else {
        return 0;
    }

}

function fValidaIPv6($IPv6) {

    /*if(!isset($IPv6) or empty($IPv6)) {
        return 2; 
    } else*/if (filter_var($IPv6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        return 1;
    } else {
        return 0;
    }

}

//NO he hecho la verificacion de si es correcta

function fValidaFechaIPv4($fecha_IPv4) {

    if(!isset($fecha_IPv4) or empty($fecha_IPv4)) {
        return 0;
    } else {
        return 1;
    }

}

//NO he hecho la verificacion de si es correcta

function fValidaFechaIPv6($fechaIPv6) {

    if(!isset($fechaIPv6) or empty($fechaIPv6)) {
        return 0;
    } else {
        return 1;
    }

}


?>