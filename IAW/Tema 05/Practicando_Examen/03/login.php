<?php

    include_once "bbdd.php";
    session_start();

    // Recepción de datos del formulario
    $userf = $_POST['username'];
    $passf = $_POST['pass'];


    try {

        // Conexión con BBDD, recoger datos de consulta SELECT
        $conexion = mysqli_connect($servidor, $user, $password, $bd);
        $sql = "select * from usuario where username='".$userf."'";
        $resultadosql = mysqli_query($conexion, $sql);

        // Si ya hay algún usuario (==1 fila)
        if (mysqli_num_rows($resultadosql)==1) {
            // Caso correcto. Hay un usuario con ese username. Se toma los datos de esa fila en un 
            // array asociativo. Y luego, de ese array se toma el valor de la columna "password".
            // Luego se crea la SESSION con el nombre del usuario y a error_login un valor de FALSE
            $userbbdd = mysqli_fetch_array($resultadosql, MYSQLI_ASSOC);
            $hasspassbbdd = $userbbdd['password'];
            if(password_verify($passf, $hasspassbbdd)) {
                $_SESSION['user'] = $userbbdd['username'];
                $_SESSION['error_login'] = false;
                header("Location: consultar.php");
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