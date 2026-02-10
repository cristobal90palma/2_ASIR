<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        :root{--bg:#f6f8fa;--card:#ffffff;--accent:#0b5fff;--muted:#6b7280}
        body{font-family:Arial, Helvetica, sans-serif;background:var(--bg);color:#111;margin:0;padding:24px}
        .container{max-width:640px;margin:28px auto;padding:20px;background:var(--card);border-radius:8px;box-shadow:0 1px 3px rgba(16,24,40,.06)}
        h1{font-size:1.25rem;margin:0 0 12px}
        .field{display:flex;flex-direction:column;margin-bottom:12px}
        label{font-size:0.95rem;color:var(--muted);margin-bottom:6px}
        input[type=text], input[type=number], input[type=tel]{padding:8px 10px;border:1px solid #d1d5db;border-radius:6px;font-size:1rem}
        input[type=submit]{background:var(--accent);color:#fff;border:none;padding:10px 14px;border-radius:6px;cursor:pointer;font-weight:600}
        input[type=submit]:hover{opacity:.95}
    </style>
</head>

<?php
session_start();
echo "<p>Logueado como:".$_SESSION['usuario']."</p>";
#obligar al login, aunque ns si de esta forma seria un problema de seguridad??, ya que le da tiempo a cargar la pagina aunque al usuario no lo vea? o se para justo en esta linea? 
if( (isset($_SESSION['usuario']) && $_SESSION['usuario']!="") == false){
    header("Location: index.php");
}


#aunque lo de autorellenar los formulario no recuerdo verlo en clase, lo he que por google y con ayuda de la IA con poner la linea en value valdria

?>

<body>
    
    <form action="logout.php" method="post" style="display:inline;">
        <button type="submit">Cerrar sesión</button>
    </form>

    <div class="container">
        <h1>Formulario</h1>
        <form action="validaciones.php" method="post">
            <div class="field">
                <label for="nombre">Nombre del propietario</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($_COOKIE['nombre']); ?>"> 
            </div>
            <div class="field">
                <label for="matricula">Matricula</label>
                <input type="text" id="matricula" name="matricula" value="<?php echo htmlspecialchars($_COOKIE['matricula']); ?>">
            </div>
            <div class="field">
                <label for="dni">Bastidor</label>
                <input type="text" id="bastidor" name="bastidor">
            </div>
            <div class="field">
                <label for="fecha">Fecha de matriculacion</label>
                <input type="date" id="fecha" name="fecha">
            </div>
            <div class="field">
                <input type="submit" value="Enviar">
            </div>
        </form>
    </div>


<?php





#if ( isset( $_COOKIE['nombre'] ) && isset( $_COOKIE['matricula'] ) && isset( $_COOKIE['bastidor'] ) && isset( $_COOKIE['fecha'] )){
#    header("Location: validaciones.php");
#}





?>

</body>
</html>


