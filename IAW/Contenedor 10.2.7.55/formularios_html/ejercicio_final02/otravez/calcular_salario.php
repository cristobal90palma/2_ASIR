<?php


$salario_bruto_anual = $_POST["salario_bruto_anual"];
$estado_civil = $_POST["estado_civil"];
$num_hijos = $_POST["num_hijos"];
$num_pagas = $_POST["num_pagas"];
$irpf = 0.00;
$salario_NETO_anual = $salario_bruto_anual; // Inicializamos el neto anual con el bruto



if (empty($_POST["salario_bruto_anual"]) AND empty($_POST["estado_civil"]) AND empty($_POST["num_hijos"]) AND empty($_POST["num_pagas"])) {
    echo "<h1>Tienes que meter algún dato.</h1>";
} else {
    if ($estado_civil == "casado" && $num_hijos > 0) {
        $salario_bruto_anual = $salario_bruto_anual - ($num_hijos * 1000);
    } 



   if ($salario_bruto_anual <= 12000) {
    $salario_NETO_anual = $salario_bruto_anual * 0.85;
   } elseif ($salario_bruto_anual >= 12001 AND $salario_bruto_anual <= 24000) {
    $salario_NETO_anual = $salario_bruto_anual * 0.80;
   } elseif ($salario_bruto_anual >= 24001) {
    $salario_NETO_anual = $salario_bruto_anual * 0.75;
   }
}


echo "<h1>Su salario neto mensual es ".number_format((float)$salario_NETO_anual, 2, '.', '')."€</h1>";

$salario_NETO_mensual = $salario_NETO_anual / $num_pagas;
echo "<h1>Su salario neto mensual es ".number_format((float)$salario_NETO_mensual, 2, '.', '')."€</h1>";


?>