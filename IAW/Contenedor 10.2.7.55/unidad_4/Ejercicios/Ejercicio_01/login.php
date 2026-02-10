<?php

session_start();
$usuario_ok = "usuario";
$password_ok = "usuario1";

if (isset($_POST['usuario']) &&  $_POST['usuario'] != "" && 
    isset($_POST['password']) &&  $_POST['password'] != "") {
        $pass_hash = password_hash($_POST['password'], PASSWORD_BCRYPT); //creamos una hash y abajo verificamos variable de la password y de la hash. te calcula si coinciden
        if ($_POST['usuario'] == $usuario_ok  && password_verify($password_ok, $pass_hash)) {
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['error'] = $false;
            //echo "Bienvenido, puede acceder a la página secreta.<a href='secreta.php'>ACCESO</a>";
            header("Location: secreta.php");
        } else {
            $_SESSION['usuario'] = "";
            $_SESSION['error'] = true;
            header("Location: index.php"); //reenvia automaticamente. Has metido usuario y/o contraseña incorrecto, te manda a index.php
        }

    } else {
            $_SESSION['usuario'] = "";
            $_SESSION['error'] = true;
            header("Location: index.php"); //reenvia automaticamente. Error principal, te manda a index.php
    }





?>