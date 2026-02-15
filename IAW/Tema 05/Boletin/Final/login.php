<?php

    include_once "bbdd.php";
    session_start();

    // Recepción desde el formulario de acceso.php
    $userf = $_POST['username'];
    $passf = $_POST['pass'];


    try {

        // Se guarda la conexión. Se escribe el mensaje que se mandará al servidor MySQL
        // y por último se envia el mensaje, guardando el resultado en una variable.
        $conexion = mysqli_connect($servidor, $user, $password, $bd);
        $sql = "select * from usuario where username='".$userf."'";
        $resultadosql = mysqli_query($conexion, $sql);


        // Si devuelve una fila, es que existe, si no ("0"), es que no existe.
        if (mysqli_num_rows($resultadosql)==1) {
            // convierte el resultado del select en un array asociativo.
            $userbbdd = mysqli_fetch_array($resultadosql, MYSQLI_ASSOC);
            // Toma la password del usuario que hay en el array asociativo (este ya debe estar hasheado en la BBDD)
            $hasspassbbdd = $userbbdd['password'];
            //Verifica que ambas contraseñas coinciden. Crea las correspondiendes SESSION y redirecciona
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