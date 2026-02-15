<?php
	
	include_once "bbdd.php";
	session_start();

	try{

		if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
        }

		$conexion = mysqli_connect($server, $user, $password, $bd);
		if (!$conexion) {
			die ("Error en la conexión: " . mysqli_connect_error());
		}

		$nparte = $_GET['nparte'];
		if (!isset($nparte)){
			die ("Paso de parámetros incorrecto");
		}

		$sql = "delete from averia3 where nparte=".$nparte;
		$resultado_sql = mysqli_query($conexion, $sql);
		if (!$resultado_sql){
			echo "Error en la inserción: ".mysqli_connect();
		}

		echo "Averia eliminada correctamente.<br>";

		echo "<a href='consultar.php'>VOLVER AL LISTADO DE AVERÍAS</a>";
	
	} catch(Exception $e) {
		echo "Error: ".$e->getMessage();
	}

?>