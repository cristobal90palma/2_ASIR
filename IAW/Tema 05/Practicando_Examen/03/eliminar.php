<?php
	
	include_once "bbdd.php";
	session_start();

	try{

		// Comprobar que la sesión está activa.
		if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
			exit();
        }

		// Comprobación de la conexión con la BBDD
		$conexion = mysqli_connect($servidor, $user, $password, $bd);
		if (!$conexion) {
			die ("Error en la conexión: " . mysqli_connect_error());
		}

		// Recepción del valor nparte de cuando le dimos la botón Eliminar
		$nparte = $_GET['nparte'];
		if (!isset($nparte)){
			die ("Paso de parámetros incorrecto");
		}

		// Sentencia SQL que borra la fila con la averia cuyo nparte es el que hemos seleccionado antes.
		$sql = "delete from averia3 where nparte=".$nparte;
		$resultado_sql = mysqli_query($conexion, $sql);
		if (!$resultado_sql){
			echo "Error en el borrado: ".mysqli_connect();
		}

		echo "Averia eliminada correctamente.<br>";

		echo "<a href='consultar.php'>VOLVER AL LISTADO DE AVERÍAS</a>";
	
	} catch(Exception $e) {
		echo "Error: ".$e->getMessage();
	}

	mysqli_close($conexion);

?>