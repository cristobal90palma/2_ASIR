<?php

	include_once "bbdd.php";
	session_start();

	try {

		if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
        }

		$conexion = mysqli_connect($servidor, $user, $password, $bd);

		$nparte = $_POST['nparte'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$modelopc = $_POST['modelopc'];
		$error = $_POST['error'];
		$observaciones = $_POST['observaciones'];

		$sql = "update averia3 set nombre='".$nombre."', apellidos='".$apellidos."', modelopc='".$modelopc."', error='".$error."', observaciones='".$observaciones."' where nparte=".$nparte;
		
		//echo $sql;
		$resultado_sql = mysqli_query($conexion, $sql);

		if (!$resultado_sql){
			echo "Error en la inserción: ".mysqli_connect();
		}

		echo "Avería actualizada correctamente.<br/><br/>";
		echo "<a href='consultar.php'>LISTA DE AVERÍAS</a>";
	
	} catch(Exception $e) {
		echo "Error: ".$e->getMessage();
	}

?>