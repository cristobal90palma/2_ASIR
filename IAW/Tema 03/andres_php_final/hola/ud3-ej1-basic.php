<?php

$puestos = [
    "programador_jr" => "Programador Junior",
    "programador_sr" => "Programador Senior",
    "analista" => "Analista de sistemas",
    "disenador" => "Diseñador web",
    "sysadmin" => "Administrador de sistemas"
];


echo "<h1>Información del puesto</h1>";
echo "<p>Puesto: ".$puestos[$_POST["puesto"]]."</p>\n";
echo "<p>Fecha: ".$_POST["fecha_solicitud"]."</p>\n";
echo "<br>";
echo "<h1>Datos personales</h1>";
echo "Nombre: ".$_POST["nombre"]."</p>\n";
echo "Apellidos: ".$_POST["apellidos"]."</p>\n";
echo "Edad: ".$_POST["edad"]."</p>\n";
echo "Fecha de nacimiento: ".$_POST["fecha_nacimiento"]."</p>\n";
echo "Nacionalidad: ".$_POST["nacionalidad"]."</p>\n";
echo "Telefono: ".$_POST["telefono"]."</p>\n";
echo "Genero: ".$_POST["genero"]."</p>\n";
echo "Calle: ".$_POST["calle"]."</p>\n";
echo "Municipio: ".$_POST["municipio"]."</p>\n";
echo "Provincia: ".$_POST["provincia"]."</p>\n";
echo "Correo: ".$_POST["correo"]."</p>\n";
echo "Estado civil: ".$_POST["estado_civil"]."</p>\n";
echo "Sobre mi: ".$_POST["sobre_mi"]."</p>\n";


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





}else{
        echo "<h1>algo muy malo pasó y no se el que, adios.</h1>";
}

?>