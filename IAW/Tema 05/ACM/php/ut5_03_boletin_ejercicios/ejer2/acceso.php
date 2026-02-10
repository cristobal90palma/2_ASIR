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
		session_start();  
		if (isset($_SESSION['error_login']) and $_SESSION['error_login']== true) {
			echo "<p style='color: red;'>Credenciales incorrectas</p>";
		}
	?>

</body>
</html>