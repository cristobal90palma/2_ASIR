<?php


// Funciones
function sumar($n1, $n2) { return $n1 + $n2; }
function restar($n1, $n2) { return $n1 - $n2; }
function multiplicar($n1, $n2) { return $n1 * $n2; }
function dividir($n1, $n2) {
    if ($n1 <= 0 || $n2 <= 0) return null;
    return $n1 / $n2;
}

$resultado = "";
$error = "";

// Comprobar envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $op1 = $_POST['n1'];
    $op2 = $_POST['n2'];
    $operacion = $_POST['tipo'];

    // Validar enteros
    if (
        filter_var($op1, FILTER_VALIDATE_INT) === false ||
        filter_var($op2, FILTER_VALIDATE_INT) === false
    ) {
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
                    $error = "Error: Ambos números deben ser mayores que 0.";
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
if ($resultado !== "" || $error !== "") {
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
<a href="index_01.php">Volver</a>

</body>
</html>
