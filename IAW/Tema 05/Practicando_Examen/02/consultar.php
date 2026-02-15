<?php

	include_once "bbdd.php"; // Se incluye los datos de "bbdd.php" con la informacion para conectarnos a la Base de Datos
	session_start(); // Inicio de sesión

	if (isset($_SESSION['user'])) { //Comprueba si el usuario ha iniciado sesión. Si no existe $_SESSION['user'], el usuario no puede acceder a esta página.

		// Nos conectamos a MySQL: https://www.w3schools.com/php/func_mysqli_connect.asp
		$conexion = mysqli_connect($server, $user, $password, $bbdd);

		if (!$conexion) {
			die ("Error en la conexión: " . mysqli_connect_error()); //https://www.w3schools.com/php/func_mysqli_connect_error.asp Return the error description from the last connection error
		}

		
		$sql = "select * from averia"; //Establece el comando mysql que hará
		$resultado_sql = mysqli_query($conexion, $sql); //Utiliza la función mysqli_query para enviar esa instrucción a la base de datos a través de una conexión previa ($conexion ). El resultado se guarda en la variable
		$averias = mysqli_fetch_all($resultado_sql, MYSQLI_ASSOC); //mysqli_fetch_array() Toma la fila encontrada y la transforma en un array asociativo.

		//Creación de la tabla HTML
		echo "<table border='1' style='border-collapse: collapse;'>";
		echo "<tr>";
		echo "<td>NUM PARTE</td>";
		echo "<td>NOMBRE</td>";
		echo "<td>APELLIDOS</td>";
		echo "<td>MODELO PC</td>";
		echo "<td>ERROR</td>";
		echo "<td>OBSERVACIONES</td>";
		echo "<td>ACCIONES</td>";
		echo "</tr>";

		//Mostrar los datos de cada avería
		// ¿Por qué doble foreach?
		/*
		1. El primer foreach($averias as $averia)

		Este bucle se encarga de las filas.

		Cada vez que da una vuelta, selecciona una "avería" completa (una fila de tu base de datos).

		Dentro de este bucle es donde abres la etiqueta <tr> (table row), porque estás empezando una fila nueva en tu tabla HTML.

		2. El segundo foreach($averia as $columna => $dato)

		Este bucle se encarga de las columnas (celdas) dentro de esa fila.

		En lugar de escribir a mano $averia['id'], $averia['descripcion'], etc., este bucle recorre automáticamente todas las columnas que traiga la consulta.

		Por cada dato que encuentra, imprime un <td> (table data). Es una forma dinámica de mostrar la información: si mañana añades una columna nueva a tu base de datos, este código la mostrará automáticamente sin cambiar nada.

		*/

		foreach($averias as $averia){
			echo "<tr>";
			foreach ($averia as $columna => $dato){
				echo "<td>".$dato."</td>";
			}

			// Enlaces de acciones (CRUD). Pasa "nparte" por la URL para identificar el registro.
			echo "<td><a href='eliminar.php?nparte=".$averia['nparte']."'>Eliminar</a> | <a href='actualizar.php?nparte=".$averia['nparte']."'>Actualizar</a></td>";
			echo "</tr>";
		}

		echo "</table><br/>"; // Cierre de la tabla


		echo "<a href='formulario.html'>NUEVA AVERIA</a><br/><br/>";
		echo "<a href='logout.php'>CERRAR SESIÓN</a>";
		
	} else { //Esto es lo que pasa si hay un error a la hora de comprobar que haya una sesión iniciada.
		unset($_SESSION["error_login"]);
		header("Location: acceso.php");
	}

?>