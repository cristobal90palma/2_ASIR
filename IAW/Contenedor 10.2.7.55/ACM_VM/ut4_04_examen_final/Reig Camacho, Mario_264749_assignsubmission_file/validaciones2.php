<?php
$array_errores = [
    "regla1" => "El campo nombre debe estar relleno.",
    "regla2" => "El campo nombre debe tener entre 1 y 50 caracteres.",
    "regla3" => "El campo cif debe estar relleno.",
    "regla4" => "El campo cif debe tener el formato correcto.",
    "regla5" => "El campo IPV4Publica debe estar relleno.",
    "regla6" => "El campo IPV4Publica debe tener un formato correcto y no ser ninguna entre 10.0.0.0/8, 172.16.0.0/12 ni 192.168.0.0/16.",
    "regla7" => "El campo IPV6Global debe estar relleno.",
    "regla8" => "El campo IPV6Global debe tener un formato correcto.",
    "regla9" => "El formato del FecharenovacionIPV4 debe estar rellena.",
    "regla10" => "El formato del FecharenovacionIPV6 debe estar rellena.",
    "regla11" => "Debe ser una fecha correcta.",

];
function fValidaNombre($nombre) {
    $plantilla = "/^[a-zA-Z\s]{1,50}$/";
    if (empty($nombre)) return "regla1";
    if (!preg_match($plantilla, $nombre)) return "regla2";
    return null;
}

function fValidacif($cif) {
    $plantilla = "/^[A-Z]{1} [0-9] {7} ([0-9] | [A-Z]) {1}$/";
    if (empty($cif)) return "regla3";
    if (!preg_match($plantilla, $cif)) return "regla4";
    return null;
}

function fValidaIPV4Publica($IPV4Publica) {
    if (empty($IPV4Publica)) return "regla5";
    if (filter_var($IPV4Publica)) return "regla6";
    //if (FILTER_VALIDATE_IP($IPV4Publica = "10.0.0.0/8,172.16.0.0/12,192.168.0.0/16"))  return "regla6";
    //if (FILTER_FLAG_IPV4($IPV4Publica)) return "regla6";
    return null;
}

function fValidaIPV6Global($IPV6Global) {
    $plantilla = "/^([0-9] | [A-Z]) {4}) ([0-9] | [A-Z]) {4}) ([0-9] | [A-Z]) {4}) ([0-9] | [A-Z]) {4}) ([0-9] | [A-Z]) {4}) ([0-9] | [A-Z]) {4}) ([0-9] | [A-Z]) {4}) ([0-9] | [A-Z]) {4})$/";
    if (empty($IPV6Global)) return "regla5";
    if (!preg_match($plantilla, $IPV6Global)) return "regla6";
    return null;
}

function fValidFecharenovacionIPV4($FecharenovacionIPV4) {
    if (empty($FecharenovacionIPV4)) return "regla7";
    $plantilla = "/^[0-9]{1}[0-9]{1}-[0-3]{1} [0-9]{1}-[0-9999]{4}$/";
    if (!preg_match($plantilla, $FecharenovacionIPV4)) return "regla8";
    return null;
}
function fValidFecharenovacionIPV6($FecharenovacionIPV6) {
    if (empty($FecharenovacionIPV6)) return "regla7";
    $plantilla = "/^[0-9]{1}[0-9]{1}-[0-3]{1} [0-9]{1}-[0-9999]{4}$/";
    if (!preg_match($plantilla, $FecharenovacionIPV6)) return "regla8";
    return null;
}

function fValidaFormulario($nombre, $cif, $IPV4Publica, $IPV6Global,$FecharenovacionIPV4,$FecharenovacionIPV6) {
    global $array_errores;
    $errores_detectados = [];

    
    $e1 = fValidaNombre($nombre);
    if ($e1) $errores_detectados[] = $array_errores[$e1];

    $e2 = fValidacif($cif);
    if ($e2) $errores_detectados[] = $array_errores[$e2];

    $e3 = fValidaIPV4Publica($IPV4Publica);
    if ($e3) $errores_detectados[] = $array_errores[$e3];

    $e4 = fValidaIPV6Global($IPV6Global);
    if ($e4) $errores_detectados[] = $array_errores[$e4];

    $e5 = fValidFecharenovacionIPV4($FecharenovacionIPV4);
    if ($e5) $errores_detectados[] = $array_errores[$e5];

    $e6 = fValidFecharenovacionIPV6($FecharenovacionIPV6);
    if ($e6) $errores_detectados[] = $array_errores[$e6];

    if (count($errores_detectados) > 0) {
        $resultado = "Han ocurrido los siguientes errores:<br>";
        foreach ($errores_detectados as $error) {
            $resultado .= "- " . $error . "<br>";
        }
        return $resultado;
    } else {
        return "¡Formulario validado y enviado con éxito!";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>¡Formulario validado y enviado con éxito!</title></head>
<body> <form method="post" action="areapersonal.php">
        <li><a href="areapersonal.php">Pagina de resultados</a></li> 
</body>
</html>