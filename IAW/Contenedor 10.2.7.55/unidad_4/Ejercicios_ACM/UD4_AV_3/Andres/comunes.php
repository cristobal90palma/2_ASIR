<?php

$datos = [
    "manolo" => "Usuario.25",
    "maria" => "Usuario.26",
    "admin" => "Usuario.27",
    "jose" => "Usuario.28",
    "cia" => "Usuario.29"
];
$error_codes = [
    0 => "<h1>Faltan datos de usuario o contraseña.</h1>",
    1 => "<h1>Usuario o contraseña incorrectos.</h1>"
];
session_start();

function fValidaAcceso($user,$passwd,$remember){
    global $datos;
    if(isset($user) && $user!="" && isset($passwd) && $passwd!=""){
        $hash = password_hash($datos[$user], PASSWORD_BCRYPT);
        if(array_key_exists($user,$datos) && password_verify($passwd,$hash)){
            $_SESSION['usuario'] = $user;
            $_SESSION['misesion'] = session_id();
            $_SESSION['inicio'] = time();
            header("Location: areapersonal.php");
            exit();
        }elseif(isset($remember)){
            setcookie("recordar",$user,time()+12000,"/");
        }else{
            $_SESSION['error'] = 1;
            return 1;
        }

    }else{
        $_SESSION['error'] = 0;
        return 0;
    }








    
}

function fValidaSesion(){
    if (isset($_SESSION['misesion'])){
        return 1;
    }else{
        return 0;
    }
}





?>