<?php
    include_once "users.php";
    if (fValidaSesion() == 0) {
        header("Location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Apartado B</title>
        </head>
        <body>
            <h2>Formulario de Direcciones IP</h2>
            <form method="post" action="validación.php">
                <label>Nombre_Empresa:</label><br>
                <input type="text" name="nombre" required><br><br>
                <label>CIF_Empresa:</label><br>
                <input type="text" name="cif" required><br><br>
                <label>IP_pública_versión_4:</label><br>
                <input type="text" name="ipv4" required><br><br>
                <label>IP_global_versión_6</label><br>
                <input type="text" name="ipv6" required><br><br>
                <label>Fecha_renovación_IPv4</label><br>
                <input type="text" name="ipv4fr" required><br><br>
                <label>Fecha_renovación_IPv6</label><br>
                <input type="text" name="ipv6fr" required><br><br>
                <input type="submit" value="Enviar">
            </form>
            <br>
            <?php
                if (!empty($errores)) {
                    echo $errores;
                }
            ?>
        </body>
    </html>
