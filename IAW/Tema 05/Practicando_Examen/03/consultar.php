<?php

	include_once "bbdd.php";
    session_start();

	try {

        // Comprobar valores de sesión
        if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
            exit();
        }

        // Conexion con BBDD
        $conexion = mysqli_connect($servidor, $user, $password, $bd);

        // Se hace un select para ver en la tabla averia3 aquellas filas cuyo 
        // username sean igual que el del usuario de la sesión.
        $sql = "select * from averia3 where username='".$_SESSION['user']."'";
        $resultado_sql = mysqli_query($conexion, $sql);
        $averias = mysqli_fetch_all($resultado_sql, MYSQLI_ASSOC);

        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr>";
        echo "<td>NUM PARTE</td>";
        echo "<td>NOMBRE</td>";
        echo "<td>APELLIDOS</td>";
        echo "<td>MODELO PC</td>";
        echo "<td>ERROR</td>";
        echo "<td>OBSERVACIONES</td>";
        echo "<td>USUARIO SESIÓN</td>";
        echo "<td>ACCIONES</td>";
        echo "</tr>";

        /*
        - El primer foreach: Crea una nueva fila (<tr>) para cada avería encontrada.
        - El segundo foreach (anidado): Recorre cada columna de esa avería ($dato) y 
        la mete en una celda (<td>). Esto evita tener que escribir echo $averia['nombre'], 
        echo $averia['apellidos'], etc., uno por uno.
        */

        foreach($averias as $averia){
            echo "<tr>";
            foreach ($averia as $columna => $dato){
                echo "<td>".$dato."</td>";
            }
            // Columna ACCIONES. Para identificar cuando se manda a eliminar.php o actualizar.php,
            // se usa el valor de nparte de averia.
            echo 
            "<td><a href='eliminar.php?nparte=".$averia['nparte']."' onclick=\"return confirm('¿Seguro que deseas eliminar este pedido?')\">Eliminar</a> |
             <a href='actualizar.php?nparte=".$averia['nparte']."'>Actualizar</a>
             </td>";
            echo "</tr>";
        }

        
        /* MODELO MANUAL. TIENES QUE REAJUSTAR LOS TÍTULOS DE LAS COLUMNAS DE LAS TABLAS:
        foreach($averias as $averia) {
         echo "<tr>";
                // Aquí eliges tú el orden y cuáles mostrar
                echo "<td>" . $averia['nparte'] . "</td>";
                echo "<td>" . $averia['username'] . "</td>";
                echo "<td>" . $averia['apellidos'] . "</td>";
                echo "<td>" . $averia['error'] . "</td>";
        
        // Puedes incluso saltarte 'modelopc' u 'observaciones' si no quieres verlas en el listado
        
        // Acciones
        echo "<td>
                <a href='eliminar.php?nparte=".$averia['nparte']."'>Eliminar</a> | 
                <a href='actualizar.php?nparte=".$averia['nparte']."'>Actualizar</a>
              </td>";
        echo "</tr>";
        }
        */

        echo "</table><br/>";

        echo "<a href='formulario.php'>NUEVA AVERIA</a><br/><br/>";
        echo "<a href='logout.php'>CERRAR SESIÓN</a>";

       
    
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }

    mysqli_close($conexion);
?>