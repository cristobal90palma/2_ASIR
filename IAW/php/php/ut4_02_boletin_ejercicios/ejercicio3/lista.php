<!DOCTYPE html>
<html>
<head>
    <title>Lista de tareas</title>
    <meta charset="UTF-8">
</head>
<body>
    <?php
        session_start();
        if(isset($_POST['tarea'])){
            $tarea = $_POST['tarea'];
            if(!isset($_SESSION['tareas'])){
                $_SESSION["tareas"] = [];
            }
            array_push($_SESSION['tareas'], $tarea);
        }

    ?>
    <h2>LISTA DE TAREAS</h2>
    <form action="borrar.php" method="post">
    <?php
        $i=0;
        foreach ($_SESSION['tareas'] as $tarea){
            echo "<label style='width:200px; display:inline-block;'>".$tarea."</label><input type='checkbox' name='t".$i."'/><br>"."\n\t\t";
            $i++;
        }
    ?>
    <br>
    <button type="submit" name="borrar" value="borrar">BORRAR</button>
    </form>
    <br><br>
    <a href="formulario.html" >NUEVA TAREA</a>
</body>
</html>