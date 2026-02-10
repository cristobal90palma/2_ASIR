<?php

$datos = array ("11111111A" => array ("José", "Martínez", "959471850"),
                "22222222B" => array ("Luis", "Cojoncio", "959405824"),
                "33333333B" => array ("Miguel", "Tozudo", "959568941"),
);


echo "<table border='1'>";
echo "<tr>";
echo "<td><b>NIF</b></td>";
echo "<td colspan='2'><b>Clientes</b></td>";
echo "</tr>";

foreach($datos as $nif => $cliente) {
    echo "<tr>";
    echo "<td rowspan='3'>".$nif."</td>";
    echo "<td><b>Nombre</b></td>";
    echo "<td>"$cliente[0]"</td>";
    echo "</tr>";
}

echo "</table>";


?>