<?php

	include_once "bbdd.php";

	try {

		$conexion = mysqli_connect($server, $user, $password, $bbdd);

		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$modelopc = $_POST['modelopc'];
		$error = $_POST['error'];
		$observaciones = $_POST['observaciones'];

		$sql = "insert into averia (nombre, apellidos, modelopc, error, observaciones) values ('".$nombre."', '".$apellidos."', '".$modelopc."', '".$error."', '".$observaciones."')";
		//echo $sql;
		$resultado_sql = mysqli_query($conexion, $sql);

		if (!$resultado_sql){
			echo "Error en la inserción: ".mysqli_connect();
		} else {
			echo "Avería registrada correctamente<br>";	
		}

		echo "<a href='consultar.php'>LISTA DE AVERIAS</a>";
	
	} catch (Exception $e) {
		echo "Error: ".$e->getMessage();
	}

?>