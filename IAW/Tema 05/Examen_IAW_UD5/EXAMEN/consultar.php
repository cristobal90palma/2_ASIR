<?php

	include_once "bbdd.php";
    //session_start();

	try {

        // Comprobar valores de sesión
        /*
        if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
            exit();
        }
        */

        // Conexion con BBDD
        $conexion = mysqli_connect($servidor, $user, $password, $bd);

        // Se hace un select para ver en la tabla averia3 aquellas filas cuyo 
        // username sean igual que el del usuario de la sesión.
        $sql = "select * from alumno";
        $resultado_sql = mysqli_query($conexion, $sql);
        $alumnos = mysqli_fetch_all($resultado_sql, MYSQLI_ASSOC);

        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr>";
        echo "<td>DNI</td>";
        echo "<td>NOMBRE y APELLIDOS</td>";
        echo "<td>DIRECCION</td>";
        echo "<td>TELEFONO</td>";
        echo "<td>EMAIL</td>";
        echo "<td>CICLO</td>";
        echo "<td>ACCIONES</td>";
        echo "</tr>";

        /*
        - El primer foreach: Crea una nueva fila (<tr>) para cada avería encontrada.
        - El segundo foreach (anidado): Recorre cada columna de esa avería ($dato) y 
        la mete en una celda (<td>). Esto evita tener que escribir echo $averia['nombre'], 
        echo $averia['apellidos'], etc., uno por uno.
        */


        
         //MODELO MANUAL. TIENES QUE REAJUSTAR LOS TÍTULOS DE LAS COLUMNAS DE LAS TABLAS:
        foreach($alumnos as $alumno) {
         echo "<tr>";
                // Aquí eliges tú el orden y cuáles mostrar
                echo "<td>" . $alumno['dni'] . "</td>";
                //echo "<td>" . $alumno['dni'] . "</td>"; PONER EL ENLACE EN EL PROPIO DNI.
                echo "<td>" . $alumno['username'] . " " . $alumno['apellidos'] . "</td>";
                echo "<td>" . $alumno['direccion'] . "</td>";
                echo "<td>" . $alumno['telefono'] . "</td>";
                echo "<td>" . $alumno['email'] . "</td>";
                echo "<td>" . $alumno['ciclo'] . "</td>";
                
        
        // Puedes incluso saltarte 'modelopc' u 'observaciones' si no quieres verlas en el listado
        
        // Acciones
        
        
        
        echo "<td>
                <a href='eliminar.php?dni=".$alumno['dni']."'>Eliminar</a> | 
                <a href='actualizar.php?dni=".$alumno['dni']."'>Actualizar</a>
              </td>";
        echo "</tr>";
        }
        
       
        

        echo "</table><br/>";

        /*
        echo "<a href='formulario.php'>NUEVA AVERIA</a><br/><br/>";
        echo "<a href='logout.php'>CERRAR SESIÓN</a>";
        */
       
    
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }

    mysqli_close($conexion);
?>