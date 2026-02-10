<?php
// Iniciar sesión. Esta es la primera "página".
session_start();

// Importar las funciones de "comunes.php"
require_once 'comunes.php';

// Una vez que se ha pulsado el botón de enviar (POST), aquí se recepcionan los datos del formulario.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $cookie_usuario  = $_POST['cookie_usuario']; // Puede ser NULL u "on"

    // Llamamos a la función de validación que está en "comunes.php"
    fValidaAcceso($usuario, $password, $cookie_usuario);
}

// Miramos si existe la cookie para poner el nombre en el input del formulario.
$usuario_cookie_existente = "";
if (isset($_COOKIE['recuerda'])) {
    $usuario_cookie_existente = $_COOKIE['recuerda'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso al Sistema</title>
</head>
<body>

        <fieldset style="width: 350px; padding: 20px;">

            <form action="acceso.php" method="POST">
                <p>
                    <label for="usuario">USUARIO:</label><br>
                    <input type="text" id="usuario" name="usuario" value="<?php echo $usuario_cookie_existente; ?>">
                </p>
                <p>Ejemplo: cristobal</p>

                <p>
                    <label for="password">PASSWORD:</label><br>
                    <input type="password" id="password" name="password">
                </p>
                <p>Ejemplo: 12345</p>
                <p>
                    <input type="checkbox" id="cookie_usuario" name="cookie_usuario"> 
                    <label for="cookie_usuario">Recordar usuario</label>
                </p>

                <p>
                    <button type="submit">Validar</button>
                </p>
            </form>

            <?php
            // Mostrar mensajes de error si existen en la sesión

            if (isset($_SESSION['error'])) {
                
                if ($_SESSION['error'] == 0) {
                    echo "<p style='color:red;'>Debes rellenar todos los campos.</p>";
                } 
                elseif ($_SESSION['error'] == 1) {
                    echo "<p style='color:red;'>El usuario no existe.</p>";
                } 
                elseif ($_SESSION['error'] == 2) {
                    echo "<p style='color:red;'>La contraseña es incorrecta.</p>";
                }

                // Borramos el error de la "maleta" (sesión)
                unset($_SESSION['error']);
            }
        ?>
        </fieldset>

</body>
</html>