<?php

    session_start();
    $usuario_ok = "usuario";
    $password_ok = "usuario1";

  
    $pass_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    if ($_POST['usuario']==$usuario_ok && password_verify($password_ok, $pass_hash)) {
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['error'] = false;
        header("Location: secreta.php");
    } else {
        $_SESSION['usuario'] = "";
        $_SESSION['error'] = true;
        header("Location: index.php");
    }
?>