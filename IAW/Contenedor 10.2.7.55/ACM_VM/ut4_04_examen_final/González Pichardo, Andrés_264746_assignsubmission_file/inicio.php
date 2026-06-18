<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Simple</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; padding-top: 50px; }
        form { border: 1px solid #ccc; padding: 20px; border-radius: 8px; width: 300px; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0056b3; }
    </style>
</head>
<body>

    <form action="login.php" method="POST">
        <h2>Iniciar Sesión</h2>
        
        <div>
            <label for="correo">Correo:</label>
            <input type="text" id="correo" name="correo" required >
        </div>

        <div>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>
    <?php
    session_start();

    if (isset($_SESSION['error']) && $_SESSION['error']==true){
        echo "<span style='color:red;'> Usuario/contraseña incorrectos.</span>";
    }


    ?>


</body>
</html>