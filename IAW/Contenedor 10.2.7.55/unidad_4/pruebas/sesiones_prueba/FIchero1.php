<?php
session_start();
$_SESSION["nombre"] = "Víctor";
print "<p>El nombre es $_SESSION[nombre]</p>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="FIchero2.php">Al principio</a>
</body>
</html>