<?php

    $nombre = $_POST["nombre"];
    $pass = $_POST["pass"];
    $nombre_ok = "admin";
    $pass_ok = "123456";

    session_start();
    
    if ($nombre!=null and $pass!=null and $nombre==$nombre_ok and $pass==$pass_ok){
        setcookie('error', null, time() + 365 * 24 * 60 * 60);
        setcookie('nombre', $nombre, time() + 365 * 24 * 60 * 60); 
        header("Location: restringida.php"); 
        //echo "<p><a href='restringida.php'>Acceso a página restringida</a></p>";
    } elseif ($_COOKIE["nombre"]!=null and $_COOKIE["nombre"]!=""){
        setcookie('error', null, time() + 365 * 24 * 60 * 60);
        setcookie('nombre', $nombre, time() + 365 * 24 * 60 * 60);
        header("Location: restringida.php"); 
        //echo "<p><a href='restringida.php'>Acceso a página restringida</a></p>"; 
    } else {
        setcookie('error', "Debe introducir los datos correctamente", time() + 365 * 24 * 60 * 60);
        setcookie('nombre', null, time() + 365 * 24 * 60 * 60);
        header("Location: login.php");
        //echo "<p style='color: red;'>$_SESSION[error]</p>"; 
        //echo "<p><a href='login.php'>Acceso a login</a></p>";
    }

?>