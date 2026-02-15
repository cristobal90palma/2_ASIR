<?php

	include_once "bbdd.php";
	session_start();

	try {

		if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
        }

		$conexion = mysqli_connect($servidor, $user, $password, $bd);

		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$modelopc = $_POST['modelopc'];
		$error = $_POST['error'];
		$observaciones = $_POST['observaciones'];
		$username = $_SESSION['user'];

		$sql = "insert into averia3 (nombre, apellidos, modelopc, error, observaciones, username) values ('".$nombre."', '".$apellidos."', '".$modelopc."', '".$error."', '".$observaciones."', '".$username."')";
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

	mysqli_close($conexion);
?>