<?php

    include_once "bbdd.php";
    session_start();

    try {

        if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
        }

        $conn = mysqli_connect($servidor, $user, $password, $bd);
        
        if (!isset($_POST['username']) || !isset($_POST['pass']) || !isset($_POST['pass2'])) {
            die ("Error en la recepción de los datos del usuario");
        }

        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];

        if ($pass == $pass2) {
            $sql = "select username from usuario where username='".$username."'";
            $resultadosql = mysqli_query($conn, $sql);
            if(mysqli_num_rows($resultadosql)==0) {
                // No existe ningún usuario con el username introducido
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "insert into usuario (username, password) values ('".$username."', '".$hash."')";
                $resultadosql = mysqli_query($conn, $sql);
                echo "Usuario registrado correctamente<br/>";
                echo "<a href='acceso.php'>Login</a>";
            } else {
                // ERROR. Hay ya un usuario con el username introducido
                echo "ERROR. Hay ya un usuario con el username introducido.<br/>";
                echo "<a href='registro.html'>Volver al registro</a>";
            }
        } else {
            echo "Las contraseñas no son iguales.<br/>";
            echo "<a href='registro.html'>Volver al registro</a>";
        } 

        

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }
 
    mysqli_close($conn);

?>