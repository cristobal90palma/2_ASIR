<?php
	$user_ok = "usuario1";
	$pass_ok = "usuario";
	$user_form = $_POST["usuario"];
	$pass_form = $_POST["password"];
	$pass_hash = password_hash($pass_form, PASSWORD_BCRYPT);

	if($user_ok == $user_form && password_verify($pass_ok, $pass_hash)){
		setcookie("usuario", $user_form);
		echo "<a href='secreta.php'>Acceso a página secreta</a>";
		setcookie("error_login_ac", "false");
	} else {
		setcookie("error_login_ac", "true");
		header("Location: index.php");
	}
?>