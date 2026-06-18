<?php

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
			$suma = 0;
			echo "Nombre: ".$_POST["nombre"]."<br/>";
			echo "Teléfono: ".$_POST["telefono"]."<br/>";
			echo "Dirección: ".$_POST["direccion"]."<br/><br/>";
			echo "Su pedido se está tramitando.<br/>";
			if(isset($_POST["nachos"]) && $_POST["nachos"]!=""){
				echo "Nachos - ".$_POST["nachos"]." €<br/>";
				$suma = $suma + $_POST["nachos"];
			}
			if(isset($_POST["cesar"]) && $_POST["cesar"]!=""){
				echo "Ensalada César - ".$_POST["cesar"]." €<br/>";
				$suma = $suma + $_POST["cesar"];
			}
			if(isset($_POST["alitas"]) && $_POST["alitas"]!=""){
				echo "Combo de alitas - ".$_POST["alitas"]." €<br/>";
				$suma = $suma + $_POST["alitas"];
			}
			if(isset($_POST["carbonara"]) && $_POST["carbonara"]!=""){
				echo "Pizza Carbonara - ".$_POST["carbonara"]." €<br/>";
				$suma = $suma + $_POST["carbonara"];
			}
			if(isset($_POST["taco"]) && $_POST["taco"]!=""){
				echo "Pizza Taco - ".$_POST["taco"]." €<br/>";
				$suma = $suma + $_POST["taco"];
			}
			if(isset($_POST["trufa"]) && $_POST["trufa"]!=""){
				echo "Tarta Trufa - ".$_POST["trufa"]." €<br/>";
				$suma = $suma + $_POST["trufa"];
			}
			if(isset($_POST["helados"]) && $_POST["helados"]!=""){
				echo "Helados variados - ".$_POST["helados"]." €<br/>";
				$suma = $suma + $_POST["helados"];
			}
			echo "<br/>El importe total es ".$suma." €<br/>";
			echo "<a href='formulario.html'>Nuevo pedido</a>";
		}
	}
?>