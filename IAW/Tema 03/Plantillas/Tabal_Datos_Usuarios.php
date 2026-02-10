<html>
<head>
    <title>Ejercicio 42</title>
    <style>
        
    </style>
</head>
<body>
<?php

    $datos=array("75888888W" => array("Víctor", "García", "959471852"),
                 "77777777A" => array("Pepe", "García", "95997185"),
                 "11122233R" => array("Rubén", "Domínguez", "666777555"));

    echo "<table border=1>";
    echo "<tr>";
    echo "<td><b>NIF</b></td>";
    echo "<td colspan=2><b>Clientes</b></td>";
    echo "</tr>";
    foreach($datos as $nif => $cliente) {
        echo "<tr>";
        echo "<td rowspan=3>".$nif."</td>";
        echo "<td><b>Nombre</b></td>";
        echo "<td>".$cliente[0]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><b>Apellidos</b></td>";
        echo "<td>".$cliente[1]."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><b>Teléfono</b></td>";
        echo "<td>".$cliente[2]."</td>";
        echo "</tr>";

    }
    echo "</table>";

?>
</body>
</html>