<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-size: 14px;
        }

        /* Estilos específicos para inputs de texto y contraseña */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* --- NUEVO: Estilos para la opción de Recordar --- */
        .remember-me {
            display: flex;
            align-items: center; /* Alinea verticalmente checkbox y texto */
            margin-bottom: 20px;
            font-size: 14px;
            color: #555;
        }

        .remember-me input {
            margin-right: 8px; /* Espacio entre la cajita y el texto */
            width: auto; /* Evita que se estire al 100% como los otros */
            cursor: pointer;
        }

        .remember-me label {
            margin-bottom: 0; /* Quita el margen inferior por defecto */
            display: inline; /* Hace que se comporte como texto seguido */
            cursor: pointer; /* Mano al pasar por encima del texto */
        }
        /* ------------------------------------------------ */

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        

        <form action="acceso.php" method="POST">
            
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" placeholder="Tu nombre de usuario" value="<?php echo htmlspecialchars($_COOKIE['recordar']); ?>" >

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Tu contraseña" >

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Recordar usuario</label>
            </div>

            <button type="submit">Entrar</button>
            
        </form>
    </div>
<?php
session_start();
require_once 'comunes.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    fValidaAcceso($_POST['username'], $_POST['password'], $_POST['remember']);
}


if (isset($_SESSION['error'])) {
    echo "<h1>".$error_codes[$_SESSION['error']]."</h1>";
    unset($_SESSION['error']); 
}
?>



</body>
</html>








