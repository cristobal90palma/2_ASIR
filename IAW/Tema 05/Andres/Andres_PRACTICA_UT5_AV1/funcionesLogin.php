<?php
include_once "bbdd.php";
include_once "funcionesApp.php";
session_start();

#funcion que registra al usuario
function registroUsuario($usuario,$password,$password2){
    try{
        global $server, $user, $passwd, $db;

        $conn = mysqli_connect($server,$user,$passwd,$db);
        
    
        #anti sql injection
        $usuario = mysqli_real_escape_string($conn,$usuario);
        $password = mysqli_real_escape_string($conn,$password);
        $password2 = mysqli_real_escape_string($conn,$password2);

        $hash = password_hash($password, PASSWORD_BCRYPT);
    

        $consultaUser = "SELECT * FROM usuario WHERE username='".$usuario."'";
        $crearUser = "INSERT INTO usuario (username,password) VALUES ('".$usuario."','".$hash."')";


    
        if (!isset($usuario) || !isset($password) || !isset($password2)  || $usuario == "" || $password == "" || $password2 == "" ){
            $_SESSION['error'] = 1; #faltan datos
            header("Location: signin.php");
            return;
        }elseif(strlen($usuario) > 20){
            $_SESSION['error'] = 9; #usuario demasiado largo
            header("Location: signin.php");
            return;

        }elseif ( $password != $password2 ){
            $_SESSION['error'] = 2; #las contraseñas no coinciden
            header("Location: signin.php");
            return;
        
        }elseif(mysqli_num_rows(mysqli_query($conn,$consultaUser))>0){
            $_SESSION['error'] = 3; #usuario ya existe
            header("Location: signin.php");
            return;
        }else{

            if (mysqli_query($conn,$crearUser)){
                $_SESSION['error'] = 6;
                header("Location: login.php");
                return;
            }else{
                $_SESSION['error'] = 4; #error
                header("Location: signin.php");
                return;
            }
       
    }
    }catch(Exception $e){
        echo obtenerError(99);
        echo "<b><p>".$e->getMessage()."</p></b>";
    }
}
#funcion para hacer el login
function login($usuario,$password){
    try{
        global $server, $user, $passwd, $db;
        $conn = mysqli_connect($server,$user,$passwd,$db);

        $usuario = mysqli_real_escape_string($conn,$usuario);
        $password = mysqli_real_escape_string($conn,$password);
    
      
        $consulta = "SELECT * FROM usuario WHERE username='".$usuario."'";
        $resultado = mysqli_query($conn,$consulta);
    
        if (!isset($usuario) || !isset($password) || $usuario == "" || $password == ""){
            $_SESSION['error'] = 1; #faltan datos
            header("Location: login.php");
            return;
        }elseif(mysqli_num_rows($resultado)==1){ #comprueba que el usuario exista
            $userDB = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
            $hash = $userDB['password'];
            if (password_verify($password,$hash)){
                $_SESSION['user'] = $userDB['username'];
                $_SESSION['sesion_id'] = session_id();
                #$_SESSION['error']  = 5; #user/pass incorrectos
                header("Location: pedidos.php");
            }else{
                unset($_SESSION['user']);
                unset($_SESSION['sesion_id']);
                $_SESSION['error']  = 5; #user/pass incorrectos
                header("Location: login.php");

            }

        }else{
            $_SESSION['error'] = 5; #user/pass incorrectos
            header("Location: login.php");
            return;

        }
            
        

    }catch(Exception $e){
        echo obtenerError(99);
        echo "<b><p>".$e->getMessage()."</p><b>";
    }

}
#comprueba la sesion, y devuelve al login si no tiene
function compruebaSesion(){
    if (empty($_SESSION['user'])) {
        header("Location: login.php");
        exit(); 
    }
}
#cierra laa sesion
function cerrarSesion(){
    try{
        if (!isset($_SESSION['user']) || $_SESSION['user'] == "" || !isset($_SESSION['sesion_id']) || $_SESSION['sesion_id'] == ""){
            header("Location: login.php");
        }else{
            session_unset();
            session_destroy();
            header("Location: login.php");
        }
    }catch(Exception $e){
        echo obtenerError(99);
        echo "<b><p>".$e->getMessage()."</p><b>";
    }

}

#wip
function cambiarPassword($usuario,$oldPassword,$newPassword,$newPassword2){

}


?>