<?php

try{
    include_once  "funcionesLogin.php";
    
    #login/signin
    $usuario = $_POST['usuario'];
    $password = $_POST['contrasena'];
    $password2 = $_POST['password2'];
    $tipo = $_POST['tipo'];

    #pedir
    $nombre = $_POST['nombre'];
    $tlf = $_POST['tlf'];
    $dir = $_POST['dir'];
    $productos = $_POST['prodSel'];


    #borrar
    $id = $_POST['id'];

    switch($tipo){
        case "signin":
            registroUsuario($usuario,$password,$password2);
            break;
        case "login":
            login($usuario,$password);
            break;
        case "pedir":
            procesarPedido($nombre,$tlf,$dir,$productos);
            break;
        case "borrar":
            borrarPedido($id);
            break;
        default;
            header("Location: login.php");
            break;
    
        }       




} catch(Exception $e){
    echo obtenerError(99);
    echo "<b><p>".$e->getMessage()."</p><b>";
}





?>