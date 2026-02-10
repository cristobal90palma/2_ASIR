<?php

if (isset($_POST['nombre']) && $_POST['nombre']!="" &&
    isset($_POST['telefono']) && $_POST['telefono']!="" &&
    isset($_POST['direccion']) && $_POST['direccion']!="") {


        if (count($_POST) >= 4) {
            $suma = 0;
            echo "Su pedido se está tramitando.\n<br>";
            echo "DATOS DEL PEDIDO\n";
            echo "Nombre del cliente: ".$_POST['nombre']."\n<br>";
            echo "Telefono del cliente: ".$_POST['telefono']."\n<br>";
            echo "Direccion del cliente: ".$_POST['direccion']."\n<br>";
            echo "RESUMEN DEL PEDIDO\n<br>";

       
        
                if (isset($_POST['nachos']) && $_POST['nachos']!="") {
                    echo "Nachos - ".$_POST['nachos']." €<br>";
                    $suma = $suma + $_POST['nachos'];
                }  
                
                if (isset($_POST['cesar']) && $_POST['cesar']!="") {
                    echo "Cesar - ".$_POST['cesar']." €<br>";
                    $suma = $suma + $_POST['cesar'];
                }  
                
                if (isset($_POST['alitas']) && $_POST['alitas']!="") {
                    echo "Alitas - ".$_POST['alitas']." €<br>";
                    $suma = $suma + $_POST['alitas'];
                }  
                
                if (isset($_POST['carbonara']) && $_POST['carbonara']!="") {
                    echo "Pizza Carbonara - ".$_POST['carbonara']." €<br>";
                    $suma = $suma + $_POST['carbonara'];
                }  
                
                if (isset($_POST['ranchera']) && $_POST['ranchera']!="") {
                    echo "Pizza ranchera - ".$_POST['ranchera']." €<br>";
                    $suma = $suma + $_POST['ranchera'];
                }  
                
                if (isset($_POST['taco']) && $_POST['taco']!="") {
                    echo "Pizza taco - ".$_POST['taco']." €<br>";
                    $suma = $suma + $_POST['taco'];
                }  
                
                if (isset($_POST['trufa']) && $_POST['trufa']!="") {
                    echo "Tarta trufa - ".$_POST['trufa']." €<br>";
                    $suma = $suma + $_POST['trufa'];
                }  
                
                if (isset($_POST['helados']) && $_POST['helados']!="") {
                    echo "Helados variados - ".$_POST['helados']." €<br>";
                    $suma = $suma + $_POST['helados'];
                }  

                echo "El importe total del pedido es ".$suma." €\n"; 
             
            } else {
                echo "Ha habido un error con tu pedido. Te faltan datos o no has pedido nada.\n";
            } 
        
             

        

        } else {
            
        } 

        

?>