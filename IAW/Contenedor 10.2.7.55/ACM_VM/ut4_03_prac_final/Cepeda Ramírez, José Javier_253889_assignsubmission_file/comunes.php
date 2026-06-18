<?php

    function fValidaAcceso($usuario, $password){

        $usuarios = array(
            "usuario1" => password_hash("clave1", PASSWORD_DEFAULT),
            "usuario2" => password_hash("clave2", PASSWORD_DEFAULT),
            "usuario3" => password_hash("clave3", PASSWORD_DEFAULT),
            "usuario4" => password_hash("clave4", PASSWORD_DEFAULT),
            "usuario5" => password_hash("clave5", PASSWORD_DEFAULT)
        );

        if (in_array($usuario, array_keys($usuarios)) && password_verify($password, $usuarios[$usuario])) {
            return 1;
        } else {
            return 0;
        }
    }

    function fValidaSesion(){
        session_start();
        if (isset($_SESSION["misesion"]) && $_SESSION["misesion"]!=""){
            return 1;
        } else {
            return 0;
        }
    }

?>