<?php
session_start();

// Si no hay sesión, redirigimos al login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Guardamos las COOKIES que vienen de vuelta de validaciones.php. 
// Así se autorrellenan si el usuario quiere volver a esta página.
// Fijate en el atributo "value" en nombre y matrícula, así conseguimos que se autorrellenen.
$nombreGuardado = $_COOKIE['nombre_cliente'];
$matriculaGuardada = $_COOKIE['matricula_cliente'];
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
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre" value="<?php echo htmlspecialchars($nombreGuardado); ?>">
        </p>
        <p>
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellido" placeholder="Escribe tus apellidos">
        </p>
        <p>
            <label for="nif">NIF:</label>
            <input type="text" id="nif" name="nif" placeholder="Escribe tu NIF">
        </p>
        <p>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" placeholder="Escribe tu teléfono">
        </p>
        <p>
            <label for="matricula">Matrícula:</label>
            <input type="text" id="matricula" name="matricula" placeholder="Escribe tu Matrícula" value="<?php echo htmlspecialchars($matriculaGuardada); ?>">
        </p>
        <p>
            <label for="bastidor">Bastidor:</label>
            <input type="text" id="bastidor" name="bastidor" placeholder="Escribe tu bastidor">
        </p>
        <p>
            <label for="fecha_matricula">Fecha de Matriculación:</label>
            <input type="date" id="fecha_matricula" name="fecha_matricula">
        </p>

        <input type="submit" value="Enviar tus datos">
    </form>

    <?php //Para mostrar el usuario y redirigirlo a logout para que cierre sesión 
    ?>

    <p>
    Usuario: <strong><?php echo $_SESSION['usuario']; ?></strong>
    | <a href="logout.php">Cerrar sesión</a>
    </p>

    <p>
    <a href="borrar_cookies.php"
    
    <?php //Esto del "onclick" no lo conocía https://www.w3schools.com/jsref/event_onclick.asp
    ?>
       onclick="return confirm('¿Seguro que quieres borrar los datos guardados?');">
       Borrar datos guardados - COOKIES
    </a>
    </p>
</body>
</html>