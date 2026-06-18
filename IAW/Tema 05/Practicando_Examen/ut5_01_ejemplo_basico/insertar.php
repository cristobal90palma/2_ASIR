<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        echo "Conexión realiza correctamente.";
        echo "<br/>";

        $insertsql = "insert into alumno(dni, nombre, apellidos, telefono, email) values ('33333333B', 'Luis', 'Jiménez Acosta', 611222555, 'luis@luis.es')";

        if (mysqli_query($conn, $insertsql)) {
            echo "Registro añadido correctamente.";
        } else {
            echo "Se ha producido un error al insertar el registro.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }
 
    mysqli_close($conn);

?>