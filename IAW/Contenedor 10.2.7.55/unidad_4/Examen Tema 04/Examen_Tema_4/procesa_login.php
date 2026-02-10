<?php
//

// Datos simulados (en un proyecto real vendrían de BBDD)
$correo_correcto = "cristobal2590@gmail.com";
$passwordCorrecta = password_hash("48920818W", PASSWORD_BCRYPT);


$correo = $_POST['correo'];
$password = $_POST['password'];


session_start();

// Si sale bien, va a "datos_cliente.php", si sale mal, empieza de nuevo en "login.php"
if (isset($correo) && $correo!="" && isset($password) && $password!=""){
    if ($correo==$correo_correcto && password_verify($password,$passwordCorrecta)){
        $_SESSION['usuario'] = $_POST['correo'];
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
