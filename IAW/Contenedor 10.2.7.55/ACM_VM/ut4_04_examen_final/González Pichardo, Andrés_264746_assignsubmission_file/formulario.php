<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
        <form action="resultados.php" method="post">
            <div class="field">
                <label for="nombre">Empresa</label>
                <input type="text" id="nombre" name="nombre">
            </div>
            <div class="field">
                <label for="cif">CIF</label>
                <input type="text" id="cif" name="cif" value="<?php echo htmlspecialchars($_COOKIE['cif']); ?>">
            </div>
            <div class="field">
                <label for="ip4">IPv4</label>
                <input type="text" id="ip4" name="ip4">
            </div>
            <div class="field">
                <label for="ip6">IPv6</label>
                <input type="text" id="ip6" name="ip6">
            </div>
            <div class="field">
                <label for="reno4">Fecha de renovacion IPv4</label>
                <input type="date" id="reno4" name="reno4">
            </div>
            <div class="field">
                <label for="reno6">Fecha de renovacion IPv6</label>
                <input type="date" id="reno6" name="reno6">
            </div>
            <div class="field">
                <input type="submit" value="Enviar">
            </div>
        </form>

<p><a href="salir.php">Cerrar sesión</a></p>
</body>

<?php

session_start();


if ( !isset($_SESSION['misesion']) && !isset($_SESSION['usuario'])){
    header("Location: inicio.php");

}


?>


</html>