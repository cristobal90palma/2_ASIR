<?php

/*
Crea un formulario con cinco campos (nombre, apellidos, Dni, direccion, telefono), que realiza la validacion de esos campos mediante un función diferente para cada uno de ellos)
Cada funcion debe devolver un mensaje de error (si lo hubiera) o la cadena vacia si no hay errores
1. Nombre: Obligatorio y tamaña 30 como maximo
2, Apellido obligatorio y tamañao 50 como maximo.
3. Dni Obligatorio y tamaño 9 
4. Direccion Obligatorio y tamañoo 100 como maixmo
5. Telefono Obligatorio y tamaño 9. Solo numeros


Debes usar return para pintar el resultado.


*/




function validaNombre($n){
    if($n==null || $n=="") {
        return "El nombre es obligatorio\n";
    } elseif (strlen($n)>30) {
        return "El nombre no puede tener más de 30 caracteres\n";
    } else {
        return "";
    }
}

function validaApellidos($a){
    if($a==null || $a=="") {
        return "Los apellidos son obligatorios\n";
    } elseif (strlen($a)>50) {
        return "Los apellidos no pueden tener más de 50 caracteres\n";
    } else {
        return "";
    }
}

/*
function validaDNI($dni){
    if($dni==null || $dni=="") {
        return "El DNI es obligatorio\n";
    } elseif (!preg_match('/^[0-9]{8}[A-Za-z]$/', $dni)) {
        return "El DNI debe tener 9 caracteres. 8 números y una letra. Ejemplo: 12345678A\n";
    } else {
        return "";
    }
}
/*

/* En este caso con un "false" para el "preg_match".
*/
function validaDNI($dni){
    if($dni==null || $dni=="") {
        return "El DNI es obligatorio\n";
    } elseif (preg_match('/^[0-9]{8}[A-Za-z]$/', $dni)==false) {
        return "El DNI debe tener 9 caracteres. 8 números y una letra. Ejemplo: 12345678A\n";
    } else {
        return "";
    }
}


function validaDireccion($dir){
    if($dir==null || $dir=="") {
        return "La dirección es obligatoria\n";
    } elseif (strlen($dir)>100) {
        return "La dirección debe usar 100 caracteres como máximo\n";
    } else {
        return "";
    }
}

function validaTelefono($tel){
    if($tel==null || $tel=="") {
        return "El teléfono es obligatorio\n";
    } elseif (!preg_match('/^[0-9]{9}$/', $tel)) {
        return "El teléfono debe tener exactamente 9 dígitos (numéros).\n";
    } else {
        return "";
    }
}


$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$dni = $_POST['dni'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

//Invocamos las funciones y su resultado (el del return) lo guardamos en una variable. Le estamos diciendo a la función que tome los valores del $_POST y haga su trabajo.
$erroresNom = validaNombre($_POST['nombre']); 
$erroresApe = validaApellidos($_POST['apellidos']); 
$erroresDNI = validaDNI($_POST['dni']); 
$erroresDirec = validaDireccion($_POST['direccion']); 
$erroresTelf = validaTelefono($_POST['telefono']); 



if ($erroresNom=="" && $erroresApe=="" && $erroresDNI=="" && $erroresDirec=="" && $erroresTelf=="") {
    echo "No hay errores<br>";
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
    if ($erroresDirec!="") {
        echo "<li>".$erroresDirec."</li>";
    }
    if ($erroresTelf!="") {
        echo "<li>".$erroresTelf."</li>";
    }
    echo "<ul>";
}

echo "<p>$nombre</p>";
echo "<p>$apellidos</p>";
echo "<p>$dni</p>";
echo "<p>$direccion</p>";
echo "<p>$telefono</p>";












?>