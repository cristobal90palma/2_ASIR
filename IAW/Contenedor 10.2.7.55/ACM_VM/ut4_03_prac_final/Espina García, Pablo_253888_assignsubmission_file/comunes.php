<?php
session_start();

function fValidaAcesso($usuario, $password) {

    // Lista de usuarios con contraseñas hasheadas
    $usuarios = [
        "pablo" => password_hash("1234", PASSWORD_DEFAULT),
        "ana"   => password_hash("abcd", PASSWORD_DEFAULT),
        "maria" => password_hash("qwerty", PASSWORD_DEFAULT),
        "luis"  => password_hash("pass1", PASSWORD_DEFAULT),
        "pepe"  => password_hash("pass2", PASSWORD_DEFAULT),
    ];

    // Comprobar si el usuario existe
    if (!array_key_exists($usuario, $usuarios)) {
        return 0;
    }

    // Verificar contraseña
    if (password_verify($password, $usuarios[$usuario])) {
        return 1;
    }

    return 0;
}

function fValidaSesion() {
    if (isset($_SESSION["misesion"])) {
        return 1;
    }
    return 0;
}
?>