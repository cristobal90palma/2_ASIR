<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario de registro</title>
</head>
<body>

	<form method="post" action="crear_usuario.php">
		<label>Usuario: </label><input type="text" maxlength="50" name="user" required><br/>
		<label>Contraseña: </label><input type="password" maxlength="50" name="pass" required><br/>
		<label>Repita la contraseña: </label><input type="password" maxlength="50" name="pass2" required><br/><br/>
		<input type="submit" name="login" value="Registro">
	</form>
	<a href='acceso.php'>LOGIN</a>

</body>
</html>