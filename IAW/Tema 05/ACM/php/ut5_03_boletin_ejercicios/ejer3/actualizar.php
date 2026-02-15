<?php
	
	include_once "bbdd.php";
	session_start();

	try{

		if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
        }

		$conexion = mysqli_connect($server, $user, $password, $bd);

		$nparte = $_GET['nparte'];
		if (!isset($nparte)){
			die ("Paso de parámetros incorrecto");
		}

		$sql = "select * from averia3 where nparte=".$nparte;
		$resultado_sql = mysqli_query($conexion, $sql);

		if (!$resultado_sql){
			echo "Error en la inserción: ".mysqli_connect();
		}
		$averia = mysqli_fetch_array($resultado_sql, MYSQLI_ASSOC);

		$nombre = $averia['nombre'];
		$apellidos = $averia['apellidos'];
		$modelopc = $averia['modelopc'];
		$error = $averia['error'];
		$observaciones = $averia['observaciones'];
	
	} catch(Exception $e) {
		echo "Error: ".$e->getMessage();
	}
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