<?php
session_start();

// Si no hay sesión, redirigimos al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Guardamos las COOKIES que vienen de vuelta de validaciones.php. 
// Así se autorrellenan si el usuario quiere volver a esta página.
// Fijate en el atributo "value" en nombre de la empresa.
$cif_guardado = $_COOKIE['cif'];



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del cliente</title>
</head>
<body>
    <h1>Datos del Cliente</h1>
    <form action="validaciones.php" method="POST">
        <p>
            <label for="nombre">Nombre de la empresa:</label>
            <input type="text" id="nombre_empresa" name="nombre_empresa" placeholder="Escribe el nombre de la empresa">
        </p>
        <p>
            <label for="cif">CIF empresa:</label>
            <input type="text" id="cif" name="cif" placeholder="Escribe el CIF de la empresa" value="<?php echo htmlspecialchars($cif_guardado); ?>">
        </p>
        <p>
            <label for="ipv4_publica">IPv4 Pública:</label>
            <input type="text" id="ipv4_publica" name="ipv4_publica" placeholder="Escribe la IPv4 Pública">
        </p>
        <p>
            <label for="ipv6_global">IPv6 Global:</label>
            <input type="text" id="ipv6_global" name="ipv6_global" placeholder="Escribe la IPv6 Global">
        </p>
        <p>
            <label for="fecha_renovacion_ipv4">Fecha de renovación de IPv4 :</label>
            <input type="date" id="fecha_renovacion_ipv4" name="fecha_renovacion_ipv4">
        </p>
        <p>
            <label for="fecha_renovacion_ipv6">Fecha de renovación de IPv6 :</label>
            <input type="date" id="fecha_renovacion_ipv6" name="fecha_renovacion_ipv6">
        </p>

        <input type="submit" value="Enviar tus datos">
    </form>

    <?php //Para mostrar el usuario y redirigirlo a logout para que cierre sesión 
    ?>

    <p>
    Usuario: <strong><?php echo $_SESSION['usuario']; ?></strong>
    | <a href="logout.php">Cerrar sesión</a>
    </p>

</body>
</html>