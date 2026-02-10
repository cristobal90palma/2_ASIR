<?php
include_once 'comunes.php';
session_start();

//
$error = "";

// Guardamos valor de COOKIE si existe en variable para imprimir luego en sección de HTML.
if (isset($_COOKIE['recuerda'])) {
    $usuario_guardado = $_COOKIE['recuerda'];
} else {
    $usuario_guardado = "";
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['usuario'] ?? '';
    $pass = $_POST['password'] ?? '';
    $recordar = isset($_POST['recordar']);

    if (empty($user) || empty($pass)) {
        $error = "Por favor, rellene todos los campos.";
    } else {
        if (fValidaAcceso($user, $pass) == 1) {
            // Configurar Sesión
            $_SESSION['misesion'] = session_id();
            $_SESSION['usuario'] = $user;
            $_SESSION['inicio'] = date("Y-m-d H:i:s");

            // Configurar Cookie si se marcó el check
            if ($recordar) {
                setcookie("recuerda", $user, time() + (86400 * 30), "/"); // 30 días
            } else {
                setcookie("recuerda", "", time() - 3600, "/"); // Eliminar si no se marca
            }

            header("Location: areapersonal.php");
            exit();
        } else {
            $error = "Usuario o password incorrectos.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Acceso</title></head>
<body>
    <h2>Formulario de Acceso</h2>
    <?php if($error) echo "<p style='color:red'>$error</p>"; ?>
    
    <form method="POST" action="acceso.php">
        Usuario: <input type="text" name="usuario" value="<?php echo $usuario_guardado; ?>"><br><br>
        Password: <input type="password" name="password"><br><br>
        Recordar usuario: <input type="checkbox" name="recordar" <?php if($usuario_guardado) echo "checked"; ?>><br><br>
        <input type="submit" value="Validar">
    </form>
</body>
</html>