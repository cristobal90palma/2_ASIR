<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo sesiones</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['correo']) && $_SESSION['correo']!=""){
            echo "<p>Has iniciado sesión como: ".$_SESSION['correo']."</p>";
            echo "<p><a href='cerrar_sesion.php'>Cerrar sesión</a></p>";
        } else {
            ?>
            <form action="formulariobueno.php" method="POST">
                <label>Correo: </label>
                <input type="text" name="correo" placeholder="Ingrese aquí su correo electrónico"<?= $recuerdo ?>/><br><br>

                <label>Password: </label>
                <input type="password" name="password" placeholder="Ingrese aquí su contraseña"/><br><br>

                <input type="submit" value="Iniciar sesión"/>
            </form>
            <?php
        }
        function fValidaSesion() {
    if (isset($_SESSION["correo"])) {
        return 1;
    }
    return 0;
}
?>
</body>
</html>