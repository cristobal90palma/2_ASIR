<?php
	
	include_once "bbdd.php"; //Carga los datos de conexión a la base de datos.
	session_start(); //Inicia la sesión para comprobar si el usuario está autenticado.

	if (isset($_SESSION['user'])) { // Solo permite acceder a esta página si el usuario ha iniciado sesión. Evita que alguien acceda escribiendo la URL directamente.

		// Nos conectamos a MySQL: https://www.w3schools.com/php/func_mysqli_connect.asp
		$conexion = mysqli_connect($server, $user, $password, $bbdd);

		if (!$conexion) {
			die ("Error en la conexión: " . mysqli_connect_error()); //https://www.w3schools.com/php/func_mysqli_connect_error.asp Return the error description from the last connection error
		}

		// Recogida del parámetro nparte. Viene del anterior: <a href='eliminar.php?nparte=".$averia['nparte']."'>
		// nparte identifica qué avería se va a editar.
		$nparte = $_GET['nparte'];
		if (!isset($nparte)){
			die ("Paso de parámetros incorrecto");
		}


		$sql = "select * from averia where nparte=".$nparte; // Genera la Consulta la avería cuyo nparte coincide.
		$resultado_sql = mysqli_query($conexion, $sql); // Hace la consulta.

		if (!$resultado_sql){ //Comprueba si la consulta ha fallado
			echo "Error en la inserción: ".mysqli_connect();
		}

		//Convierte la fila de la BD en un array asociativo.
		$averia = mysqli_fetch_array($resultado_sql, MYSQLI_ASSOC);

		//Del array asociativo, Guarda cada campo en una variable para usarla en el formulario.
		$nombre = $averia['nombre'];
		$apellidos = $averia['apellidos'];
		$modelopc = $averia['modelopc'];
		$error = $averia['error'];
		$observaciones = $averia['observaciones'];
		
?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Formulario de Avería</title>
	</head>
	<body>
		<h2>Edición de averia</h2>
		<?php
		/*Formulario de edición
		<input type="hidden" name="nparte" value="<?php echo $nparte;?>"> Campo oculto --> Muy importante: Mantiene el nparte Permite saber qué registro actualizar al guardar

		Campos del formulario
		<input type="text" name="nombre" value="<?php echo $nombre;?>"/>
		Cada campo: Se rellena con los datos actuales. Permite modificarlos Esto es un formulario de edición, no de inserción.
		*/
		?>
		<form action="editar.php" method="POST">
			<input type="hidden" name="nparte" value="<?php echo $nparte;?>">
			<label>Nombre:</label>
			<input type="text" name="nombre" maxlength="50" required value="<?php echo $nombre;?>"/><br/>
			<label>Apellidos:</label>
			<input type="text" name="apellidos" maxlength="100" required value="<?php echo $apellidos;?>"/><br/>
			<label>Modelo PC:</label>
			<input type="input" name="modelopc" required value="<?php echo $modelopc;?>"/><br/>
			<label>Error:</label>
			<input type="text" name="error" required value="<?php echo $error;?>"/><br/>
			<label>Observaciones:</label>
			<textarea cols="40" rows="10" name="observaciones" maxlength="200" required><?php echo $observaciones;?></textarea><br/><br/>
			<input type="submit" name="guardar" value="GUARDAR"/>
		</form>
	</body>
	</html>
<?php

	} else { //Usuario no autenticado
		unset($_SESSION["error_login"]);
		header("Location: acceso.php");
	} 

	
?>