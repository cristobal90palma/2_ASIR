<html>
<head>
    <title>Ejercicio 41</title>
    <style>
        
    </style>
</head>
<body>
<?php

    $componentes = array("micro.jpg" => "10 núcleos 20 hilos a 5Ghz todos los núcleos",
    "grafica.jpg" => "24GB/GDDR6X", 
    "ram.jpg" => "16GB DDR4 A 4266MHz", 
    "discoduro.jpg" => "Mejor disco duro para gaming");

    echo "<table border='1'>";

    foreach($componentes as $fichero => $descripcion) {

        echo "<tr>";
        echo "<td><img src='ejer41_img/".$fichero."' width=80px;/></td>";
        echo "<td>".$descripcion."</td>";
        echo "</tr>";

    }

    echo "</table>";
?>
</body>
</html>