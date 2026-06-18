<?php



$nombre = $_POST['nombre'];
$cif = strtoupper($_POST['cif']);
$ip4 = $_POST['ip4'];
$ip6 = $_POST['ip6'];
$fecha4 = $_POST['reno4']; 
$fecha6 = $_POST['reno6']; 

session_start();




function fValidaNombre($nombre){
    if ($nombre == ""){
        return "ERROR: el nombre de la empresa está vacio";
    }elseif (strlen($nombre) > 50 ){
        return "ERROR: el nombre de la empresa debe ser de menos de 50 caracteres";
    }else{
        return "";
    }
}

function fValidaCIF($cif){
    if (!preg_match("/^[A-Z]{1}[0-9]{7}([0-9]|[A-Z]){1}$/",$cif)){
        setcookie("cif",$cif,time()+12000,"/");
        return "ERROR: El CIF no es válido";
        
    }else{
        return "";
    }
}


function fValidaIPv4($ip4){
    if (filter_var($ip4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) != ""){
        if (filter_var($ip4, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE) != ""){
            return "";
        }else{
            return "ERROR: La IP es privada";
        }
    }else{
        return "ERROR: El formato IPv4 no es valido o está vacio";
    }
}

function fValidaIPv6($ip6){
    if (filter_var($ip6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
        return "";
    }else{
        return "ERROR: El formato IPv6 no es valido o está vacío.";
    }
}


#LA FECHA NO ME LA COJE, BIEN, TIENE FORMATO AÑO,MES,DIA, PERO NO HE IDO CAPAZ DE SEPARAR EL INPUT DEL USUARIO PARA DARSELO EN EL FORMATO QUE QUIERE LA FUNCION ESA

function comprobarFecha($fecha){
    if (!checkdate($fecha)){
        return "ERROR: La fecha no es correcta";
    }else{
        return "";
    }
}








?>