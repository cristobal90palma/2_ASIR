<?php

print_r($POST);

if(!isset($_POST['nombre']) or empty($_POST['nombre'])) {
    echo "ERROR - Debe rellenar el nombre.</br>";
} elseif(!isset($_POST['email']) or empty($_POST['email'])) {
}    else {
        echo "Mi nombre es ".$_POST['nombre']."</br>";
        echo "Mi email es ".$_POST['email']."</br>";
    }



$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if ($pass1!=$pass2) {
    echo "ERROR - LAS CONTRASEÑAS NO COINCIDEN.</br>";
} else {
    echo "Correcto. Las contraseñas coinciden.</br>";
}

?>