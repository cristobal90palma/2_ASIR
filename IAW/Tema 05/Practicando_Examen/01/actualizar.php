<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        if (!isset($_POST['nombre']) || !isset($_POST['apellidos'])
            || !isset($_POST['modelopc']) || !isset($_POST['error']) || !isset($_POST['observaciones'])) {
            die ("Error en la recepción de los datos");
        }

        $nparte = $_POST['nparte'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $modelopc = $_POST['modelopc'];
        $error = $_POST['error'];
        $observaciones = $_POST['observaciones'];

        $sql = "update averia set nombre='".$nombre."', apellidos='".$apellidos."', modelopc='".$modelopc."', error='".$error."', observaciones='".$observaciones."' where nparte=".$nparte;

        if (mysqli_query($conn, $sql)) {
            header("Location: listado.php");

        } else {
            echo "Se ha producido un error al actualizar el registro.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error en: " . $e->getMessage(); // Para saber de donde viene el error
         //echo "Conexión errónea en nuevo.php";
    }
 
    mysqli_close($conn);

?>