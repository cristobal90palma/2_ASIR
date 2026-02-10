<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso</title>
</head>
<body>

<?php
    session_start();
    include_once("comunes.php");

    if (isset($_SESSION["misesion"]) && $_SESSION["misesion"] != "") {
        header("Location: areapersonal.php");
        exit();
    }

    $error = "";
    $usuarioForm = "";

    if (isset($_COOKIE["recuerda"]) && $_COOKIE["recuerda"] != "") {
        $usuarioForm = $_COOKIE["recuerda"];
    }

    if (isset($_POST["usuario"]) || isset($_POST["password"])) {

        if (!isset($_POST["usuario"]) || $_POST["usuario"] == "") {
            $error = "Debe introducir el usuario";
        } elseif (!isset($_POST["password"]) || $_POST["password"] == "") {
            $error = "Debe introducir la contraseña";
        } else {

            $usuario = $_POST["usuario"];
            $password = $_POST["password"];
            $usuarioForm = $usuario;

            if (fValidaAcceso($usuario, $password) == 1) {

                $_SESSION["misesion"] = session_id();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["inicio"] = date("d/m/Y H:i");

                if (isset($_POST["recordar"]) && $_POST["recordar"] == "on") {
                    setcookie("recuerda", $usuario, time() + 10 * 60 * 60);
                }

                header("Location: areapersonal.php");
                exit();

            } else {
                $error = "Usuario o contraseña incorrectos";
            }
        }
    }
?>

<h2>Acceso</h2>

<form action="acceso.php" method="POST">
    <p>
        <label>Usuario: </label>
        <input type="text" name="usuario" value="<?php echo $usuarioForm; ?>"/>
    </p>

    <p>
        <label>Contraseña: </label>
        <input type="password" name="password"/>
    </p>

    <p>
        <label>Recordar usuario: </label>
        <input type="checkbox" name="recordar"/>
    </p>

    <p>
        <input type="submit" value="Validar"/>
    </p>
</form>

<?php
    if ($error != "") {
        echo "<p style='color:red;'><b>".$error."</b></p>";
    }
?>

</body>
</html>