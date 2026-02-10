<?php
	session_start();  
	unset($_SESSION['user']);
	unset($_SESSION['error_login']);
	header("Location: acceso.php");
?>