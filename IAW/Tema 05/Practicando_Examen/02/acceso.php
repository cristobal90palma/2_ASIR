<?php
session_start(); // Siempre arriba del todo

    // Redirigir si ya está logueado ANTES de mostrar el formulario
    if (isset($_SESSION['user']) && $_SESSION['user'] != "" && (!isset($_SESSION['error_login']) || $_SESSION['error_login'] == false)) {
        header("Location: consultar.php");
        exit(); // Importante detener la ejecución tras un header
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario de acceso</title>
</head>
<body>

	<form method="post" action="login.php">
		<label>Usuario: </label><input type="text" name="user"><br/>
		<label>Contraseña: </label><input type="password" name="pass"><br/><br/>
		<input type="submit" name="login" value="Login">
	</form>
	<a href='registro.php'>REGISTRARSE</a>

<?php
        // Comprobamos si hay error
        if (isset($_SESSION['error_login']) && $_SESSION['error_login'] == true) {
            echo "<p style='color: red;'>Credenciales incorrectas</p>";
            
            // EL TRUCO: Borramos la variable de la sesión justo después de mostrarla
            unset($_SESSION['error_login']);
        }
    ?>

</body>
</html>