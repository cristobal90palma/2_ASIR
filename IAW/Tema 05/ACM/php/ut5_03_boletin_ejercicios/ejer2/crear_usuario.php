<?php

	include_once "bbdd.php";

	$conexion = mysqli_connect($server, $user, $password, $bbdd);

	if (!$conexion) {
		die ("Error en la conexión: " . mysqli_connect_error());
	}

	$usuario = $_POST['user'];
	$password = $_POST['pass'];
	$password2 = $_POST['pass2'];

	if ($password == $password2) {

		$sql = "select username from usuario where username='".$usuario."'";
		$resultado_sql = mysqli_query($conexion, $sql);
		if (mysqli_num_rows($resultado_sql) == 0) {

			$hash = password_hash($password, PASSWORD_DEFAULT);
			$sql = "insert into usuario (username, password) value ('".$usuario."', '".$hash."')";
			$resultado_sql = mysqli_query($conexion, $sql);

			if (!$resultado_sql){
				echo "Error en la inserción de usuario ".mysqli_connect();
			} else {
				echo "Usuario registrado correctamente<br>";	
			}

			echo "<a href='acceso.php'>LOGIN</a>";

		} else {
			echo "Ya existe un usuario con ese nombre. Introduzca otro.<br/>";
			echo "<a href='registro.php'>VOLVER</a>";
		}

	} else {
		echo "Las contraseñas no coinciden. Deben ser iguales.<br/>";
		echo "<a href='registro.php'>VOLVER</a>";
	}

?>