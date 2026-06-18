<?php

$salario = 0;
$salarioAnual = $_POST["salario_bruto"];
$numPagas = $_POST["pagas"];
$estadoCivil = $_POST["estado_civil"];
$hijos = $_POST["hijos"];

if ( empty($_POST["salario_bruto"]) AND empty($_POST["salario_bruto"]) AND empty($_POST["estado_civil"]) AND empty($_POST["hijos"]) ){
    echo "<h1>Faltan datos.</h1>";
}else{
    if ($estadoCivil == "casado"){
        $netoAnual = $salarioAnual - ($hijos * 1000);
    }
    if ($salarioAnual < 12000){
        $irpf = $salarioAnual * 0.15;
    }elseif ($salarioAnual >= 12001 and $salarioAnual <= 24000) {
        $irpf = $salarioAnual * 0.20;
    }elseif($salarioAnual >= 24001){
        $irpf = $salarioAnual * 0.25;        
    }
    }

    $netoAnual = ($salarioAnual - $irpf);
    echo "<h1>El neto anual es: ".$netoAnual."€</h1>";
    $netoMensual = $netoAnual / $numPagas;
    echo "<h1>El salario mensual neto es: ".number_format((float)$netoMensual, 2, '.', '')."€</h1>";



?>