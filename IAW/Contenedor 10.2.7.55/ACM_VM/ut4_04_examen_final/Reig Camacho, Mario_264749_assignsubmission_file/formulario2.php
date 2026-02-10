<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login correo</title>
    <meta charset="utf-8">
    <style type="text/css">
        label { width: 120px; display: inline-block; margin: 8px 0; }
        input[type="text"] { padding: 5px; width: 250px; }
        input[type="submit"] { margin-top: 15px; padding: 7px 20px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Datos personales</h1>
    <form method="post" action="formulario32.php"> 
        <label for="nombre">Nombre de la empresa: </label>
        <input type="text" name="nombre" id="nombre"><br>
        

        <label for="cif">CIF: </label>
        <input type="text" name="cif" id="cif" placeholder="1 letra  7 números 1 letra "><br>

        <label for="IPV4Publica">IP publica versión 4: </label>
        <input type="text" name="IPV4Publica" id="IPV4Publica"><br>
        
        <label for="IPV6Global">IP global versión 6: </label>
        <input type="text" name="IPV6Global" id="IPV6Global"><br>
        
        <label for="FecharenovacionIPV4">Fecha de renovación de IPV4 mes-dia-año: </label>
        <input type="text" name="FecharenovacionIPV4" id="FecharenovacionIPV4"><br>

        <label for="FecharenovacionIPV6">Fecha de renovación de IPV6 mes-dia-año: </label>
        <input type="text" name="FecharenovacionIPV6" id="FecharenovacionIPV6"><br>

        <input type="submit" name="enviar" value="Enviar Datos">
    </form>

    <?php
        if (isset($_POST['enviar'])) {
            include("validaciones2.php");
            
            echo fValidaFormulario(
                $_POST['nombre'], 
                $_POST['cif'], 
                $_POST['IPV4Publica'], 
                $_POST['IPV6Global'],
                $_POST['FecharenovacionIPV4'], 
                $_POST['FecharenovacionIPV6'], 
            );
        }
    ?>
</body>
</html>