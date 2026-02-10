<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio 32</title>
	<meta charset="utf-8">
	<style type="text/css">
		label {
			width: 100px;
			display:inline-block;
			margin: 10px 0px; 
		}
	</style>
</head>
<body>
	<h1>Datos personales</h1>
	<form method="post" action="formulario.php" name="datos">
		<label for="nombre">Nombre: </label>
		<input type="text" name="nombre" id="nombre"></br>
		<label for="apellidos">Apellidos: </label>
		<input type="text" name="apellidos" id="apellidos"></br>
		<label for="nif">NIF: </label>
		<input type="text" name="nif" id="nif"></br>
		<label for="telefono">Telefono: </label>
		<input type="text" name="telefono" id="telefono"></br>
		<input type="submit" name="enviar" value="Enviar">
	</form>
	<?php
		include ("validaciones.php");
		if(isset($_POST["nombre"], $_POST["apellidos"], $_POST["telefono"], $_POST["nif"])){
			$cod_errores = fValidaFormulario($_POST["nombre"], $_POST["apellidos"], $_POST["telefono"], $_POST["nif"]);
		}
		if (isset($cod_errores) and sizeof($cod_errores)>0) {
			echo "<br/><br/>Se han producido los siguientes errores:<br/><ul>";
			foreach($cod_errores as $error){
				echo "<li>".$errores_cod[$error]."</li>";
			}
			echo "</ul>";
		} else {
			echo "<p>Los datos son correctos.</p>";
		}
	?>
</body>
</html>