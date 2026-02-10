<?php

$datos = ["hola@andresgp.dev" => password_hash("49954663C", PASSWORD_BCRYPT)];
session_start();

$usuario = $_POST['correo'];
$passwd = $_POST['password'];


if (isset($usuario) && $usuario!="" && isset($passwd) && $passwd!=""){
    if (array_key_exists($usuario,$datos) && password_verify($passwd,$datos[$usuario])){
        $_SESSION['misesion'] = session_id();
        $_SESSION['usuario'] = $usuario;
        header("Location: formulario.php");
        exit();
    }else{
        $_SESSION['error'] = true;
        header("Location: inicio.php");
        exit();

    }
}

?>