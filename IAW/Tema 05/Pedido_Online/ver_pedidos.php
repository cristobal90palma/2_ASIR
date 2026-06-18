<?php
include_once "bbdd.php";
session_start();

// 1. Control de sesión
if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
    header("Location: acceso.php");
    exit;
}

$usuario_logueado = $_SESSION['user'];

try {
    $conexion = mysqli_connect($servidor, $user, $password, $bd);

    // 2. Consulta con JOIN y GROUP_CONCAT para listar los nombres de los productos
    // Usamos LEFT JOIN para que no desaparezca el pedido si hubo algún error en la relación
    $sql = "SELECT p.npedido, p.nombre, p.direccion, p.telefono, p.importe, p.username,
            GROUP_CONCAT(pr.nombre SEPARATOR ', ') AS lista_productos
            FROM pedido p
            LEFT JOIN `pedido-producto` pp ON p.npedido = pp.npedido
            LEFT JOIN producto pr ON pp.nproducto = pr.nproducto
            WHERE p.username = '$usuario_logueado'
            GROUP BY p.npedido";
    
    $resultado = mysqli_query($conexion, $sql);
    $pedidos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

    mysqli_close($conexion);
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Pedidos - IAW</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .contenedor { width: 95%; max-width: 1100px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        
        /* Estilo de la tabla basado en las imágenes */
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 10px; text-align: left; }
        
        .cabecera-verde { background-color: #a9d08e; text-align: center; font-weight: bold; }
        .cabecera-gris { background-color: #d9d9d9; font-weight: bold; }

        /* Botones */
        .btn { 
            display: inline-block; padding: 8px 12px; background-color: #333; 
            color: white; text-decoration: none; border-radius: 4px; font-size: 14px;
        }
        .btn:hover { background-color: #555; }
        .btn-borrar { background-color: #d9534f; }
        .btn-borrar:hover { background-color: #c9302c; }

        .navegacion { margin-top: 20px; }
    </style>
</head>
<body>

<div class="contenedor">
    <table>
        <thead>
            <tr>
                <th colspan="8" class="cabecera-verde">Pedidos</th>
            </tr>
            <tr class="cabecera-gris">
                <th>Nº Pedido</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Importe</th>
                <th>Username</th>
                <th>Pedido</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($pedidos) > 0): ?>
                <?php foreach ($pedidos as $fila): ?>
                <tr>
                    <td><?php echo $fila['npedido']; ?></td>
                    <td><?php echo $fila['nombre']; ?></td>
                    <td><?php echo $fila['direccion']; ?></td>
                    <td><?php echo $fila['telefono']; ?></td>
                    <td><?php echo number_format($fila['importe'], 2); ?> €</td>
                    <td><?php echo $fila['username']; ?></td>
                    <td><?php echo $fila['lista_productos']; ?></td>
                    <td>
                        <a href="borrar_pedido.php?id=<?php echo $fila['npedido']; ?>" 
                           class="btn btn-borrar" 
                           onclick="return confirm('¿Seguro que deseas eliminar este pedido?')">
                           ELIMINAR
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" style="text-align: center;">No tienes pedidos registrados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="navegacion">
        <a href="pedido.php" class="btn">Volver al formulario</a>
    </div>
</div>

</body>
</html>