<?php

    include_once "bbdd.php";
    session_start();

    try {

        // Redirección si ya está logueado
        if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
            header("Location: consultar.php");
            exit(); // Detenemos la ejecución para que no procese el registro
        }

        // Conexión con BBDD
        $conexion = mysqli_connect($servidor, $user, $password, $bd);
        
        // Comprobar datos del formulario
        if (empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['pass2'])) {
            die ("Error en la recepción de los datos del usuario");
        }

        // Guardar datos recepcionados
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];

        // Comprobar que ambas contraseñas son iguales (las del formulario) y 
        // que no hay ningún usuario que ya tenga ese nombre
        if ($pass == $pass2) {
            $sql = "select username from usuario where username='".$username."'";
            $resultadosql = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultadosql)==0) {
                // No existe ningún usuario con el username introducido
                // hashea la contraseña
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "insert into usuario (username, password) values ('".$username."', '".$hash."')";
                $resultadosql = mysqli_query($conexion, $sql);
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
 
    mysqli_close($conexion);

?>