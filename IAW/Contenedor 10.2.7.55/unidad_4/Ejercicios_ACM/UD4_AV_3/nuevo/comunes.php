<?php

// Array de datos
$datos = [
    "cristobal" => "12345",
    "invitado" => "abcd",
    "admin" => "usuario.12345",
    "cni" => "supersecreto",
    "mi6" => "bond"
];

//

function fValidaAcceso($usuario, $password, $cookie_usuario) {
    global $datos; 
    // "global" permite usar una varible global (que está fuera de la función), dentro de una función.
    // https://es.eitca.org/web-development/eitc-wd-pmsf-php-and-mysql-fundamentals/advancing-in-php/variable-scope/examination-review-variable-scope/how-can-we-access-a-global-variable-inside-a-function-in-php/


    // Comprobamos que los campos no estén vacíos
    if (isset($usuario) && $usuario != "" && isset($password) && $password != "") {
        
        // Comprobamos si el usuario existe en el array
        if (array_key_exists($usuario, $datos)) {
            
            // Usamos password_verify comparando lo que escribe el usuario 
            // con el hash de la contraseña que tenemos guardada
            $hash_guardado = password_hash($datos[$usuario], PASSWORD_BCRYPT);

            //Compara contraseña con el hash creado
            if (password_verify($password, $hash_guardado)) {
                // Si es correcto, crea los requisitos del apartado C. III.
                $_SESSION['usuario'] = $usuario;
                $_SESSION['misesion'] = session_id();
                $_SESSION['inicio'] = time();

                // Creación de la COOKIE: Solo se crea si el login es correcto y 
                // existe la variable cookie_usuario (si no hubiesemos marcado el check, no existiría).
                // Le hemos puesto 24 horas: 1 hora son 3600 segundos.
                if (isset($cookie_usuario)) {
                    setcookie("recuerda", $usuario, time() + 3600 * 24, "/");
                }

                header("Location: areapersonal.php");
                exit();
            } else {
                // return de contraseña incorrecta.
                $_SESSION['error'] = 2;
                return 0;
            }
        } else {
            // return de usuario incorrecto
            $_SESSION['error'] = 1;
            return 0;
        }
    } else {
        // return de faltan datos
        $_SESSION['error'] = 0;
        return 0;
    }
}

// Función para validar la existencia de la clave "misesion" en la sesión actual.
function fValidaSesion() {
    if (isset($_SESSION['misesion'])) {
        return 1;
    } else {
        return 0;
    }
}
?>