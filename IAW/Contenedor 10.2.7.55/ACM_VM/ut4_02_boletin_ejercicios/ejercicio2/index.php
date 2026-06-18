<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 2 - COOKIES</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="post" action="login.php">
		<fieldset>
			<legend>DATOS DE ACCESO</legend>
			<p>
				<label for="usuario">Usuario:</label>
				<input type="text" name="usuario" id="usuario">
			</p>
			<p>
				<label for="password">Contraseña:</label>
				<input type="password" name="password" id="password">
			</p>
			<input type="submit" name="login" value="Iniciar Sesión" />
		</fieldset>
	</form>
	<?php
		if(isset($_COOKIE["error_login_ac"]) && $_COOKIE["error_login_ac"]==true){
			echo "<label style='color: red;'>Credenciales incorrectas.</label>";
		}
	?>
</body>
</html>