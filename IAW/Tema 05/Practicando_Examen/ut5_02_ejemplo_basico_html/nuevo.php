<?php

    include_once "bbdd.php";

    try {

        //Nos conectamos con la bbdd
        $conn = mysqli_connect($servidor, $user, $password, $bd);

        //Comprobamos recepeción de datos del formulario.
        //Usamos empty para evitar que si nos mandan datos vacios, estos no sirvan.
        //Si el formulario no tiene "required", este enviará datos vacios.
        if (empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['sexo'])) {
            die ("Error en la recepción de los datos de la persona");
        }

        // pasamos los datos a variables.
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $sexo = $_POST['sexo'];

        $insertsql = "insert into persona(nombre, apellidos, sexo) values ('".$nombre."', '".$apellidos."', '".$sexo."')";

        // Si los datos se han insertado, mandame a listado.php
        if (mysqli_query($conn, $insertsql)) {
            header("Location: listado.php");
        } else {
            echo "Se ha producido un error al insertar el registro.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }
 
    mysqli_close($conn);

?>