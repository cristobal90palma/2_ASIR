<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        // Usa empty en vez de !isset cuando el formulario no tenga required. Evitas datos vacios
        if (!isset($_POST['nombre']) || !isset($_POST['apellidos'])
            || !isset($_POST['modelo_pc']) || !isset($_POST['error']) || !isset($_POST['observaciones'])) {
            die ("Error en la recepción de los datos");
        }

        // recepción de datos y puesto en variables
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $modelo_pc = $_POST['modelo_pc'];
        $error = $_POST['error'];
        $observaciones = $_POST['observaciones'];
        
        // insertamos los datos en la tabla
        $insertsql = "insert into averia( nombre, apellidos, modelopc, error, observaciones) 
        values ('".$nombre."', '".$apellidos."', '".$modelo_pc."', '".$error."', '".$observaciones."')";

        // Si la insercción de datos es correcta, redirige a listado.php
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