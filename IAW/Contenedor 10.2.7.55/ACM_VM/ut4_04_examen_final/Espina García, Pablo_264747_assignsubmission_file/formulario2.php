<?php

function validaNombre($n){
    if($n == null || $n== ""){
        return "El nombre es obligatorio.";
    }elseif(strlen($n)>50) {
        return "El nombre debe de tener máximo 50 caracteres.";
    } else {
        return "";
    }
}

function validaCIF($C){
        if ($C==null || $C=="") {
            return "El CIF es totalmente obligatorio";
        } elseif(!preg_match('/^[A-Z]{1}[0-9]{7}([0-9] | [A-Z]{1}$/' , $C)) {
            return "El CIF itroducido no es válido, por favor , revise el campo e inténtelo de nuevo";
        } else {
            return "";
        }
    }

    function validaIPV4formato($ip){
        if ($ip==null || $ip== "") {
            return "La IPv4 es totalmente obligatoria";
        } elseif(!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
          return "La ip de be de ser válida y no puede ser privada";
        } else {
            return "";
        }
    }

    function validaIPV6formato($ip6){
        if ($ip6==null || $ip6=="") {
            return "La IPv6 el obligatoria";
        } elseif(!filter_var($ip6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return "La IPv6 debe de ser válida";
        } else {
            return "";
        }
    }

function validaIPV4($ip4){
        if ($ip4==null || $ip4== "") {
            return "La IPv4 es totalmente obligatoria";
        } elseif(!filter_var($ip4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE)) {
          return "La ip de be de ser válida y no puede ser privada";
        } else {
            return "";
        }
    }
function fechaIpv4($IPv4){
        if($IPv4==null || $IPv4=="") {
            return "La Fecha es obligatoria";
        } elseif (!checkdate($mes, $dia, $año )) {
            return "La fecha debe de ser (mes, dia, año)";
        } else {
           return "";   
        }
}
function fechaIpv6($IPv6){
        if($IPv6==null || $IPv6=="") {
            return "La Fecha es obligatoria";
        } elseif (!checkdate($mes, $dia, $año )) {
            return "La fecha debe de ser (mes, dia, año)";
        } else {
           return "";   
        }
}

function Resultado($n, $C, $ip, $ip6, $ip4, $IPv4, $IPv6){
    $ErrorNombre = validaNombre($_POST["nombre"]);
    $ErrorCIF = validaCIF($_POST["CIF"]);
    $Errorip = validaIPV4formato($_POST["IPv4"]);
    $Errorip6 = validaIPV6formato($_POST["IPv6"]);
    $Errorip4 = validaIPV4($_POST["IPv4"]);
    $ErrorIPv4 = fechaIpv4($_POST["fecha"]);
    $ErrorIPv6 = fechaIPv6($_POST["fecha"]);
}
if($ErrorNombre=="" && $ErrorCIF=="" && $Errorip=="" && $Errorip6=="" && $Errorip4=="" && $ErrorIPv4=="" && $ErrorIPv6==""){
    echo "No hay erorres:";
  }else{
    echo "Errores:<br>";
    if($ErrorNombre!==""){
        echo "$ErrorNombre<br>";
    }
    if($ErrorCIF!==""){
        echo "$errorBastidor<br>";
    }
    if($Errorip!==""){
        echo "$Errorip<br>";
    }
    if($$Errorip6!==""){
        echo "$Errorip6<br>";
    }
    if($$Errorip4!==""){
        echo "$Errorip4<br>";
    }
    if($$Errorip6!==""){
        echo "$Errorip6<br>";
    }
    if($$ErrorIPv4!==""){
        echo "$ErrorIPv4<br>";
    }
    if($$ErrorIPv6!==""){
        echo "$ErrorIPv6<br>";
    }
  }
?>