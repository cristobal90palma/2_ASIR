<?php

$usuarios_sistema = [
    "marioreig17@gmail.com" => password_hash("49548045L", PASSWORD_DEFAULT),
    "pepe@gmail.com" => password_hash("49548046M", PASSWORD_DEFAULT),
    "pablo@gmail.com" => password_hash("49548047N", PASSWORD_DEFAULT)
];

 // Retorna 1 si es correcto la contraseña , 0 si no 

function fValidaAcceso($usuario, $password) {
    global $usuarios_sistema;
    
    if (array_key_exists($usuario, $usuarios_sistema)) {
        if (password_verify($password, $usuarios_sistema[$usuario])) {
            return 1; 
        }
    }
    return 0; 
}

//Retorna 1 si es válido la clave 'misesion', 0 en caso contrario 

function fValidaSesion() {
    if (isset($_SESSION['misesion'])) {
        return 1; 
    }
    return 0; 
}
?>