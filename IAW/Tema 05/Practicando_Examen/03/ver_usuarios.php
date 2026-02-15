<?php
    include_once "bbdd.php";
    
    //session_start();

    // Protección de sesión
    /*
    if(!isset($_SESSION['user']) || $_SESSION['user'] == ""){
        header("Location: acceso.php");
        exit();
    }
    */

    try {
        $conexion = mysqli_connect($servidor, $user, $password, $bd);

        // Seleccionamos solo username (la columna password no se muestra por seguridad)
        $sql = "SELECT username FROM usuario"; 
        $resultado_sql = mysqli_query($conexion, $sql);
        
        $usuarios = mysqli_fetch_all($resultado_sql, MYSQLI_ASSOC);

        // Cerramos la conexión después de obtener los datos
        mysqli_close($conexion);

        echo "<h2>Listado de Usuarios Registrados</h2>";
        
        echo "<table border='1' style='border-collapse: collapse; width: 30%; text-align: center;'>";
        echo "<tr style='background-color: #eee;'>";
        echo "<th>NOMBRE DE USUARIO</th>";
        echo "</tr>";

        foreach($usuarios as $usuario){
            echo "<tr>";
            // Usamos el nombre exacto de la columna en tu tabla: 'username'
            echo "<td>" . $usuario['username'] . "</td>";
            echo "</tr>";
        }

        echo "</table><br/>";

        echo "<a href='acceso.php'>ACCESO</a><br/><br/>";
        

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    mysqli_close($conexion);
?>