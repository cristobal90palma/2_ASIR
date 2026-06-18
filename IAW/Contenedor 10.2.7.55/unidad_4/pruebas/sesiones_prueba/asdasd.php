<?php
session_start();

// ELIMINA solo la variable 'nombre'
unset($_SESSION["nombre"]); 

// La variable 'nombre' ya no existe en este punto.

if (isset($_SESSION["nombre"]) && $_SESSION["nombre"]!="") {
    print "<p>El nombre es $_SESSION[nombre] </p>";
} else {
    echo "Has cerrado la sesión.\n";
}
?>