<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>	
	<?php
		include_once "bbdd.php";
		session_start();

		$user_form = $_POST['user'];
		$pass_form = $_POST['pass'];

		$conexion = mysqli_connect($server, $user, $password, $bbdd);
		if (!$conexion) {
			die ("Error en la conexión: " . mysqli_connect_error());
		}

		$sql = "select * from usuario where username = '".$user_form."'";
		$resultado_sql = mysqli_query($conexion, $sql);

		if(mysqli_num_rows($resultado_sql)==1){
			$usuario = mysqli_fetch_array($resultado_sql, MYSQLI_ASSOC);
			$hash_bd = $usuario['password'];

			if (password_verify($pass_form, $hash_bd)) {
				echo "Bienvenido ".$user_form.". Acceso correcto.<br/>";
				$_SESSION['user'] = $user_form;
				$_SESSION['error_login'] = false;
				//echo "<a href='consultar.php'>Acceder a página de averías</a>";
				header("Location: consultar.php");
			}  else {
				unset($_SESSION['user']);
				$_SESSION['error_login'] = true;
				//echo "Contraseña incorrecta.<br/>";
				//echo "<a href='acceso.php'>Login</a>";
				header("Location: acceso.php");
			}
		} else {
			unset($_SESSION['user']);
			$_SESSION['error_login'] = true;
			//echo "Usuario incorrecto.<br/>";
			//echo "<a href='acceso.php'>Login</a>";
			header("Location: acceso.php");
		}
	?>
</body>
</html>