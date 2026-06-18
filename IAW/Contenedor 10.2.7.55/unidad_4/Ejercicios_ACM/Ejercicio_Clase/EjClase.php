<?php

/*
Crea un formulario con cinco campos (nombre, apellidos, Dni, direccion, telefono), que realiza la validacion de esos campos mediante un función diferente para cada uno de ellos)
Cada funcion debe devolver un mensaje de error (si lo hubiera) o la cadena vacia si no hay errores
1. Nombre: Obligatorio y tamaña 30 como maximo
2, Apellido obligatorio y tamañao 50 como maximo.
3. Dni Obligatorio y tamaño 9 
4. Direccion Obligatorio y tamañoo 100 como maixmo
5. Telefono Obligatorio y tamaño 9. Solo numeros


Debes usar return para pintar el resultado.

ESTE PODRÍA HABER SIDO UN HTML

*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio Clase - Funciones y Return</title>
</head>
<body>
    
        <h1>Ejercicio Clase - Funciones y Return</h1>
        <h1>Tus datos</h1>
        <form action="funciones.php" method="POST">
        <p>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre">
            
        </p>

                <p>
            <label for="nombre">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" placeholder="Escribe tus apellidos">
            
        </p>

                <p>
            <label for="nombre">DNI:</label>
            <input type="text" id="dni" name="dni" placeholder="Escribe tu DNI">
            
        </p>

                <p>
            <label for="nombre">Dirección:</label>
            <input type="text" id="direccion" name="direccion" placeholder="Escribe tu direccion">
            
        </p>

                <p>
            <label for="nombre">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" placeholder="Escribe tu teléfono">
            
        </p>


        <input type="submit" value="Enviar" />
        </form>



</body>
</html>








<?php
?>