<?php
// comunes.php

$credenciales = [
    "alvaro" => "Alvarp.1234",
    "juan"  => "Juan.1234",
    "admin"   => "Admin.1234",
    "carlos" => "Carlos.1234",
    "eva"    => "Eva.1234"
];

session_start();

function fValidaAcceso($usuario, $password, $recordar){
    global $credenciales;

    if (isset($usuario) && $usuario != "" && isset($password) && $password != "") {

        $hash = password_hash($credenciales[$usuario], PASSWORD_BCRYPT);

        if (array_key_exists($usuario, $credenciales) && password_verify($password, $hash)) {

            $_SESSION['usuario']  = $usuario;
            $_SESSION['misesion'] = session_id();
            $_SESSION['inicio']   = time();

            header("Location: areapersonal.php");
            exit();

        } elseif (isset($recordar)) {

            setcookie("recuerda", $usuario, time() + 12000, "/");

        } else {

            $_SESSION['error'] = 1;
            return 1;
        }

    } else {

        $_SESSION['error'] = 0;
        return 0;
    }
}


function fValidaSesion() {
    if (isset($_SESSION["misesion"])) {
        return 1;
    } else {
        return 0;
    }
}

?>


