<?php
    
    session_start();

    // 1. Si la sesión ya existe, saltamos directamente a consultar.php
		if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
			exit(); // Es vital poner exit() para que no se cargue el resto del HTML
        }
        


    ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro de Avería</title>
</head>
<body>
	<h2>Nueva averia</h2>
	<form action="insertar.php" method="POST">
		<label>Nombre:</label>
		<input type="text" name="nombre" maxlength="50" required /><br/><br/>
		<label>Apellidos:</label>
		<input type="text" name="apellidos" maxlength="100" required/><br/><br/>
		<label>Modelo PC:</label>
		<input type="text" name="modelopc" maxlength="100" required/><br/><br/>
		<label>Error:</label>
		<input type="text" name="error" maxlength="200" required/><br/><br/>
		<label>Observaciones:</label>
		<textarea cols="40" rows="10" name="observaciones" maxlength="200" required></textarea><br/><br/>
		<input type="submit" name="guardar" value="GUARDAR"/>
	</form>
	<br/>
	<a href="consultar.php">LISTADO DE AVERIAS</a>
</body>
</html>