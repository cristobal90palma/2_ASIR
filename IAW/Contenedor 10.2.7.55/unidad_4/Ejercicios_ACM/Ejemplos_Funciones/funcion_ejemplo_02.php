<?php
// Si no se envía el país, por defecto será "España"
function registrarInvitado($nombre, $pais = "España") {
    echo "Invitado: $nombre | Origen: $pais<br>";
}

$amigo1 = "Carlos";
$paisAmigo1 = "México";

$amigo2 = "Elena"; // No tenemos su país

registrarInvitado($amigo1, $paisAmigo1); // Imprime México
registrarInvitado($amigo2);               // Imprime España (valor por defecto)
?>