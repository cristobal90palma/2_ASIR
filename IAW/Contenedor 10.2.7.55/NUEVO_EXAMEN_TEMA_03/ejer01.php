<?php

    echo "Ingrese la cantidad del préstamo: ";
    $prestamo = rtrim(fgets(STDIN));

    echo "Ingrese el número de meses: ";
    $meses = rtrim(fgets(STDIN));

    echo "Ingrese el tipo de cliente (A, B o C): ";
    $tipo_cliente = rtrim(fgets(STDIN));

    if ($prestamo > 99999) {
        echo "Error: el préstamo no puede sobrepasar los 99.999 €.\n";
        exit;
    } 
     if ($meses < 10 or $meses > 100) {
        echo "Error: los meses deben ser como mínimo 10 y como máximo 100.\n";
        exit;
     }

     $tasa_interes_mensual = 0;

     switch ($tipo_cliente) {
        case 'A':
            $tasa_interes_mensual = 1.5;
            break;
        case 'B':
            $tasa_interes_mensual = 2.0;
            break;
        case 'C':
            $tasa_interes_mensual = 2.5;
            break;
        default:
            echo "Error: no has elegido un tipo de cliente correcto.\n";
            exit;
     }


     $capital_pendiente = 0;
     $capital_pagado= 0;
     $interes_pagado = 0;
     $cuota_total = 0;

     $capital_pendiente = $prestamo - $capital_pagado;
     $capital_pagado = $prestamo / $meses;
     $interes_pagado = $capital_pendiente * $tasa_interes_mensual;
     $cuota_total = $interes_pagado + $capital_pagado;

     echo "Tabla de Amortización.\n";
     echo "Mes | Interés | Capital | Total | Pendiende\n";
     
     foreach ($variable as $key => $value) {
        # code...
     }

     /*
     echo ".$capital_pendiente.";
      echo ".$capital_pagado.";
       echo ".$interes_pagado.";
        echo ".$cuota_total.";
     */

 





?>