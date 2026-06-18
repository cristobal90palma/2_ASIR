<?php


// Funciones
function sumar($n1, $n2) { return $n1 + $n2; }
function restar($n1, $n2) { return $n1 - $n2; }
function multiplicar($n1, $n2) { return $n1 * $n2; }
function dividir($n1, $n2) {
    if ($n2 == 0) return null;
    return $n1 / $n2;
}

$resultado = "";
$error = "";

// Comprobar envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $op1 = $_POST['n1'];
    $op2 = $_POST['n2'];
    $operacion = $_POST['tipo'];

    // Validar enteros: https://www.php.net/manual/en/function.filter-var.php y https://www.php.net/manual/en/filter.constants.php
    //funcion filter_var(variable a filtrar, especificador) === que sea falso, es decir, no sea un entero.
    if (filter_var($op1, FILTER_VALIDATE_INT) === false || filter_var($op2, FILTER_VALIDATE_INT) === false) {
    
        $error = "Por favor, introduce números enteros válidos.";
    
    } else {

        switch ($operacion) {
            case '+':
                $resultado = sumar($op1, $op2);
                break;
            case '-':
                $resultado = restar($op1, $op2);
                break;
            case '*':
                $resultado = multiplicar($op1, $op2);
                break;
            case '/':
                $resultado = dividir($op1, $op2);
                if ($resultado === null) {
                    $error = "Error: división por cero.";
                }
                break;
            default:
                $error = "La operación es incorrecta.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
</head>
<body>

<h2>Resultado</h2>

<?php
//"Si la variable $resultado no está vacía O la variable $error no está vacía, entonces ejecuta el código siguiente".
if ($resultado !== "" || $error !== "") {
    //Si se cumple la condición anterior, el código "dibuja" un cuadro en la página 
    echo '<div style="border:1px solid black; padding:10px; width:250px;">';

    if ($error) {
        echo '<p>' . htmlspecialchars($error) . '</p>';
    } else {
        echo '<p>Operación: ' . htmlspecialchars($operacion) . '</p>';
        echo '<p>Operando 1: ' . $op1 . '</p>';
        echo '<p>Operando 2: ' . $op2 . '</p>';
        echo '<p>Resultado: ' . $resultado . '</p>';
    }

    echo '</div>';
}
?>

<br>
<a href="index.php">Volver</a>

</body>
</html>
