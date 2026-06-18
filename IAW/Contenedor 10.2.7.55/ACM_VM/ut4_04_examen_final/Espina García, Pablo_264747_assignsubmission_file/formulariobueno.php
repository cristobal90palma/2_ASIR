<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$correo = $_POST["correo"];
$password = $_POST["password"];

if ($correo == "" || $password == "") {
        $mensaje = "Debes rellenar usuario y contraseña.";

        } else {

        if (fValidaAcesso($correo, $password) == 1) {

            $_SESSION["correo"] = $correo;

            if ($recuerdo) {
                setcookie("recuerdo", $correo, time() + 3600 * 24 * 30);
            }

            header("Location: formulario2.php");
            exit();
            } else {
            $mensaje = "Usuario o contraseña incorrectos.";
        }
    }
}
?>