<?php
//Pagína del formulario con las validaciones necesarias del apartado "a".

$ERRORES = array(
    "CORREO_VACIO" => "El correo no puede estar vacío.",
    "CORREO_INVALIDO" => "El correo no es válido.",
    "CONTRASENA_VACIA" => "La contraseña no puede estar vacía.",
    "CONTRASENA_CORTA" => "La contraseña debe tener al menos 9 caracteres."
);
function fValidaCorreo($correo){
    if ($correo == "") { return "CORREO_VACIO";}
    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $correo)) {
        return "CORREO_INVALIDO";
    }
    return "";
}
function fValidaContrasena($contrasena){
    if ($contrasena == "") { return "CONTRASENA_VACIA";}
    $contraseña = strtoupper($contraseña);

        if (!preg_match("/^[0-9]{8}[A-Z]$/", $contraseña)) { return "DNI_FORMATO"; }

        $numero = substr($contraseña, 0, 8);
        $letra = substr($contraseña, 8, 1);

        $tabla = "TRWAGMYFPDXBNJZSQVHLCKE";
        $letraCorrecta = substr($tabla, ((int)$numero % 23), 1);

        if ($letra != $letraCorrecta) { return "DNI_LETRA"; }
        return "";
    }
    if (strlen($contrasena) < 8) { return "CONTRASENA_CORTA";}
    return "";
}

function fValidaFormulario($correo, $contrasena){
    global $ERRORES;

    $erroresEncontrados = "";

    $e1 = fValidaCorreo($correo);
    if ($e1 != "") { $erroresEncontrados .= "<li>".$ERRORES[$e1]."</li>"; }

    $e2 = fValidaContrasena($contrasena);
    if ($e2 != "") { $erroresEncontrados .= "<li>".$ERRORES[$e2]."</li>"; }

    return $erroresEncontrados;
}
?>
        