<?php

    include_once "bbdd.php";
    //session_start();

    try {

        /*
        if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
        }
        */
        

        // Comprobar conexión
        $conexion = mysqli_connect($servidor, $user, $password, $bd);
        

        // Comprobar recepción de datos desde registro.html. Usamos "empty" para evitar que nos cree usuarios en blanco.
        if (empty($_POST['username']) || empty($_POST['pass']) || empty($_POST['pass2'])) {
            echo "<a href='registro.html'>Volver al registro</a><br/>";
            die ("Error: Todos los campos son obligatorios.");
        }

        // Pasamos los datos recepccionados a variables
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $pass2 = $_POST['pass2'];

        // Comprobación de que las dos contraseñas del formulario son iguales.
        if ($pass == $pass2) {

            // En caso correcto. Se hace una conexión a la base de datos buscando
            // el nombre del usuario. Si no está, no existe, por lo tanto se puede crear.
            $sql = "select username from usuario where username='".$username."'";
            $resultadosql = mysqli_query($conexion, $sql);
            if(mysqli_num_rows($resultadosql)==0) {
                // No existe ningún usuario con el username introducido
                // Hasheamos la contraseña. Si metes el usuario por el phpmyadmin, la contraseña no se haseha y luego no funciona cuando quieres usarla.
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "insert into usuario (username, password) values ('".$username."', '".$hash."')";
                $resultadosql = mysqli_query($conexion, $sql);
                echo "Usuario registrado correctamente<br/>";
                echo "<a href='acceso.php'>Login</a>";
            } else {
                // Mensaje de ERROR. Hay ya un usuario con el username introducido
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