<!DOCTYPE html>
<html>
<head>
    <title>Calculadora PHP</title>
</head>
<body>

<h2>Calculadora</h2>

<form method="post" action="calcular.php">
    Operando 1:
    <input type="number" name="n1" required><br><br>

    Operacion (+, -, *, /):
    <input type="text" name="tipo" required><br><br>

    Operando 2:
    <input type="number" name="n2" required><br><br>

    <input type="submit" value="Calcular">
</form>

</body>
</html>
