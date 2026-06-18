<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        $id = $_GET['nparte'];
        $selectsql = "select * from averia where nparte=".$id;
        $resultadosql = mysqli_query($conn, $selectsql);
        if ($resultadosql) {
            $averias = mysqli_fetch_array($resultadosql, MYSQLI_ASSOC);
        } else {
            echo "Se ha producido un error al consultar el registro.";
        }

        $nparte = $averias['nparte'];
        $nombre = $averias['nombre'];
        $apellidos = $averias['apellidos'];
        $modelopc = $averias['modelopc'];
        $error = $averias['error'];
        $observaciones = $averias['observaciones'];
        

    } catch (Exception $e) {
        echo "Se produjo un error en: " . $e->getMessage(); // Para saber de donde viene el error
         //echo "Conexión errónea en nuevo.php";
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de averias</title>
</head>
<body>
    <form method="post" action="actualizar.php">
        <fieldset>
            <input type="hidden" name="nparte" value="<?php echo $id; ?>"/>
            <legend>Datos de la avería</legend>
            <label for="nombre">Nombre del cliente: </label>
            <br/>
            <input type="text" name="nombre" placeholder="Escriba aquí el nombre del cliente" size="50" value="<?php echo $nombre; ?>" required/>
            <br/>
            <br/>
            <label for="apellidos">Apellidos del cliente: </label>
            <br/>
            <input type="text" name="apellidos" placeholder="Escriba aquí los apellidos del cliente" size="50" value="<?php echo $apellidos; ?>" required/>
            <br/>
            <br/>
            
            <label for="modelopc">Modelo del PC: </label>
            <br/>
            <input type="text" name="modelopc" placeholder="Escriba aquí el modelo del PC" size="50" value="<?php echo $modelopc; ?>" required/>
            <br/>
            <br/>
            <label for="error">Error: </label>
            <br/>
            <input type="text" name="error" placeholder="Indica el error" size="50" value="<?php echo $error; ?>" required/>
            <br/>
            <br/>
            <label for="observaciones">Observaciones: </label>
            <br/>
            <input type="text" name="observaciones" placeholder="Indique sus observaciones" size="50" value="<?php echo $observaciones; ?>" required/>
            <br/>
            <br/>
            <input type="submit" value="Guardar"/>
        </fieldset>
    </form>
</body>
</html>

