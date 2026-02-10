<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de control</title>
</head>
<body>
    <p>
    <?php
        session_start();
        if(isset($_POST['nombre']) && $_POST['nombre']!=""){
            $_SESSION['nombre'] = $_POST['nombre'];
            echo "Bienvenido, has iniciado sesión como: <b>".$_POST['nombre']."</b><br/>";
            echo "<a href='cerrar_sesion.php'>Cerrar sesión</a>";
        } else {
            if (isset($_SESSION['nombre']) && $_SESSION['nombre']!="") {
                echo "Tienes una sesión iniciada como: <b>".$_SESSION['nombre']."</b><br/>";
                echo "<a href='cerrar_sesion.php'>Cerrar sesión</a>";
            } else {
                echo "Acceso restringido. Tienes que iniciar sesión.<br/>";
                echo "<a href='login.php'>Iniciar sesión</a>";
            }
        }    
    ?>
    </p>
</body>
</html>