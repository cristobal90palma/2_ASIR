<?php

    if (isset($_POST['nombre']) && $_POST['nombre']!="" &&
        isset($_POST['telefono']) && $_POST['telefono']!="" &&
        isset($_POST['direccion']) && $_POST['direccion']!="") {
        // Datos de contacto correctos. Preguntar ahora por los productos 
        if (count($_POST)>=4) {
            // Caso en que he seleccionado al menos un producto
            $suma = 0;
            echo "<b>Su pedido se está tramitando.</b><br/>";
            echo "<br/><u>DATOS DEL PEDIDO</u><br/>";
            echo "Nombre: ".$_POST['nombre']."<br/>";
            echo "Teléfono: ".$_POST['telefono']."<br/>";
            echo "Dirección: ".$_POST['direccion']."<br/>";
            echo "<br/><u>RESUMEN DEL PEDIDO</u><br/>";
            if (isset($_POST['nachos']) && $_POST['nachos']!="") {
                echo "Nachos - ".$_POST['nachos']." €<br/>";
                $suma = $suma + $_POST['nachos'];
            }
            if (isset($_POST['cesar']) && $_POST['cesar']!="") {
                echo "Ensalsada César - ".$_POST['cesar']." €<br/>";
                $suma = $suma + $_POST['cesar'];
            }
            if (isset($_POST['alitas']) && $_POST['alitas']!="") {
                echo "Combo de alitas - ".$_POST['alitas']." €<br/>";
                $suma = $suma + $_POST['alitas'];
            }
            if (isset($_POST['carbonara']) && $_POST['carbonara']!="") {
                echo "Pizza carbonara - ".$_POST['carbonara']." €<br/>";
                $suma = $suma + $_POST['carbonara'];
            }
            if (isset($_POST['ranchera']) && $_POST['ranchera']!="") {
                echo "Pizza ranchera - ".$_POST['ranchera']." €<br/>";
                $suma = $suma + $_POST['ranchera'];
            }
            if (isset($_POST['taco']) && $_POST['taco']!="") {
                echo "Pizza taco - ".$_POST['taco']." €<br/>";
                $suma = $suma + $_POST['taco'];
            }
            if (isset($_POST['trufa']) && $_POST['trufa']!="") {
                echo "Tarta trufa - ".$_POST['trufa']." €<br/>";
                $suma = $suma + $_POST['trufa'];
            }
            if (isset($_POST['helados']) && $_POST['helados']!="") {
                echo "Hleados variados - ".$_POST['helados']." €<br/>";
                $suma = $suma + $_POST['helados'];
            }
            echo "El importe total del pedido es ".$suma;
        } else {
            echo "Debe seleccionar al menos uno de los productos de la carta<br/>";
            echo "<a href='ejer43.html'>Volver al pedido</a>";
        }
    } else {
        // Datos de contacto incorrectos
        echo "Los datos de contacto deben estar rellenos (nombre, teléfono e email)<br/>";
        /*echo "<a href='ejer43.html'>Volver al pedido</a>";*/
    ?>
        <a href='ejercicio43.html'>Volver al pedido</a>
    <?php
    }

?>
