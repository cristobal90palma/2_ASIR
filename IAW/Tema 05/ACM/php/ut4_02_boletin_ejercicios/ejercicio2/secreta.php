<?php
	
	if (isset($_COOKIE["usuario"])){
		echo "<p>Has iniciado sesión correctamente.</p>";
		echo "<p>Esto es una sección privada, solo para usuarios registrados.</p>";
		echo "<a href='logout.php'>Cerrar sesión</a>";
	} else {
		echo "<p>No tienes permisos para acceder a esta sección secreta.</p>";
		echo "<a href='index.php'>Iniciar sesión</a>";
	}
?>