	<?php
		include_once "bbdd.php"; // Se incluye los datos de "bbdd.php" con la informacion para conectarnos a la Base de Datos
		session_start(); // Inicio de sesión

		// Se recogen los datos de "acceso.php"
		$user_form = $_POST['user'];
		$pass_form = $_POST['pass'];

		// Nos conectamos a MySQL: https://www.w3schools.com/php/func_mysqli_connect.asp
		$conexion = mysqli_connect($server, $user, $password, $bbdd);
		if (!$conexion) {
			die ("Error en la conexión: " . mysqli_connect_error());
		}


		$sql = "select * from usuario where username = '".$user_form."'"; // Guarda en una variable la consulta que quiere hacer en la base de datos (en comandos de MySQL)
		$resultado_sql = mysqli_query($conexion, $sql); // Utiliza la función mysqli_query para enviar esa instrucción a la base de datos a través de una conexión previa ($conexion ). El resultado se guarda en la variable

		//mysqli_num_rows() is a PHP function used to return the number of rows in a mysqli_result object
		// Por lo tanto "Si la función indica que hay una linea.
		if(mysqli_num_rows($resultado_sql)==1){
			$usuario = mysqli_fetch_array($resultado_sql, MYSQLI_ASSOC); //mysqli_fetch_array() Toma la fila encontrada y la transforma en un array asociativo.
			$hash_bd = $usuario['password']; //Hacemos uso del array anterior y saca el valor de la columna "password". Se guarda en variable.

			//Verificación de contraseña
			//Compara la contraseña del formulario y la de la base de datos.
			//Si todo va bien, guarda al usuario en la sesión y el error_login lo pone en "false". Se redirige a "consultar.php"
			if (password_verify($pass_form, $hash_bd)) {
				echo "Bienvenido ".$user_form.". Acceso correcto.<br/>";
				$_SESSION['user'] = $user_form;
				$_SESSION['error_login'] = false;
				//echo "<a href='consultar.php'>Acceder a página de averías</a>";
				header("Location: consultar.php");

			//Si no sale bien. Borra cualquier sesión activa. Marca error de login. Vuelve al formulario de acceso
			}  else {
				unset($_SESSION['user']);
				$_SESSION['error_login'] = true;
				//echo "Contraseña incorrecta.<br/>";
				//echo "<a href='acceso.php'>Login</a>";
				header("Location: acceso.php");
			}

			//Si el usuario es incorrecto. Mismo comportamiento que contraseña incorrecta.
			//No distinguir errores de usuario o contraseña correcta es bueno para la seguridad.
		} else {
			unset($_SESSION['user']);
			$_SESSION['error_login'] = true;
			//echo "Usuario incorrecto.<br/>";
			//echo "<a href='acceso.php'>Login</a>";
			header("Location: acceso.php");
		}
	?>
