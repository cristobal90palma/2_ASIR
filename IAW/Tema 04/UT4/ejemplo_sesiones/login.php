<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejemplo sesiones</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['nombre']) && $_SESSION['nombre']!=""){
            // Hay una sesión abierta
            echo "<p>Has iniciado sesión como: ".$_SESSION['nombre']."</p>";
            echo "<p><a href='cerrar_sesion.php'>Cerrar sesión</a></p>";
        } else {
            //
            ?>
            <form action="panel_control.php" method="POST">
                <label>Nombre: </label>
                <input type="text" name="nombre" placeholder="Ingrese aquí su nombre"/>
                <input type="submit" value="Iniciar sesión"/>
            </form>
            <?php
        }
    ?>
</body>
</html>