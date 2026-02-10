<?php
    session_start();

// Aqui esd donde se guardan los nombres de los usuarios validos, junto con sus contraseñas 
    function fValidaAcceso($usuario, $password) {
        $usuarios = [
            "gonzalorubiovigueras@gmail.com" => password_hash("54790324T", PASSWORD_DEFAULT),
        ];

        if (array_key_exists($usuario, $usuarios)) {
            if (password_verify($password, $usuarios[$usuario])) {
                return 1;
            }
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