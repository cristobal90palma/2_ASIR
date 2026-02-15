<?php
	
	include_once "bbdd.php";
	session_start();

	try{

		// Comprobar inicio de sesión
		if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
        }

		// Conexión a BBDD
		$conexion = mysqli_connect($servidor, $user, $password, $bd);

		// Recepción de variable GET del botón actualizar
		$nparte = $_GET['nparte'];
		if (!isset($nparte)){
			die ("Paso de parámetros incorrecto");
		}

		// Se selecciona la averia que coincida su nparte
		$sql = "select * from averia3 where nparte=".$nparte;
		$resultado_sql = mysqli_query($conexion, $sql);

		if (!$resultado_sql){
			echo "Error en la inserción: ".mysqli_connect();
		}

		// Se guarda el resultado de la sentencia SQL en un array asociativo.
		$averia = mysqli_fetch_array($resultado_sql, MYSQLI_ASSOC);

		// Los datos del array asociativo pasan a variables para 
		// insertarlos luego en el HTML. Aunque se puede poner el array directamente, así es más sencillo????
		$nombre = $averia['nombre'];
		$apellidos = $averia['apellidos'];
		$modelopc = $averia['modelopc'];
		$error = $averia['error'];
		$observaciones = $averia['observaciones'];

		
	
	} catch(Exception $e) {
		echo "Error: ".$e->getMessage();
	}

	mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario de Avería</title>
</head>
<body>
	<h2>Edición de averia</h2>
	<form action="editar.php" method="POST">
		<!--Se pone "hidden" y el nparte, porque es lo que se va a mandar luego a editar.php -->
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
		<a href="consultar.php" onclick="return confirm('¿Seguro que deseas cancelar?')">CANCELAR</a>
	</form>
</body>
</html>