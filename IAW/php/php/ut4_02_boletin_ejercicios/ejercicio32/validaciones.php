<?php
	
	$errores_cod = ["ER001" => "El nombre no puede estar vacío",
				"ER002" => "El nombre deben tener entre 1 y 50 caracteres (mayúsculas, minúsculas y espacios)",
				"ER003" => "Los apellidos no pueden estar vacíos",
				"ER004" => "Los apellidos deben tener entre 1 y 50 caracteres (mayúsculas, minúsculas y espacios)",
				"ER005" => "El teléfono no puede estar vacío",
				"ER006" => "El formato del teléfono no es correcto",
				"ER007" => "El NIF no puede estar vacío",
				"ER008" => "El NIF no tiene un formato correcto",
				"ER009" => "La letra indicada en el NIF no es correcta"];

	function fValidaNombre($texto){
		if (isset($texto) == false || $texto=="") {
			return "ER001";
		}
		if (preg_match("/^([A-Z]|[a-z]|\s){1,50}$/", $texto) == false){
			return "ER002";
		}
	}

	function fValidaApellidos($texto){
		if (isset($texto) == false || $texto=="") {
			return "ER003";
		}
		if (preg_match("/^([A-Z]|[a-z]|\s){1,50}$/", $texto) == false){
			return "ER004";
		}
	}

	function fValidaTelefono($telefono){
		if (isset($telefono) == false || $telefono=="") {
			return "ER005";
		}
		if (preg_match("/^(6|7|9)[0-9]{8}$/", $telefono) == false){
			return "ER006";
		}
	}

	function fValidaNIF($nif){
		if (isset($nif) == false || $nif=="") {
			return "ER007";
		}
		if (preg_match("/^[0-9]{8}[A-Z]$/", $nif) == false){
			return "ER008";
		}
		
		$numeros = substr($nif, 0, 8);
		$letra = substr($nif, 8, 1);
		$resto = $numeros % 23;
		$letras= "TRWAGMYFPDXBNJZSQVHLCKEO";
		$letra_ok = substr ($letras, $resto, 1);

		if($letra != $letra_ok) {
			return "ER009";
		}

	}

	function fValidaFormulario($nombre, $apellidos, $telefono, $nif){
		$errores = [];
		
		$errores_nombre = fValidaNombre($nombre); 
		if(isset($errores_nombre) == true){
			array_push($errores, $errores_nombre);
		}
		$errores_apellidos = fValidaApellidos($apellidos); 
		if(isset($errores_apellidos) == true){
			array_push($errores, $errores_apellidos);
		}
		$errores_nif = fValidaNIF($nif); 
		if(isset($errores_nif) == true){
			array_push($errores, $errores_nif);
		}
		$errores_telefono = fValidaTelefono($telefono); 
		if(isset($errores_telefono) == true){
			array_push($errores, $errores_telefono);
		}

		return $errores;
	}

?>