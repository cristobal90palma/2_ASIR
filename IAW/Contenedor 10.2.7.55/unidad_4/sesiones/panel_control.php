<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control</title>
</head>
<body>
    <h2>La sesión creada correctamente</h2>
        <p>
        <?php
        session_start(); //esto es vital. Si no, no funciona lo demás.
            if(isset($_POST['nombre']) && $_POST['nombre'] != "") {
                $_SESSION['nombre'] = $_POST['nombre'];
                echo "Bienvenido, has iniciado sesión como: <b>".$_POST['nombre']."</b>";
                echo "<a href='cerrar_sesion.php'>Cerrar Sesión</a>";
            } else {
                if(isset($_SESSION['nombre']) && $_SESSION['nombre'] != "") {
                    echo "Tienes una sesión abierta como: <b>".$_SESSION['nombre']."</b>";
                    echo "<a href='cerrar_sesion.php'>Cerrar Sesión</a>";
                } else {
                    echo "Acceso restringido. Tienes que iniciar sesión.</b>";
                    echo "<a href='login.php'>Iniciar Sesión</a>";
                }
            }

        ?>
        </p>
</body>
</html>