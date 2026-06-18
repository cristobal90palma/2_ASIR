<?php

$nombre = $_POST['nombre'];
$matricula = strtoupper($_POST['matricula']);
$bastidor = strtoupper($_POST['bastidor']);
$fecha = $_POST['fecha'];
session_start();
#obligar al login, aunque ns si de esta forma seria un problema de seguridad??, ya que le da tiempo a cargar la pagina aunque al usuario no lo vea? o se para justo en esta linea? 
if( (isset($_SESSION['usuario']) && $_SESSION['usuario']!="") == false){
    header("Location: index.php");
}






function fValidaNombre($nombre){
    if (empty($nombre) || $nombre==""){
        return "El campo nombre no puede estar vacio.";
    }elseif(strlen($nombre) > 50){
        return "El nombre no puede tener mas de 50 caracteres";
    }else{
        setcookie("nombre",$nombre, time()+12000, "/");
        return "";
    }
}

function fValidaMatricula($matricula){
    if (empty($matricula) || $matricula==""){
        return "El campo matricula no puede estar vacio.";
    }elseif(preg_match('/^(([0-9]{4}\s?[B-DF-HJ-NP-TV-Z]{3})|([A-Z]{1,2}\s?[0-9]{4}\s?[A-Z]{1,2}))$/i',$matricula)==false){
        return "La matricula no es valida";
    }else{
        setcookie("matricula",$matricula, time()+12000, "/");
        return "";
    }

}



function fValidaFecha($fecha){
    $hoy = strtotime(date("Y-m-d"));
    $fechaInput = strtotime($fecha);
    if (empty($fecha) || $fecha==""){
        return "El campo fecha no puede estar vacio.";
    }elseif(preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[01])$/',$fecha)==false){
        return "La fecha no es valida.";
    }elseif($fechaInput > $hoy ){
        return "La fecha de matriculacion no puede estar en el futuro"; # esto no lo consigui hacer funcionar
    }else{
        setcookie("fecha",$fecha, time()+12000, "/");
        return "";
    }
}

function fValidaBastidor($bastidor){
    if (empty($bastidor) || $bastidor==""){
        return "El campo bastidor no puede estar vacio.";
    }elseif(strlen($bastidor) != 17){
        return "El número de bastidor debe tener 17 caracteres";
    }elseif(preg_match('/^[A-HJ-NPR-Z0-9]{13}[0-9]{4}$/i',$bastidor)==false){
        return "El bastidor es incorrecto";
    }else{
        setcookie("bastidor",$bastidor, time()+12000, "/");
        return "";
    }
}



function fValidaITV($nombre,$matricula,$bastidor,$fecha){
    $errorNombre = fValidaNombre($nombre);
    $errorMatricula = fValidaMatricula($matricula);
    $errorBastidor = fValidaBastidor($bastidor);
    $errorFecha = fValidaFecha($fecha);

    if ( $errorNombre=="" && $errorMatricula=="" && $errorBastidor=="" && $errorFecha=="" ){
       echo "<p>No hay errores.</p>";
    }else{
        echo "<p>Errores encontrados:</p>";
        echo "<ul>";
        if ($errorNombre!="") {
            echo "<li>".$errorNombre."</li>";
        }
        if ($errorMatricula!="") {
            echo "<li>".$errorMatricula."</li>";
        }
        if ($errorBastidor!="") {
            echo "<li>".$errorBastidor."</li>";
        }
        if ($errorFecha!="") {
            echo "<li>".$errorFecha."</li>";
        }
        echo "</ul>";
    }


}


#aqui le doy prioridad a las cookies si, si ya tiene valores lo usa primero a los del post

if ( isset( $_COOKIE['nombre'] ) && isset( $_COOKIE['matricula'] ) && isset( $_COOKIE['bastidor'] ) && isset( $_COOKIE['fecha'] )){
    fValidaITV( $_COOKIE['nombre'],$_COOKIE['matricula'],$_COOKIE['bastidor'],$_COOKIE['fecha'] );
}else{
    fValidaITV($nombre,$matricula,$bastidor,$fecha);

}











?>