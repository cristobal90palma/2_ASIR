<?php
	
	//print_r($_POST);
	$productos = ["p1" => ["Nachos clásicos", 8.95], "p2" => ["Ensalada César", 10], "p3" => ["Combo de alitas", 15], "p4" => ["Pizza Carbonara", 11], "p5" => ["Pizza Ranchera", 8], "p6" => ["Pizza Taco", 15], "p7" => ["Tarta trufa", 4], "p8" => ["Helados variados", 3]];

	if (!isset($_POST["nombre"]) || $_POST["nombre"]=="" || 
		!isset($_POST["telefono"]) || $_POST["telefono"]=="" ||
		!isset($_POST["direccion"]) || $_POST["direccion"]==""){
		echo "Los datos de contacto no han sido rellenados correctamente.<br/>";
		echo "<a href='formulario.html'>Volver</a>";
	} else {
		if(count($_POST)==3){
			echo "No se ha seleccionado ningún producto para el pedido.<br/>";
			echo "<a href='formulario.html'>Volver</a>";
		} else {
			$suma=0;
			echo $_POST["nombre"]."<br/>";
			echo $_POST["telefono"]."<br/>";
			echo $_POST["direccion"]."<br/>";
			echo "=============================<br/>";
			echo "SU PEDIDO SE ESTÁ PROCESANDO<br/>";
			echo "=============================<br/>";
			
			for ($i=0; $i < count($productos); $i++) { 
				$key = "p".($i+1);
				if (isset($_POST[$key])){
					$suma  = $suma + $productos[$key][1];
					echo $productos[$key][0]." - ".$productos[$key][1]." €<br/>";
				}
				
			}

			echo "La suma final es ".$suma." €<br/>";
			echo "<a href='formulario.html'>Volver</a>";
		}
	}
?>