<?php
//

// Datos simulados (en un proyecto real vendrían de BBDD)
$dniCorrecto = "12345678Z";
$passwordCorrecta = password_hash("itv123", PASSWORD_BCRYPT);


$dni = $_POST['dni'];
$password = $_POST['password'];


session_start();

// Si sale bien, va a "datos_cliente.php", si sale mal, empieza de nuevo en "login.php"
if (isset($dni) && $dni!="" && isset($password) && $password!=""){
    if ($dni==$dni && password_verify($password,$passwordCorrecta)){
        $_SESSION['usuario'] = $_POST['dni'];
        $_SESSION['error'] = False;
        header("Location: datos_cliente.php");
    }else{
        $_SESSION['usuario'] = "";
        $_SESSION['error'] = True;
        header("Location: login.php");

    }

}else{
    $_SESSION['usuario'] = "";
    $_SESSION['error'] = True;
    header("Location: login.php");
}

?>
