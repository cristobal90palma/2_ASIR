<?php
	//unset($_COOKIE["usuario"]);
	//unset($_COOKIE["error_login_ac"]);
	setcookie("usuario", "", time()-3600);
	setcookie("error_login_ac", "", time()-3600);
	header("Location: index.php");	
?>