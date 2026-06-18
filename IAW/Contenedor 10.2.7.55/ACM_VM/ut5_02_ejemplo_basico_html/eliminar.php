<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        $id = $_GET['id'];
        $insertsql = "delete from persona where id=".$id;

        if (mysqli_query($conn, $insertsql)) {
            header("Location: listado.php");

        } else {
            echo "Se ha producido un error al eliminar el registro.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }
 
    mysqli_close($conn);

?>