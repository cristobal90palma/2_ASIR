<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 32 - Tema 4</title>
</head>
<body>
    <h1>Ejercicio 32 - Tema 4</h1>
    <form action="validaciones.php" method="POST">
    
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre">
            
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

        <input type="submit" value="Enviar tus datos" />





    </form>
</body>
</html>












<?php
?>