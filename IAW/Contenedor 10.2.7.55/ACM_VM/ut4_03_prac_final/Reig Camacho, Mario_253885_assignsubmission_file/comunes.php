<?php

$usuarios_sistema = [
    "admin" => password_hash("Usuario.25", PASSWORD_DEFAULT),
    "user1" => password_hash("usuario1", PASSWORD_DEFAULT),
    "user2" => password_hash("user2", PASSWORD_DEFAULT),
    "user3" => password_hash("secreto3", PASSWORD_DEFAULT),
    "user4" => password_hash("general4", PASSWORD_DEFAULT)
];
//Ponemos la función date ya que suele estar configurado en UTC y no en mi zona horaria por lo que nos ponia una hora antes en las fechas de salir.php
date_default_timezone_set('Europe/Madrid');

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