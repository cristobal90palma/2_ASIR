<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>login</title>
</head>
<body>

<h2>Iniciar Sesión</h2>

<?php
require_once "validar.php";

$usuario_form = "";

// usuario recordado por cookie
if (isset($_COOKIE["recuerda"])) {
    $usuario_form = $_COOKIE["recuerda"];
}

// mostrar errores
if (isset($_SESSION["error"])) {
    if ($_SESSION["error"] == 0) {
        echo "<p style='color:red;'>Faltan datos de usuario o contraseña.</p>";
    }
    if ($_SESSION["error"] == 1) {
        echo "<p style='color:red;'>Usuario o contraseña incorrectos.</p>";
    }
    unset($_SESSION["error"]);
}

// procesar formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    fValidaAcceso(
        $_POST["usuario"] ?? "",
        $_POST["password"] ?? "",
        $_POST["recordar"] ?? null
    );
}
?>

<form method="POST" action="formulario.php">
    <label>Usuario:</label>
    <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario_form); ?>">
    <br><br>

    <label>Password:</label>
    <input type="password" name="password">
    <br><br>

    <input type="submit" value="Validar">
</form>

</body>
</html>


