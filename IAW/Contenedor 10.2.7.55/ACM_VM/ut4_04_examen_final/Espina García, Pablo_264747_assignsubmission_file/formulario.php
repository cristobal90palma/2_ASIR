<?php

$recuerdo="";
$mensaje="";
$correo= $_POST["correo"];
$password= $_POST["password"];

function fAccesoValido($correo, $password){
$usuario = [
     "pablo@gmail.com" => password_hash("21016444X", PASSWORD_DEFAULT)
];

 if (!array_key_exists($correo, $usuario)) {
        return 0;
    }
 if (password_verify($password, $usuario[$correo])) {
        return 1;
    }
    return 0;
}
?>
