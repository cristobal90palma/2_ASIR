<?php
//

// Datos simulados (en un proyecto real vendrían de BBDD)
$nombrecorrecto = "cristobal";
$passwordCorrecta = password_hash("suarez", PASSWORD_BCRYPT);


$nombre = $_POST['nombre'];
$password = $_POST['password'];


session_start();

// Si sale bien, va a "datos_cliente.php", si sale mal, empieza de nuevo en "login.php"
if (isset($nombre) && $nombre!="" && isset($password) && $password!=""){
    if ($nombre==$nombre && password_verify($password,$passwordCorrecta)){
        $_SESSION['usuario'] = $_POST['nombre'];
        $_SESSION['error'] = False;
        header("Location: index_01.php");
    }else{
        $_SESSION['usuario'] = "";
        $_SESSION['error'] = True;
        header("Location: login.php");

    }

}else{
    $_SESSION['usuario'] = "";
    $_SESSION['error'] = True;
    header("Location: login.php");
}

?>
