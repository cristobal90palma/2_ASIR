<?php

	include_once "bbdd.php";
    session_start();

	try {

        if(!isset($_SESSION['user']) || $_SESSION['user']==""){
            header("Location: acceso.php");
        }

        $conexion = mysqli_connect($server, $user, $password, $bd);

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
        echo "<td>ACCIONES</td>";
        echo "</tr>";

        foreach($averias as $averia){
            echo "<tr>";
            foreach ($averia as $columna => $dato){
                echo "<td>".$dato."</td>";
            }
            echo "<td><a href='eliminar.php?nparte=".$averia['nparte']."'>Eliminar</a> | <a href='actualizar.php?nparte=".$averia['nparte']."'>Actualizar</a></td>";
            echo "</tr>";
        }

        echo "</table><br/>";

        echo "<a href='formulario.html'>NUEVA AVERIA</a><br/><br/>";
        echo "<a href='logout.php'>CERRAR SESIÓN</a>";

        mysqli_close($conn);
    
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }

?>