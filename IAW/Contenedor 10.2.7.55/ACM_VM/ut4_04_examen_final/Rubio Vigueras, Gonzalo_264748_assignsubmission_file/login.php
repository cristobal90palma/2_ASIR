<?php
    include_once "users.php";
    $mensaje = "";
    $usuarioGuardado = "";
    if (isset($_COOKIE["recuerda"])) {
        $usuarioGuardado = $_COOKIE["recuerda"];
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"] ?? "";
        $password = $_POST["password"] ?? "";
        if (empty($usuario) || empty($password)) {
            $mensaje = "Debe informar usuario y password";
        } else {
            if (fValidaAcceso($usuario, $password) == 1) {
                $_SESSION["misesion"] = session_id();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["inicio"] = date("d/m/Y H:i");
                if (isset($_POST["recordar"])) {
                    setcookie("recuerda", $usuario, time() + 3600 * 24 * 30);
                }
                header("Location: formulario.php");
                exit;
            } else {
                $mensaje = "Usuario o password incorrecto";
            }
        }
    }
?>

    <!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Apartado A</title>
            </head>
            <body>
                <h2>Acceso</h2>
                <form method="post">
                    Usuario: <input type="text" name="usuario" value="<?= $usuarioGuardado ?>"><br><br>
                    Password: <input type="password" name="password"><br><br>
                    <input type="submit" value="Validar">
                </form>
                <p style="color:red"><?= $mensaje ?></p>
            </body>
        </html>