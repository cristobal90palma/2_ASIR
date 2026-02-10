<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario</title>
</head>
<body>

<?php
require_once "validar.php";

if (fValidaSesion() == 1) {
    echo "<h2>Formulario</h2>";
    echo "<p><a href='logout.php'>Cerrar Sesión</a></p>";
} else {
    header("Location: login.php");
    exit();
}
?>
<form method="post">
        <label>Nombre de la empresa </label><input type="text" name="nombre"><br/>
        <label>CIF de la empresa </label><input type="text" name="cif"><br/>
        <label>IP pública </label><input type="number" name="ipp"><br/>
        <label>IP global </label><input type="number" name="ipg"><br/>
        <label>Fecha de renovacion IPv4 </label><input type="date" name="fecha4"><br/>
        <label>Fecha de renovacion IPv6 </label><input type="date" name="fecha6"><br/>
        <br/><br/>
        <input type="submit" name="Enviar">
    </form>
</body>
</html>

