<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        if (empty($_POST['nombre']) || empty($_POST['apellidos']) || empty($_POST['sexo'])) {
            die ("Error en la recepción de los datos de la persona");
        }

        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $sexo = $_POST['sexo'];

        $sql = "update persona set nombre='".$nombre."', apellidos='".$apellidos."', sexo='".$sexo."' where id=".$id;

        if (mysqli_query($conn, $sql)) {
            header("Location: listado.php");

        } else {
            echo "Se ha producido un error al actualizar el registro.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }
 
    mysqli_close($conn);

?>