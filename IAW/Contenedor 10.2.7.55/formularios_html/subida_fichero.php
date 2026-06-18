<html>
<body>
<h2>Formulario subida de archivos</h2>
<form action="." method="POST" enctype="multipart/form-data">
    <input type="file" name="ficherotxt" />
    <input type="submit" name="submit" value="Subir Archivo" />
</form>

<?php
$directorioSubida = "ficheros/";
$mensaje = ""; // Variable para almacenar mensajes al usuario

if(isset($_POST["submit"]) && isset($_FILES["ficherotxt"])){

    // 1. Verificar si hubo un error en la subida temporal
    if ($_FILES['ficherotxt']['error'] !== UPLOAD_ERR_OK) {
        $mensaje = "Error al subir el archivo temporalmente.";
    } 
    // 2. Verificar si la carpeta de destino existe y tiene permisos
    else if (!is_dir($directorioSubida) || !is_writable($directorioSubida)) {
        $mensaje = "Error: La carpeta **'ficheros/'** no existe o no tiene permisos de escritura (CHMOD 777).";
    }
    // 3. Procesar el archivo
    else {
        $nombreArchivo = $_FILES['ficherotxt']['name'];
        $directorioTemp = $_FILES['ficherotxt']['tmp_name'];

        $arrayArchivo = pathinfo($nombreArchivo);
        $extension = $arrayArchivo['extension'];

        // Usamos la marca de tiempo (time()) para crear un nombre único
        $nombreBase = $arrayArchivo['filename'];
        $nombreCompleto = $directorioSubida . $nombreBase . "_" . time() . "." . $extension;

        // 4. Mover el archivo
        if (move_uploaded_file($directorioTemp, $nombreCompleto)) {
            $mensaje = "El archivo se ha subido correctamente como: **" . $nombreCompleto . "**";
        } else {
            $mensaje = "Error desconocido al mover el archivo.";
        }
    }
}
// Mostrar el mensaje al usuario (incluyendo errores)
if (!empty($mensaje)) {
    echo "<p>$mensaje</p>";
}
?>
</body>
</html>