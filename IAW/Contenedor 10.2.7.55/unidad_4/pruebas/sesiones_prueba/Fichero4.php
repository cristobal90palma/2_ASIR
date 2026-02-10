<?php
session_start();
//unset($_SESSION["nombre"]);
session_unset(); // Removes all session variables (e.g., $_SESSION['nombre'], $_SESSION['id'], etc.)

/*
session_destroy();

$_SESSION = array(); //Usalo cuando vayas a usar session_destroy(); porque si no se pillan los datos
de sesión de la RAM, donde aún existe. Con este se limpia con datos en blanco. 
*/

if (isset($_SESSION["nombre"]) && $_SESSION["nombre"]!="") {
    print "<p>El nombre es $_SESSION[nombre] </p>";
} else {
    echo "Has cerrado la sesión.\n";
}


?>
