<?php
// comunes.php

function fValidaAcceso($usuario, $password) {
    // Array asociativo con 5 usuarios (Clave: usuario, Valor: password hash)
    $usuarios = [
        "admin" => password_hash("1234", PASSWORD_DEFAULT),
        "juan" => password_hash("pass1", PASSWORD_DEFAULT),
        "maria" => password_hash("pass2", PASSWORD_DEFAULT),
        "pedro" => password_hash("pass3", PASSWORD_DEFAULT),
        "ana" => password_hash("pass4", PASSWORD_DEFAULT)
    ];

    // Comprobamos si existe el usuario en las claves del array
    if (array_key_exists($usuario, $usuarios)) {
        // Verificamos si la contraseña coincide con el hash
        if (password_verify($password, $usuarios[$usuario])) {
            return 1;
        }
    }
    return 0;
}

function fValidaSesion() {
    session_start();
    if (isset($_SESSION['misesion']) && $_SESSION['misesion']!="") {
        return 1;
    }
    return 0;
}
?>