<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso</title>
</head>
<body>

<h2>Acceso a la aplicación</h2>

<?php
require_once "comunes.php";

$usuario_form = "";

if (isset($_COOKIE["recuerda"])) {
    $usuario_form = $_COOKIE["recuerda"];
}

if (isset($_SESSION["error"])) {
    if ($_SESSION["error"] == 0) {
        echo "<p style='color:red;'>Faltan datos de usuario o contraseña.</p>";
    }
    if ($_SESSION["error"] == 1) {
        echo "<p style='color:red;'>Usuario o contraseña incorrectos.</p>";
    }
    unset($_SESSION["error"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    fValidaAcceso(
        $_POST["usuario"] ?? "",
        $_POST["password"] ?? "",
        $_POST["recordar"] ?? null
    );
}
?>

<form method="POST" action="acceso.php">
    <label>Usuario:</label>
    <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario_form); ?>">
    <br><br>

    <label>Password:</label>
    <input type="password" name="password">
    <br><br>

    <input type="checkbox" name="recordar"> Recordar usuario
    <br><br>

    <input type="submit" value="Validar">
</form>

</body>
</html>


