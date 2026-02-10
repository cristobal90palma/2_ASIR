<?php
#numeros del 1 al 100 mostrados con coma de por medio

echo "Numeros del 1 al 100\n";

for ($i=1; $i<=100; $i++){
    if ($i<100){
        echo $i. ", ";
    }   else {
        echo $i. "\n";
    }
    
}


?>