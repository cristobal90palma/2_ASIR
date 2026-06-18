<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        if (!isset($_POST['nombre']) || !isset($_POST['apellidos'])
            || !isset($_POST['modelo_pc']) || !isset($_POST['error']) || !isset($_POST['observaciones'])) {
            die ("Error en la recepción de los datos");
        }

        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $modelo_pc = $_POST['modelo_pc'];
        $error = $_POST['error'];
        $observaciones = $_POST['observaciones'];
        

        $insertsql = "insert into averias( nombre, apellidos, modelo_pc, error, observaciones) 
        values ('".$nombre."', '".$apellidos."', '".$modelo_pc."', '".$error."', '".$observaciones."')";

        if (mysqli_query($conn, $insertsql)) {
            header("Location: listado.php");
        } else {
            echo "Se ha producido un error al insertar el registro.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error en: " . $e->getMessage(); // Para saber de donde viene el error
         //echo "Conexión errónea en nuevo.php";
    }
 
    mysqli_close($conn);

?>