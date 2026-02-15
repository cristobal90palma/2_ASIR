<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        echo "Conexión realiza correctamente.";
        echo "<br/>";

        $insertsql = "delete from alumno where dni='11111111A'";

        if (mysqli_query($conn, $insertsql)) {
            echo "Registro eliminado correctamente.";
        } else {
            echo "Se ha producido un error al eliminar el registro.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }
 
    mysqli_close($conn);

?>