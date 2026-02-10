<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        echo "Conexión realiza correctamente.";
        echo "<br/>";

        $sql = "select * from alumno";
        $resultadosql = mysqli_query($conn, $sql);

        if ($resultadosql) {
            echo "Registros consultados correctamente.";
            $rows = mysqli_fetch_all($resultadosql, MYSQLI_NUM);
            echo "<pre>";
            print_r($rows);
            echo "</pre>";
        } else {
            echo "Se ha producido un error al consultar los registros.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }
 
    mysqli_close($conn);

?>