<?php
$credenciales = [
    "armando@gmail.com" => "4895476H",
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

            header("Location: formulario.php");
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

function validaNombre($n){
        if ($n==null || $n=="") {
            return "El nombre de la empresa es obligatorio.";
        } elseif(strlen($n)>50) {
            return "El nombre no puede tener más de 50 caracteres.";
        } else {
            return "";
        }
    }

function validacif($cif){
        if ($cif==null || $cif=="") {
            return "El CIF de la empresa es obligatorio.";
        } elseif(preg_match('/^[A-Z]{1} [0-9]{7} [A-Z]{1} $/', $CIF)==false) {
            return "El CIF de la empresa no es correcto.";
        } else {
            return "";
        }
    }
?>


