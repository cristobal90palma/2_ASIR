<?php
//validaciones del formulario del apartado "b".
$ERRORES = array(
    "EMPRESA_VACIA" => "El nombre de la empresa no puede estar vacío.",
    "EMPRESA_INVALIDA" => "El nombre de la empresa no es válido (MAXIMO 50 CARACTERES).",

    "CIF_FORMATO" => "El CIF no tiene un formato válido.",
    "IP4_INVALIDA" => "La dirección IP versión 4 no es válida.",
    "IP6_INVALIDA" => "La dirección IP versión 6 no es válida.",
    "FECHA4_INVALIDA" => "La fecha de renovación IPv4 no es válida.",
    "FECHA6_INVALIDA" => "La fecha de renovación IPv6 no es válida."
);

function fValidaEmpresa($empresa){
    if ($empresa == "") { return "EMPRESA_VACIA"; }
    if (strlen($empresa) > 50) { return "EMPRESA_INVALIDA"; }
    return "";
}
//Patron de formato valido para el cif /^[A-Z]{1}[0-9]{7}([0-9]|[A-Z]){1}$/
function fValidaCIF($cif){
    if (!preg_match("/^[A-Z]{1}[0-9]{7}([0-9]|[A-Z]){1}$/", strtoupper($cif))) {
        return "CIF_FORMATO";
    }
    return "";
}

//patron de formato valido para la ip version 4 filter_var($ip4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)
function fValidaIP4($ip4){
    if (!filter_var($ip4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        return "IP4_INVALIDA";
    }
    return "";
}

//patron de formato valido para la ip version 6 filter_var($ip6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)
function fValidaIP6($ip6){  
    if (!filter_var($ip6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        return "IP6_INVALIDA";
    }
    return "";
}

//patron para ver si una ipv4 es correcta y publica filter_var($ip4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE)
function fValidaIP4Publica($ip4){
    if (!filter_var($ip4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE)) {
        return "IP4_INVALIDA";
    }
    return "";
}

//patron para comprobar si una fecha es dada correctamente por dia, mes año checkdate ($mes, $dia, $año).
function fValidaFecha($fecha){
    $fecha = explode("-", $fecha);
    if (count($fecha) != 3) {
        return "FECHA_INVALIDA";
    }
    list($dia, $mes, $año) = $fecha;
    if (!checkdate($mes, $dia, $año)) {
        return "FECHA_INVALIDA";
    }
    return "";
}

function fValidaFormulario($empresa, $cif, $ip4, $ip6, $fecha4, $fecha6){
    global $ERRORES;

    $erroresEncontrados = "";

    $e1 = fValidaEmpresa($empresa);
    if ($e1 != "") { $erroresEncontrados .= "<li>".$ERRORES[$e1]."</li>"; }

    $e2 = fValidaCIF($cif);
    if ($e2 != "") { $erroresEncontrados .= "<li>".$ERRORES[$e2]."</li>"; }

    $e3 = fValidaIP4Publica($ip4);
    if ($e3 != "") { $erroresEncontrados .= "<li>".$ERRORES[$e3]."</li>"; }

    $e4 = fValidaIP6($ip6);
    if ($e4 != "") { $erroresEncontrados .= "<li>".$ERRORES[$e4]."</li>"; }

    $e5 = fValidaFecha($fecha4);
    if ($e5 != "") { $erroresEncontrados .= "<li>".$ERRORES[$e5]."</li>"; }

    $e6 = fValidaFecha($fecha6);
    if ($e6 != "") { $erroresEncontrados .= "<li>".$ERRORES[$e6]."</li>"; }

    return $erroresEncontrados;
}


?>