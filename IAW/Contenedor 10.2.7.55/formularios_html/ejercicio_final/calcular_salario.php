<?php

// Comprobar que todos los datos han sido informados.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lista de campos requeridos: creamos un array para despues pasarlo por el foreach
    // Iterar sobre cada campo (clave => valor) del array $_POST
    foreach ($_POST as $nombre_campo => $valor_campo) {
        if (empty($valor_limpio)) {
            $datos_existen = false;
        } if (!$datos_existen) { break; }
    }

    // Recoger y sanitizar los datos
    $salario_bruto = (float)$_POST['salario_bruto'];
    $estado_civil = strtolower(trim($_POST['estado_civil']));
    $num_pagas = (int)$_POST['num_pagas'];
    $num_hijos = (int)$_POST['num_hijos'];

    // Validación de valores numéricos
    if ($salario_bruto < 0) {
        mostrarError("El Salario Bruto Anual no puede ser negativo.");
    }
    if ($num_pagas < 1 || $num_hijos < 0) {
        mostrarError("El número de pagas y el número de hijos deben ser valores válidos (mayor o igual a cero).");
    }

    // Inicializamos el salario bruto para el cálculo de IRPF
    
    $salario_base_irpf = $salario_bruto;
    $irpf_porcentaje = 0;
    $reduccion_aplicada = 0;
    
    // 2. ESCENARIO 1: Casado con hijos menores de 25
    if ($estado_civil === 'casado' && $num_hijos > 0) {
        // Multiplicar por 1000 € el número de hijos y restar al salario bruto
        $reduccion_aplicada = $num_hijos * 1000;
        $salario_base_irpf = $salario_bruto - $reduccion_aplicada;

        // Asegurar que el salario base para IRPF no sea negativo
        if ($salario_base_irpf < 0) {
            $salario_base_irpf = 0;
        }
    }
    // ESCENARIO 2: El resto (el salario_base_irpf ya es igual al salario_bruto)

    // 3. CÁLCULO DEL % DE IRPF (se aplica sobre $salario_base_irpf)

    if ($salario_base_irpf >= 0 && $salario_base_irpf <= 12000) {
        $irpf_porcentaje = 0.15; // 15%
    } elseif ($salario_base_irpf >= 12001 && $salario_base_irpf <= 24000) {
        $irpf_porcentaje = 0.20; // 20%
    } elseif ($salario_base_irpf > 24001) {
        $irpf_porcentaje = 0.25; // 25%
    }
    
    /*
    // Si el salario está justo entre los límites (por ejemplo, 12000.5 o 24000.5), lo tratamos como parte del tramo superior
    // Esto es más seguro ya que las condiciones están definidas con rangos enteros (0-12000, 12001-24000, >24001)
    if ($salario_base_irpf > 12000 && $salario_base_irpf < 12001) {
        $irpf_porcentaje = 0.20;
    } elseif ($salario_base_irpf > 24000 && $salario_base_irpf < 24001) {
        $irpf_porcentaje = 0.25;
    }
    */

    // Cálculo del IRPF (descuento)
    $descuento_irpf = $salario_base_irpf * $irpf_porcentaje;

    // Cálculo del Salario Neto Anual
    $salario_neto_anual = $salario_base_irpf - $descuento_irpf;
    
    // 4. CÁLCULO DEL SALARIO NETO MENSUAL
    $salario_neto_mensual = $salario_neto_anual / $num_pagas;
    
    // Formatear el resultado a dos decimales
    $salario_neto_mensual_formato = number_format($salario_neto_mensual, 2, ',', '.');
    
} else {
    // Si alguien accede directamente al archivo PHP sin POST
    mostrarError("Acceso no autorizado. Por favor, utilice el formulario de entrada.");
}
    
    // --- DISEÑO DE LA PÁGINA WEB DE RESPUESTA (sin estilo) ---
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Cálculo</title>
</head>
<body>

    <div>
        <h1>
            ¡Cálculo Completado!
        </h1>

        <div>
            <h2>Resumen del Cálculo:</h2>
            <p>Salario Bruto Anual Inicial: <span><?php echo number_format($salario_bruto, 2, ',', '.'); ?> €</span></p>
            <p>Reducción por Hijos/Estado Civil: <span>- <?php echo number_format($reduccion_aplicada, 2, ',', '.'); ?> €</span></p>
            <p>Salario Base IRPF: <span><?php echo number_format($salario_base_irpf, 2, ',', '.'); ?> €</span></p>
            <p>IRPF Aplicado: <span><?php echo ($irpf_porcentaje * 100); ?>%</span></p>
            <p>Descuento Total IRPF: <span>- <?php echo number_format($descuento_irpf, 2, ',', '.'); ?> €</span></p>
            <p>Salario Neto Anual: <span><?php echo number_format($salario_neto_anual, 2, ',', '.'); ?> €</span></p>
        </div>

        <div>
            <p>Su Salario Neto Mensual es:</p>
            <p>
                <?php echo $salario_neto_mensual_formato; ?> €
            </p>
        </div>
        
        <a href="ejerciciofinal02.html"> Realizar un Nuevo Cálculo </a>

    </div>

</body>
</html>
<?php

?>