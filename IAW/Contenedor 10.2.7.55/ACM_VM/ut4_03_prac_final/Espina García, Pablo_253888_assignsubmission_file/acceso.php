<?php
include_once "comunes.php";
session_start();

$mensaje = "";
$usuarioRecordado = "";
$usuario="";
$password="";
$recordar= false;

// Recuperar cookie
if (isset($_COOKIE["recuerda"])) {
    $usuarioRecordado = $_COOKIE["recuerda"];
}

// Inicializar variables siempre


if ($_SERVER["REQUEST_METHOD"] == "POST") {
$usuario = $_POST["usuario"];
$password = $_POST["password"];
$recordar = isset($_POST["recordar"]);
    if ($usuario == "" || $password == "") {
        $mensaje = "Debes rellenar usuario y contraseña.";
    } else {

        if (fValidaAcesso($usuario, $password) == 1) {

            $_SESSION["misesion"] = session_id();
            $_SESSION["usuario"] = $usuario;
            $_SESSION["inicio"] = date("Y-m-d H:i:s");

            if ($recordar) {
                setcookie("recuerda", $usuario, time() + 3600 * 24 * 30);
            }

            header("Location: areapersonal.php");
            exit();
        } else {
            $mensaje = "Usuario o contraseña incorrectos.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Acceso</title>
    <style>
        body {
            background-color: #87CEFA;
        }
    </style>
</head>
<body>
<?php if ($mensaje != ""): ?>
    <p style="color:red"><?= $mensaje ?></p>
<?php endif; ?>
<form method="POST" action="">
    Usuario: <input type="text" name="usuario" value="<?= $usuarioRecordado ?>"><br><br>
    Password: <input type="password" name="password"><br><br>
    Recordar Usuario: <input type="checkbox" name="recordar"><br><br>
    <input type="submit" value="Validar">
</form>

</body>
</html>