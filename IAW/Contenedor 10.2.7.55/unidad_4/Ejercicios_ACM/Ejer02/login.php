<?php

    //session_start();
    $usuario_ok = "usuario";
    $password_ok = "usuario1";

  
    $pass_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    if ($_POST['usuario']==$usuario_ok && password_verify($password_ok, $pass_hash)) {
        setcookie('usuario', $_POST['usuario'], time() +3600);
        setcookie('error', false, time() +3600);
        header("Location: secreta.php");
    } else {
        setcookie('usuario', null, time() +3600);
        setcookie('error', true, time() +3600);
        //$_SESSION['usuario'] = "";
        //$_SESSION['error'] = true;
        header("Location: index.php");
    }
?>