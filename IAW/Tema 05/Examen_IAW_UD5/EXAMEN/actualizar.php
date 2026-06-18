<?php
	
	include_once "bbdd.php";
	//session_start();

	try{

		/*	// Comprobar inicio de sesión
		if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
        }
			*/

		// Conexión a BBDD
		$conexion = mysqli_connect($servidor, $user, $password, $bd);

		// Recepción de variable GET del botón actualizar
		$dni = $_GET['dni'];
		if (!isset($dni)){
			die ("Paso de parámetros incorrecto");
		}

		// Seleccion alumno
		$sql = "select * from alumno where dni='".$dni."'";
		$resultado_sql = mysqli_query($conexion, $sql);

		if (!$resultado_sql){
			echo "Error en la inserción: ".mysqli_connect();
		}

		// Se guarda el resultado de la sentencia SQL en un array asociativo.
		$dni_actualizar = mysqli_fetch_array($resultado_sql, MYSQLI_ASSOC);

		// Los datos del array asociativo pasan a variables para 
		// insertarlos luego en el HTML. Aunque se puede poner el array directamente, así es más sencillo????
		$dni_mostrar = $dni_actualizar['dni'];
		$nombre = $dni_actualizar['nombre'];
		$apellidos = $dni_actualizar['apellidos'];
		$direccion = $dni_actualizar['direccion'];
		$telefono = $dni_actualizar['telefono'];
		$email = $dni_actualizar['email'];
		$ciclo = $dni_actualizar['ciclo'];

		
		// Conseguir ciclo alumno:
		// Si pongo '".$dni."'"; me da error la página
		$sql2 = "select ciclo from alumno where dni=".$dni;
		$resultado_sql2 = mysqli_query($conexion, $sql2);

		if (!$resultado_sql2){
			echo "Error en la inserción: ".mysqli_connect();
		}


		// Sacar modulos de los ciclos
		$ciclo_alumno = $resultado_sql2;

		$sql3 = "select nombre form modulo where ciclo=".$ciclo_alumno;
		$resultado_sql3 = mysqli_query($conexion, $sql3);
		$modulos = $resultado_sql3;
	
	} catch(Exception $e) {
		echo "Error: ".$e->getMessage();
	}

	mysqli_close($conexion);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulario de ALUMNO</title>
</head>
<body>
	<h2>Edición ALUMNO</h2>
	<form action="editar.php" method="POST">
		<!--Se pone "hidden" y el nparte, porque es lo que se va a mandar luego a editar.php -->
		<input type="hidden" name="dni" value="<?php echo $dni_mostrar;?>">
		<label>DNI:</label>
		<a>"<?php echo $dni_mostrar;?>"</a><br/>
		<label>Nombre:</label>
		<input type="text" name="nombre" maxlength="50"  value="<?php echo $nombre;?>"/><br/>
		<label>Apellidos:</label>
		<input type="text" name="apellidos" maxlength="100"  value="<?php echo $apellidos;?>"/><br/>
		<label>DIRECCION:</label>
		<input type="input" name="direccion"  value="<?php echo $direccion;?>"/><br/>
		<label>TELEFONO:</label>
		<input type="text" name="telefono"  value="<?php echo $telefono;?>"/><br/>
		<label>EMAIL:</label>
		<input type="text" name="email"  value="<?php echo $email;?>"/><br/>
		<label>CICLO:</label>
		<a>"<?php echo $ciclo;?>"</a><br/>

<?php
echo "<h2>Listado de Módulos</h2>";
        
        echo "<table border='1' style='border-collapse: collapse; width: 30%; text-align: center;'>";
        echo "<tr style='background-color: #eee;'>";
        echo "<th>Módulos</th>";
        echo "</tr>";

        foreach($modulos as $modulo){
            echo "<tr>";
            // 
            echo "<td>" . $modulo['nombre'] . "</td>";
            echo "</tr>";
        }

        echo "</table><br/>";

		?>

		<input type="submit" name="guardar" value="GUARDAR"/>
		<br/>
		<a href="consultar.php" onclick="return confirm('¿Seguro que deseas cancelar?')">Volver</a>
	</form>
</body>
</html>