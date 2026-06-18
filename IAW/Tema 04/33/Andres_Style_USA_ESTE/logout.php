<?php
session_start();

// Vaciamos la sesión
session_unset();

// Destruimos la sesión
session_destroy();

// Eliminamos también las cookies
setcookie("nombre_cliente", "", time() - 3600);
setcookie("matricula_cliente", "", time() - 3600);


// Redirigimos al login
header("Location: login.php");
exit;
?>