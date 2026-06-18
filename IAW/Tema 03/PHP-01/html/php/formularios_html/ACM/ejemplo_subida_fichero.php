
<?php
    $directoriosubida = "ficheros/";
    //print_r($_FILES);
    if (isset($_FILES['ficherotxt'])){
        $nombreArchivo =  $_FILES['ficherotxt']['name'];
        $filesize =  $_FILES['ficherotxt']['size'];
        $directorioTemp = $_FILES['ficherotxt']['tmp_name'];
        $tipoArchivo = $_FILES['ficherotxt']['type'];

        $arrayArchivo = pathinfo($nombreArchivo);
        $extension = $arrayArchivo['extension'];

        $nombreArchivo = $arrayArchivo['filename'];
        $nombreCompleto = $directoriosubida.$nombreArchivo.".".$extension;

        $arrayTipos = ['image/jpeg', 'image/png'];
        $tamMax = 1024 * 1024;

        if (!in_array($tipoArchivo, $arrayTipos)){
            echo "Tipo de archivo incorrecto. Solo se permiten JPG y PNG.";
        } elseif ($filesize > $tamMax){
            echo "Tamaño de archivo incorrecto. Máximo permitido 1 MB";
        } else {
            move_uploaded_file($directorioTemp, $nombreCompleto);
            echo "El archivo se ha subido correctamente";
        }

       

    }
?>
