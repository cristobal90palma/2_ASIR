<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        if (!isset($_POST['nombre']) || !isset($_POST['apellidos']) || !isset($_POST['sexo'])) {
            die ("Error en la recepción de los datos de la persona");
        }

        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $sexo = $_POST['sexo'];

        $insertsql = "insert into persona(nombre, apellidos, sexo) values ('".$nombre."', '".$apellidos."', '".$sexo."')";

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