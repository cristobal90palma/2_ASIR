<?php
// --- CONFIGURACIÓN DE SUBIDA ---
// directorio donde subimos el archivo. Recuerda hacherl chmod 777 y chwon root:root o como se llame el superusuario en el equipo
$directorio_subida = "uploads/";

// Procesar solo si es POST: used to check if form submissions were correctly done. https://www.sitepoint.com/community/t/if--server-request-method-post-vs-isset-submit/252336
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // --- RECOGER DATOS ---
    // operador de coalescencia nula (?? "") https://desarrolloweb.com/articulos/operador-php-coalescencia-nula
    // Si la expresión existe y no es NULL, se asigna a la variable ese valor. 
    // Si no existe (su valor es NULL) entonces se asigna el valor de la derecha, que es una cadena vacía ("")
    $puesto = $_POST["puesto"] ?? "";
    $fecha_envio = $_POST["fecha_envio"] ?? "";
    $nombre = $_POST["nombre"] ?? "";
    $apellidos = $_POST["apellidos"] ?? "";
    $edad = $_POST["edad"] ?? "";
    $fecha_nacimiento = $_POST["fecha_nacimiento"] ?? "";
    $nacionalidad = $_POST["nacionalidad"] ?? "";
    $genero = $_POST["genero"] ?? "";
    $telefono = $_POST["telefono"] ?? "";
    $municipio = $_POST["municipio"] ?? "";
    $provincia = $_POST["provincia"] ?? "";
    $calle = $_POST["calle"] ?? "";
    $email = $_POST["email"] ?? "";
    $estado_civil = $_POST["estado_civil"] ?? "";
    $descripcion = $_POST["descripcion"] ?? "";

    // --- SUBIDA DE ARCHIVO ---
    //Crea un atributo archivo tomando el valor de ls variable globarl $_FILES = archivo -->Se indica en el HTML. El archivo en sí?
    $archivo = $_FILES["archivo"];

    /* https://www.php.net/manual/es/features.file-upload.post-method.php
    Se comprueba el elemento error del array $archivo. Si su valor es UPLOAD_ERR_OK (que vale 0), 
    significa que el archivo se subió al directorio temporal del servidor sin problemas reportados por PHP 
    (tamaño excedido, subida interrumpida, etc.). 
    Si no es UPLOAD_ERR_OK, se establece un mensaje de error genérico.
    */
    if ($archivo["error"] === UPLOAD_ERR_OK) {

        // Si lo anterior está bien, se le da un nombre y se establace la ruta. Las dos nuevas variables de abajo son 
        // para "limpiar" el nombre ("basename" https://www.php.net/manual/en/function.basename.php) y establecer bien la ruta completa (directorio_subida + nombre_archivo)
        $nombre_archivo = basename($archivo["name"]);
        $ruta_destino = $directorio_subida . $nombre_archivo;

        // se mueve el archivo desde su directorio temporal (valor --> tmp_name) a la ruta_destino establecida antes.
        // https://www.php.net/manual/en/function.move-uploaded-file.php
        // El mensaje del resultado se guarda en variable para después hacerle un echo.
        if (move_uploaded_file($archivo["tmp_name"], $ruta_destino)) {
            $mensaje_archivo = "Archivo subido correctamente: " . $nombre_archivo;
        } else {
            $mensaje_archivo = "Error al mover el archivo.";
        }

        // si todo lo anterior falla a la hora de subir el archivo, salta este mensaje.
    } else {
        $mensaje_archivo = "Error al subir el archivo.";
    }

// Si se intenta entrar en el PHP de malas maneras.

} else {
    echo "Acceso no permitido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Datos recibidos</title>
</head>
<body>

<h1>Datos del Curriculum</h1>

<p><b>Puesto solicitado:</b> <?php echo $puesto; ?></p>
<p><b>Fecha de envío:</b> <?php echo $fecha_envio; ?></p>

<h2>Datos personales</h2>

<p><b>Nombre:</b> <?php echo $nombre; ?></p>
<p><b>Apellidos:</b> <?php echo $apellidos; ?></p>
<p><b>Edad:</b> <?php echo $edad; ?></p>
<p><b>Fecha de nacimiento:</b> <?php echo $fecha_nacimiento; ?></p>
<p><b>Nacionalidad:</b> <?php echo $nacionalidad; ?></p>
<p><b>Género:</b> <?php echo $genero; ?></p>
<p><b>Teléfono:</b> <?php echo $telefono; ?></p>
<p><b>Municipio:</b> <?php echo $municipio; ?></p>
<p><b>Provincia:</b> <?php echo $provincia; ?></p>
<p><b>Calle:</b> <?php echo $calle; ?></p>
<p><b>Email:</b> <?php echo $email; ?></p>
<p><b>Estado civil:</b> <?php echo $estado_civil; ?></p>

<h3>Descripción:</h3>
<p><?php echo $descripcion; ?></p>

<h3>Archivo subido</h3>
<p><?= $mensaje_archivo ?></p>
<p><a href="uploads/<?php echo $nombre_archivo; ?>" target="_blank">Descargar archivo</a></p>


</body>
</html>
