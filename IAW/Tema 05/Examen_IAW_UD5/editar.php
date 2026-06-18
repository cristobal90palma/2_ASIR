<?php

	include_once "bbdd.php";
	//session_start();

	try {

		// Comprobación de inicio de sesión.
		/*
		if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
			exit();
        }
		*/

		// Conexión con BBDD
		$conexion = mysqli_connect($servidor, $user, $password, $bd);

		// Estos son datos que vienen del formulario de actualizar.php
		// Recupera todos los campos del formulario, incluido el nparte (que venía en el input type="hidden").
		$dni_mostrar = $dni_actualizar['dni'];
		$nombre = $dni_actualizar['nombre'];
		$apellidos = $dni_actualizar['apellidos'];
		$direccion = $dni_actualizar['direccion'];
		$telefono = $dni_actualizar['telefono'];
		$email = $dni_actualizar['email'];
		$ciclo = $dni_actualizar['ciclo'];

		// Actualiza los datos en la averia que coincide con el nparte
		$sql = "update alumno set nombre='".$nombre."', apellidos='".$apellidos."', direccion='".$direccion."', telefono='".$telefono."', email='".$email."' where dni='".$dni."'";
		
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

	mysqli_close($conexion);
?>