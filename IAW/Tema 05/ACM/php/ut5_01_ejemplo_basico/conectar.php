<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        echo "Conexión realiza correctamente";
        echo "<pre>";
        print_r($conn);
        echo "</pre>";

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }
 
    mysqli_close($conn);

?>