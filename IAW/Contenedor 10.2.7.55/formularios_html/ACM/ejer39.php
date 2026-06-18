<html>
<head>
    <title>Ejercicio 39</title>
    <style>
        .cabecera { background-color: red; }
        .pie { background-color: blue; }
    </style>
</head>
<body>
<?php

echo "<table border='1'>";
for ($f = 1; $f <= 6; $f++) {
    if ($f == 1) {
        echo "<tr class='cabecera'>";
    } elseif ($f == 6) {
        echo "<tr class='pie'>";
    } else {
        echo '<tr>';
    }

    for ($c = 1; $c <= 4; $c++) {
        if ($c == $f) {
            echo '<td><b>Fila ' . $f . ', Columna ' . $c . '</b></td>';
        } else {
            echo '<td>Fila ' . $f . ', Columna ' . $c . '</td>';
        }
    }
    echo '</tr>';
}
echo '</table>'

?>
</body>
</html>