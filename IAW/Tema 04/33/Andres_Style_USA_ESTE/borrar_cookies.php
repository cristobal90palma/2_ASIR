<?php
session_start();

/*
Borramos las cookies creadas en validaciones.php
Para borrarlas, se establece una fecha de expiración pasada
*/
    setcookie("nombre_cliente", "", time() - 3600);

    setcookie("matricula_cliente", "", time() - 3600);


// Redirigimos de nuevo al formulario ITV
header("Location: datos_cliente.php");
exit;
