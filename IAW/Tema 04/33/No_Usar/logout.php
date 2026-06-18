<?php

session_start();
unset($_SESSION['usuario']);
unset($_SESSION['error']);


#aprovecho tambien y borro las cookies aunque ahi diga que es solo la sesion

unset($_COOKIE['nombre']);
setcookie('nombre',"",time()-3600,"/");
unset($_COOKIE['matricula']);
setcookie('matricula',"",time()-3600,"/");
unset($_COOKIE['bastidor']);
setcookie('bastidor',"",time()-3600,"/");
unset($_COOKIE['fecha']);
setcookie('fecha',"",time()-3600,"/");

header("Location: index.php");

?>