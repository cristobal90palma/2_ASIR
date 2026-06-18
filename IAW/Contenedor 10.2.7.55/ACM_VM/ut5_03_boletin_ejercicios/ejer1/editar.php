<?php

	include_once "bbdd.php";

	$conexion = mysqli_connect($server, $user, $password, $bbdd);

	if (!$conexion) {
		die ("Error en la conexión: " . mysqli_connect_error());
	}

	$nparte = $_POST['nparte'];
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$modelopc = $_POST['modelopc'];
	$error = $_POST['error'];
	$observaciones = $_POST['observaciones'];

	$sql = "update averia set nombre='".$nombre."', apellidos='".$apellidos."', modelopc='".$modelopc."', error='".$error."', observaciones='".$observaciones."' where nparte=".$nparte;
	
	//echo $sql;
	$resultado_sql = mysqli_query($conexion, $sql);

	if (!$resultado_sql){
		echo "Error en la inserción: ".mysqli_connect();
	}

	echo "Avería actualizada correctamente.<br/><br/>";
	echo "<a href='consultar.php'>LISTA DE AVERÍAS</a>";

?>