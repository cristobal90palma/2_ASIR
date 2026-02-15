<?php
include_once "bbdd.php";
session_start();

// Comprobar que la sesión está iniciada y activa
if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
    header("Location: acceso.php");
    exit;
}

// Verificar que recibimos el ID del pedido por la URL
if (isset($_GET['id'])) {
    $id_a_borrar = $_GET['id'];

    try {
        $conexion = mysqli_connect($servidor, $user, $password, $bd);

        if (!$conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        /* IMPORTANTE: El borrado debe ser en dos pasos por la integridad referencial.
           La tabla `pedido-producto` depende de `pedido`.
        */

        // Paso A: Borrar los productos asociados al pedido en la tabla intermedia
        $sql1 = "DELETE FROM `pedido-producto` WHERE npedido = $id_a_borrar";
        mysqli_query($conexion, $sql1);

        // Paso B: Borrar el pedido principal de la tabla 'pedido'
        $sql2 = "DELETE FROM pedido WHERE npedido = $id_a_borrar";
        
        if (mysqli_query($conexion, $sql2)) {
            // Si el borrado fue exitoso, cerramos y volvemos al listado
            mysqli_close($conexion);
            header("Location: ver_pedidos.php");
            exit;
        } else {
            echo "Error al eliminar el pedido: " . mysqli_error($conexion);
        }

        mysqli_close($conexion);

    } catch (Exception $e) {
        echo "Error crítico: " . $e->getMessage();
    }
} else {
    // Si alguien intenta entrar a esta página sin un ID, lo mandamos de vuelta
    header("Location: ver_pedidos.php");
    exit;
}
?>