<?php

print_r($POST);

echo "Mi nombre es ".$POST['nombre']."</br>";
echo "Mi email es ".$POST['email']."</br>";
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if ($pass1!=$pass2) {
    echo "ERROR - LAS CONTRASEÑAS NO COINCIDEN.</br>";
} else {
    echo "Correcto. Las contraseñas coinciden.</br>";
}

?>