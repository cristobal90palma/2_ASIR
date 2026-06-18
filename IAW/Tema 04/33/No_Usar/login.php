<?php

$usuario = strtoupper($_POST['dni']);
$password = $_POST['password'];


#como no se especifica bien lo del login, simulo que estos son los datos en una base de datos, ya que si no
#al validar el login no tengo con que probar las creds que recibo
#lo demas es practicamente copiado de los ejercicios anteriores

$usuario_db = "12312312K";
$password_db = password_hash("Usuario.25", PASSWORD_BCRYPT);

session_start();

if (isset($usuario) && $usuario!="" && isset($password) && $password!=""){
    if ($usuario==$usuario_db && password_verify($password,$password_db)){
        $_SESSION['usuario'] = $_POST['dni'];
        $_SESSION['error'] = False;
        header("Location: formulario.php");
    }else{
        $_SESSION['usuario'] = "";
        $_SESSION['error'] = True;
        header("Location: index.php");

    }

}else{
    $_SESSION['usuario'] = "";
    $_SESSION['error'] = True;
    header("Location: index.php");
}

?>