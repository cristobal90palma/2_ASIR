<?php
session_start();
include_once("comun.php"); 

$error = "";

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
<body > <form method="post" action="formulario1.php">
        <label>USUARIO</label>
        <input type="text" name="usuario" value="<?php echo $usuario_guardado; ?>"><br><br> <label>PASSWORD</label>
        <input type="password" name="password"><br><br> <br><br> <input type="submit" value="Validar"> </form>
    <p style="color:red;"><?php echo $error; ?></p>
</body>
</html>