<?php

    include_once "bbdd.php";

    try {

        $conn = mysqli_connect($servidor, $user, $password, $bd);

        $id = $_GET['id'];
        $selectsql = "select * from persona where id=".$id;
        $resultadosql = mysqli_query($conn, $selectsql);
        if ($resultadosql) {
            $persona = mysqli_fetch_array($resultadosql, MYSQLI_ASSOC);
        } else {
            echo "Se ha producido un error al consultar el registro.";
        }

        $nombre = $persona['nombre'];
        $apellidos = $persona['apellidos'];
        $sexo = $persona['sexo'];

    } catch (Exception $e) {
        echo "Se produjo un error: " . $e->getMessage();
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de personas</title>
</head>
<body>
    <form method="post" action="actualizar.php">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <legend>Datos de la persona</legend>
            <label for="nombre">Nombre: </label>
            <br/>
            <input type="text" name="nombre" placeholder="Escriba aquí tu nombre" size="50" required value="<?php echo $nombre; ?>"/>
            <br/>
            <br/>
            <label for="apellidos">Apellidos: </label>
            <br/>
            <input type="text" name="apellidos" placeholder="Escriba aquí tus apellidos" size="50" required value="<?php echo $apellidos; ?>"/>
            <br/>
            <br/>
            <label for="sexo">Sexo: </label>
            <br/>
            <select name="sexo" required>
                <option value="">Seleccione</option>
                <?php
                if ($sexo=="H") {
                    echo "<option value='H' selected>Hombre</option>";
                    echo "<option value='M'>Mujer</option>";
                } elseif ($sexo=="M"){
                    echo "<option value='H'>Hombre</option>";
                    echo "<option value='M' selected>Mujer</option>";
                } else {
                    echo "<option value='H'>Hombre</option>";
                    echo "<option value='M'>Mujer</option>";
                }
                ?>
            </select>
            <br/>
            <br/>
            <input type="submit" value="Guardar"/>
        </fieldset>
    </form>
</body>
</html>