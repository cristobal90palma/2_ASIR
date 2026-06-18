<?php
require_once "validaciones.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 32 - Tema 4</title>
</head>
<body>

<h1>Ejercicio 32 - Validación</h1>

<form action="" method="POST">

    <p>
        <label>Nombre:</label>
        <input type="text" name="nombre">
    </p>

    <p>
        <label>Apellidos:</label>
        <input type="text" name="apellido">
    </p>

    <p>
        <label>NIF:</label>
        <input type="text" name="nif">
    </p>

    <p>
        <label>Teléfono:</label>
        <input type="text" name="telefono">
    </p>

    <input type="submit" value="Enviar">

</form>

<?php
// El script SOLO recoge $_POST e invoca la función f)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    fValidaFormulario(
        $_POST["nombre"],
        $_POST["apellido"],
        $_POST["nif"],
        $_POST["telefono"]
    );
}
?>

</body>
</html>
