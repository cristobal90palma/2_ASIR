<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        $sql = "select * from persona";
        $resultadosql = mysqli_query($conn, $sql);

        if ($resultadosql) {
            $rows = mysqli_fetch_all($resultadosql, MYSQLI_ASSOC);
        } else {
            echo "Se ha producido un error al consultar los registros.";
        }

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }
 
    mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <style>
            table, th, td {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Sexo</th>
                    <th>Borrar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($rows as $persona) {
                ?>
                <tr>    
                    <td><?php echo $persona['id']?></td>
                    <td><?php echo $persona['nombre']?></td>
                    <td><?php echo $persona['apellidos']?></td>
                    <td><?php
                            if ($persona['sexo']=="H") {
                                echo "Hombre";
                            } else if($persona['sexo']=="M") {
                                echo "Mujer";
                            } else {
                                echo "Incorrecto";
                            }
                        ?>
                    </td>
                    <td><a href="eliminar.php?id=<?php echo $persona['id']?>">Borrar</a></td>
                    <td><a href="editar.php?id=<?php echo $persona['id']?>">Editar</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <br/>
        <a href="formulario.html">Nueva persona</a>
    </body>
</html>