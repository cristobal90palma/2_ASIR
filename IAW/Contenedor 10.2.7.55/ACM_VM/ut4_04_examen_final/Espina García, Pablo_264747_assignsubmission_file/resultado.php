<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
</head>
<body>
    <p>
        <?php
        session_start();
        if(isset($_POST["correo"]) && $_POST["correo"]!= ""){
            $_SESSION["correo"] = $_POST["correo"];
            echo "Bienvenido , has iniciado sesión como: <b>".$_POST["correo"]."</b></br>";
            echo "<a href='cerrar_sesion.php'>Cerrar Sesión</a>";
        } else {
             if (isset($_SESSION['correo']) && $_SESSION['correo']!="") {
                echo "Tienes una sesión iniciada como: <b>".$_SESSION['correo']."</b><br/>";
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