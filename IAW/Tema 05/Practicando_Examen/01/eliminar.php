<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        $id = $_GET['nparte'];
        $insertsql = "delete from averia where nparte=".$id;

        if (mysqli_query($conn, $insertsql)) {
            header("Location: listado.php");

        } else {
            echo "Se ha producido un error al eliminar el registro.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error en: " . $e->getMessage(); // Para saber de donde viene el error
         //echo "Conexión errónea en nuevo.php";
    }
 
    mysqli_close($conn);

?>