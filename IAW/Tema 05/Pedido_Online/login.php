<?php

    include_once "bbdd.php";
    session_start();

    $userf = $_POST['username'];
    $passf = $_POST['pass'];


    try {

        $conexion = mysqli_connect($servidor, $user, $password, $bd);
        $sql = "select * from usuario where username='".$userf."'";
        $resultadosql = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultadosql)==1) {
            // Caso correcto. Hay un usuario con ese username
            $userbbdd = mysqli_fetch_array($resultadosql, MYSQLI_ASSOC);
            $hasspassbbdd = $userbbdd['password'];
            if(password_verify($passf, $hasspassbbdd)) {
                $_SESSION['user'] = $userbbdd['username'];
                $_SESSION['error_login'] = false;
                header("Location: pedido.php");
            } else {
                unset($_SESSION['user']);
                $_SESSION['error_login'] = true;
                header("Location: acceso.php");    
            }

        } else {
            unset($_SESSION['user']);
            $_SESSION['error_login'] = true;
            header("Location: acceso.php");
        }
        
    } catch (Exception $e) {
        echo "ERROR: ".$e->getMessage();
    }
    
    mysqli_close($conexion);


?>