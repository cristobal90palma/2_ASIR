<?php
#De un mes del año en número devuelve el nombre

echo "Dame un mes del año (1-12): ";
$mes_num = rtrim(fgets(STDIN));

switch ($mes_num) {
    case "1":
        echo "Enero\n";
        break;
    default:
        echo "Número incorrecto. No se corresponde con ningún mes.\n";
}

?>