<?php

// El error estaba en la forma de agrupar las condiciones.
// Cada llamada a isset() debe envolver a la variable a comprobar.
// Las comprobaciones múltiples deben estar separadas por el operador lógico '&&'.
if (isset($_POST['nombre']) && $_POST['nombre'] != "" &&
    isset($_POST['telefono']) && $_POST['telefono'] != "" &&
    isset($_POST['direccion']) && $_POST['direccion'] != "") {
        
        // Datos de contacto correctos. Preguntar ahora por los productos
       
        if (count($_POST) >= 4) {
            //Caso en que he seleccionado al menos un producto. (3 datos obligatorios + 1 producto = 4 datos.)
            $suma = 0;
            echo "<b>Su pedido se está tramitando.</b><br/>";
            echo "<br/><b>DATOS DEL PEDIDO.</b><br/>";
            echo "Nombre: ".$_POST['nombre']."<br/>";
            echo "Telefono: ".$_POST['telefono']."<br/>";
            echo "Dirección: ".$_POST['direccion']."<br/>";
            echo "<br/><b>RESUMEN DEL PEDIDO.</b><br/>";
            if(isset($_POST['nachos']) && $_POST['nachos']!= "" ) {
                echo "Nachos - ".$_POST['nachos']." €<br/>";
                $suma = $suma + $_POST['nachos'];
            } 
            if(isset($_POST['alitas']) && $_POST['alitas']!= "" ) {
                echo "Alitas - ".$_POST['alitas']." €<br/>";
                $suma = $suma + $_POST['alitas'];
            }
             if(isset($_POST['carbonara']) && $_POST['carbonara']!= "" ) {
                echo "Pizza Carbonara - ".$_POST['carbonara']." €<br/>";
                $suma = $suma + $_POST['carbonara'];
            }
            if(isset($_POST['ranchera']) && $_POST['ranchera']!= "" ) {
                echo "Pizza Ranchera - ".$_POST['ranchera']." €<br/>";
                $suma = $suma + $_POST['ranchera'];
            }
                 if(isset($_POST['taco']) && $_POST['taco']!= "" ) {
                echo "Pizza Taco - ".$_POST['taco']." €<br/>";
                $suma = $suma + $_POST['taco'];
            }
                   if(isset($_POST['trufa']) && $_POST['trufa']!= "" ) {
                echo "Tarta Trufa - ".$_POST['trufa']." €<br/>";
                $suma = $suma + $_POST['trufa'];
            }
                       if(isset($_POST['helados']) && $_POST['helados']!= "" ) {
                echo "Helados variados - ".$_POST['helados']." €<br/>";
                $suma = $suma + $_POST['helados'];
            }
        } 

        echo "El importe total del pedido es ".$suma." €<br/>";
        } else {
            // Datos de contacto incorrectos:
            echo "Debes seleccionar al menos algún producto de la carta.<br/>";
        }
        



        
        // Datos de contacto incorrectos.
        echo "Los datos de contacto deben estar rellenos (nombre, telefono y direccion).<br/>";
        echo "<a href='ejercicio43.html'>Volver al pedido</a><br/>";
        
        ?>
        <a href='ejercicio43.html'>Volver al pedido</a>
        <?php
        


?>