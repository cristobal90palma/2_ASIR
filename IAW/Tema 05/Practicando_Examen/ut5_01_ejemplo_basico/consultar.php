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
            // "Rebobinamos" al registro 0: " Adjusts the result pointer to an arbitrary row in the result" https://www.php.net/manual/en/mysqli-result.data-seek.php
            mysqli_data_seek($resultadosql, 0);
            $rows2 = mysqli_fetch_all($resultadosql, MYSQLI_ASSOC);
            echo "<pre>";
            print_r($rows2);
            echo "</pre>";
        } else {
            echo "Se ha producido un error al consultar los registros.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }
 
    mysqli_close($conn);

?>