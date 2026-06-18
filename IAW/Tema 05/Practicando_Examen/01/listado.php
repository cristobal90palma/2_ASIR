<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        $sql = "select * from averia";
        $resultadosql = mysqli_query($conn, $sql);

        if ($resultadosql) {
            $rows = mysqli_fetch_all($resultadosql, MYSQLI_ASSOC);
        } else {
            echo "Se ha producido un error al consultar los registros.";
        }

    } catch (Exception $e) {
         echo "Conexión errónea";
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
                    <th>ID Parte</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Modelo PC</th>
                    <th>Error</th>
                    <th>Observaciones</th>
                    <th>Borrar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($rows as $averias) {
                ?>
                <tr>    
                    <td><?php echo $averias['nparte']?></td>
                    <td><?php echo $averias['nombre']?></td>
                    <td><?php echo $averias['apellidos']?></td>
                    <td><?php echo $averias['modelopc']?></td>
                    <td><?php echo $averias['error']?></td>
                    <td><?php echo $averias['observaciones']?></td>
                    <td><a href="eliminar.php?nparte=<?php echo $averias['nparte']?>"
                        onclick="return confirm('¿Seguro que deseas eliminar este pedido?')">Borrar</a></td>
                    <td><a href="editar.php?nparte=<?php echo $averias['nparte']?>">Editar</a></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <br/>
        <a href="formulario.html">Nueva averia</a>
    </body>
</html>