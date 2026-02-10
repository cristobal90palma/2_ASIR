<?php

echo "<h1>Solicitud de Empleo</h1>";
echo "<p>Puesto: ".$_POST["puesto"]."</p>\n";
echo "<p>Fecha de envío: ".$_POST["fecha_envio"]."</p>\n";
echo "<h1>Datos Personales</h1>";
echo "<p>Nombre: ".$_POST["nombre"]."</p>\n";
echo "<p>Apellidos: ".$_POST["apellidos"]."</p>\n";
echo "<p>Edad: ".$_POST["edad"]."</p>\n";
echo "<p>Fecha de nacimiento: ".$_POST["fecha_nacimiento"]."</p>\n";
echo "<p>Nacionalidad: ".$_POST["nacionalidad"]."</p>\n";
echo "<p>Género: ".$_POST["genero"]."</p>\n";
echo "<p>Teléfono: ".$_POST["telefono"]."</p>\n";
echo "<p>Municipio: ".$_POST["municipio"]."</p>\n";
echo "<p>Provincia: ".$_POST["provincia"]."</p>\n";
echo "<p>Calle: ".$_POST["calle"]."</p>\n";
echo "<p>Correo electrónico: ".$_POST["email"]."</p>\n";
echo "<p>Estado civil: ".$_POST["estado_civil"]."</p>\n";
echo "<p>Nacionalidad: ".$_POST["nacionalidad"]."</p>\n";
echo "<p>Algo sobre el estudiante: ".$_POST["descripcion"]."</p>\n";

//Recuerda que tienes que crear una carpeta "archivos" y darle privilegios 777 ==> chmod 777 y el chown root:root
// Esta es la parte de subir archivo
echo "<h1>Imagen</h1>";
$directorioSubida = "archivos/";
if(isset($_FILES["archivo"])){
    $nombre = $_FILES["archivo"]["name"];
    $size = $_FILES["archivo"]["size"];
    $direTemp = $_FILES["archivo"]["tmp_name"];
    $tipoArch = $_FILES["archivo"]["type"];


    $arrayarchivo = pathinfo($nombre);
    $extension = $arrayarchivo["extension"];

    $nombre = $arrayarchivo["filename"];
    $nombreCom = $directorioSubida.$nombre.".".$extension;


    $arrayTipos = ['image/jpeg','image/png'];
    $tamanio = 1024 * 1024;


    if (!in_array($tipoArch,$arrayTipos)){
        echo "<h1>Tipo de archivo no valido.</h1>";
    }elseif ($size > $tamanio){
        echo "<h1>Tamaño maximo superado</h1>";
    }else{
    move_uploaded_file($direTemp,$nombreCom);
    echo "<img src='".$nombreCom."'></img>";
    }




} else {
        echo "<h1>Ha habido un error al cargar el archivo.</h1>";
}



?>