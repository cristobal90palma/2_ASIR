<?php
	session_start();
	if (isset($_SESSION['tareas'])){
		for($i=0; $i<sizeof($_SESSION['tareas']); $i++){
			if (isset($_POST['t'.$i]) && $_POST['t'.$i]=="on"){
				array_splice($_SESSION['tareas'], $i, 1);
			}
		}
		header("Location:lista.php");
	}
?>