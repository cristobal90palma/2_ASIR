<?php

    function validaNombre($n){
        if ($n==null || $n=="") {
            return "El nombre es obligatorio.";
        } elseif(strlen($n)>30) {
            return "El nombre no puede tener más de 30 caracteres.";
        } else {
            return "";
        }
    }

    function validaApellidos($a){
        if ($a==null || $a=="") {
            return "Los apellidos son obligatorios.";
        } elseif(strlen($a)>50) {
            return "Los apellidos no pueden tener más de 50 caracteres.";
        } else {
            return "";
        }
    }

    function validaDNI($dni){
        if ($dni==null || $dni=="") {
            return "El DNI es obligatorio.";
        } elseif(preg_match('/^[0-9]{8}[A-Z]$/', $dni)==false) {
            return "El DNI tiene que estar formado por 8 dígitos y una letra mayúscula.";
        } else {
            return "";
        }
    }

    function validaDireccion($dir){
        if ($dir==null || $dir=="") {
            return "La dirección es obligatoria.";
        } elseif(strlen($dir)>100) {
            return "La dirección no pueden tener más de 100 caracteres.";
        } else {
            return "";
        }
    }

    function validaTelefono($tel){
        if ($tel==null || $tel=="") {
            return "El teléfono es obligatorio.";
        } elseif(preg_match('/^[0-9]{9}$/', $tel)==false) {
            return "El teléfono tiene que estar formado por 9 dígitos.";
        } else {
            return "";
        }
    }

    $erroresNom = validaNombre($_POST['nombre']);
    $erroresApe = validaApellidos($_POST['apellidos']);
    $erroresDNI = validaDNI($_POST['dni']);
    $erroresDir = validaDireccion($_POST['direccion']);
    $erroresTel = validaTelefono($_POST['telefono']);

    

    if ($erroresNom=="" && $erroresApe=="" && $erroresDNI=="" && 
        $erroresDir=="" && $erroresTel=="") {
        echo "No hay errores.";
    } else {
        echo "<p>Errores encontrados:</p>";
        echo "<ul>";
        if ($erroresNom!="") {
            echo "<li>".$erroresNom."</li>";
        }
        if ($erroresApe!="") {
            echo "<li>".$erroresApe."</li>";    
        }
        if ($erroresDNI!="") {
            echo "<li>".$erroresDNI."</li>";    
        }
        if ($erroresDir!="") {
            echo "<li>".$erroresDir."</li>";    
        }
        if ($erroresTel!="") {
            echo "<li>".$erroresTel."</li>";    
        }
        echo "</ul>";
    }


?>