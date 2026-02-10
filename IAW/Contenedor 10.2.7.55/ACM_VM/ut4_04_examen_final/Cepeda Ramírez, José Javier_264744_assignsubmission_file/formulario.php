<!DOCTYPE html>
<!--apartado "b" formulario con (nombre de la empresa, CIF, IP publica versión 4, IP global versión 6, fecha renovación IPv4, fecha de renovación IPv6)-->
<html lang="es">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Examen</title>
</head>
<body>

<?php
include_once("validaciones2.php");

$empresa = "";
$cif = "";
$ip4 = "";
$ip6 = "";
$fecha4 = "";
$fecha6 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa = $_POST['empresa'];
    $cif = $_POST['cif'];
    $ip4 = $_POST['ip4'];
    $ip6 = $_POST['ip6'];
    $fecha4 = $_POST['fecha4'];
    $fecha6 = $_POST['fecha6'];

    $errores = fValidaFormulario($empresa, $cif, $ip4, $ip6, $fecha4, $fecha6);

    if ($errores == "") {
        echo "<p style='color:green;'><b>Formulario enviado correctamente.</b></p>";
        echo "<p><b>Empresa:</b> ".$empresa."</p>";
        echo "<p><b>CIF:</b> ".strtoupper($cif)."</p>";
        echo "<p><b>IP v4:</b> ".$ip4."</p>";
        echo "<p><b>IP v6:</b> ".$ip6."</p>";
        echo "<p><b>Fecha renovación IPv4:</b> ".$fecha4."</p>";
        echo "<p><b>Fecha renovación IPv6:</b> ".$fecha6."</p>";
    } else {
        echo $errores;
    }
}
?>
<h2>Formulario Examen</h2>

<form action="formulario.php" method="POST">
    <p>
        <label>Nombre de la empresa:</label><br>
        <input type="text" name="empresa" value="<?php echo $empresa; ?>">
    </p>

    <p>
        <label>CIF:</label><br>
        <input type="text" name="cif" value="<?php echo $cif; ?>">
    </p>

    <p>
        <label>IP pública versión 4:</label><br>
        <input type="text" name="ip4" value="<?php echo $ip4; ?>">
    </p>

    <p>
        <label>IP global versión 6:</label><br>
        <input type="text" name="ip6" value="<?php echo $ip6; ?>">
    </p>

    <p>
        <label>Fecha renovación IPv4 (MM-DD-AAAA):</label><br>
        <input type="text" name="fecha4" value="<?php echo $fecha4; ?>">
    </p>

    <p>
        <label>Fecha renovación IPv6 (MM-DD-AAAA):</label><br>
        <input type="text" name="fecha6" value="<?php echo $fecha6; ?>">
    </p>

    <p>
        <input type="submit" value="Enviar">
    </p>

</form>
</body>
</html>
