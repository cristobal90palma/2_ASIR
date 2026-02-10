<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sesión Cerrada</title>
    </head>
<body>

<fieldset style="width: 300px; padding: 20px;">

    <?php
    session_start();
    require_once 'comunes.php';

    if (fValidaSesion() == 1) {
        $usuario = $_SESSION['usuario']; 
        $fecha_inicio_sesion = date('d/m/Y H:i', $_SESSION['inicio']); //Transforma el valor de $_SESSION['inicio'] a un format que podemos entender.
        $fecha_fin_sesion = date('d/m/Y H:i'); //Crea una fecha con el momento actual

        echo "<h1>Sesión cerrada</h1>"; 
        echo "<p>Se ha cerrado la sesión para el usuario: <strong>$usuario</strong></p>"; 
        echo "<p>Fecha inicio: $fecha_inicio_sesion</p>"; 
        echo "<p>Fecha fin: $fecha_fin_sesion</p>"; 
        echo "<a href='acceso.php'>Acceso principal</a>";

        // Destruir la sesión completamente. https://stackoverflow.com/questions/4303311/what-is-the-difference-between-session-unset-and-session-destroy-in-php
        $_SESSION = array(); // Sería un equivalente de hacer session_unset a cada uno de los valores guardados.
                            // Borra todas las variables que habíamos guardado (usuario, inicio, etc.) dentro del servidor.
        session_destroy(); // destroys the session data that is stored in the session storage (e.g. the session file in the file system).
    } else {
        header("Location: acceso.php");
        exit();
    }
    ?>


</fieldset>
</body>
</html>