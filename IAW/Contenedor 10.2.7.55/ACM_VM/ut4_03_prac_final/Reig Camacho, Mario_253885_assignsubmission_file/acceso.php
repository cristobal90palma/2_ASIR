<?php
session_start();
include_once("comunes.php"); 

$error = "";
// Recuperar usuario de la cookie si existe 
$usuario_guardado = isset($_COOKIE['recuerda']) ? $_COOKIE['recuerda'] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['usuario'];
    $pass = $_POST['password'];

// Validar que los campos estén rellenados
    if (empty($user) || empty($pass)) {
        $error = "Debe informar el usuario y el password."; 
    } else {
        if (fValidaAcceso($user, $pass) == 1) { 
// Crear sesión y sus claves 
            $_SESSION['misesion'] = session_id(); 
            $_SESSION['usuario'] = $user; 
            $_SESSION['inicio'] = date("d/m/Y H:i"); 

// Si marcó "Recordar usuario", crear la cookie
            if (isset($_POST['recordar'])) {
                setcookie("recuerda", $user, time() + 3600 * 24 * 30);
            } else {
// Borrar si no se marca recordar usuario
                setcookie("recuerda", "", time() - 3600); 
            }

            header("Location: areapersonal.php"); 
            exit();
        } else {
            $error = "El password o el usuario es incorrecto."; 
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Acceso</title></head>
<body style="background-color: #A9D0F5;"> <form method="post" action="acceso.php">
        <label>USUARIO</label>
        <input type="text" name="usuario" value="<?php echo $usuario_guardado; ?>"><br><br> <label>PASSWORD</label>
        <input type="password" name="password"><br><br> <input type="checkbox" name="recordar"> Recordar usuario<br><br> <input type="submit" value="Validar"> </form>
    <p style="color:red;"><?php echo $error; ?></p>
</body>
</html>