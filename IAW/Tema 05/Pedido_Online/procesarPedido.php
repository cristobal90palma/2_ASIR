<?php
include_once "bbdd.php";
session_start();

// Control de sesión obligatorio al inicio
if (!isset($_SESSION['user']) || $_SESSION['user'] == "") {
    header("Location: acceso.php");
    exit;
}

/* ============================
   FUNCIÓN: Validar datos
   ============================ */
function validaDatos($nombre, $telefono, $direccion, $productos) {

    if (empty($nombre) || empty($telefono) || empty($direccion)) {
        return false;
    /*
    Verifica que ningún campo esté vacío.
    empty() devuelve true si la variable está vacía, es null o no existe.
    Si falta cualquier dato, la función termina y devuelve false.
    */
    
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/", $nombre)) {
        return false;

    /*
    ✔ Usa una expresión regular para permitir solo: Letras, Letras con tilde y Espacios
    No permite números ni símbolos.
    El símbolo ^ indica inicio de cadena
    $ indica fin de cadena
    + indica “uno o más caracteres”
    */
    }

    if (!preg_match("/^[0-9]{9}$/", $telefono)) {
        return false;
    /*
    Solo permite: Exactamente 9 dígitos. Sin espacios ni letras
    {9} obliga a que sean 9 números exactos
    */
    }

    if (!preg_match("/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ,.-]+$/", $direccion)) {
        return false;
    /*
    Permite: Letras, Números, Espacios, Comas, puntos y guiones
    Evita caracteres peligrosos como < > / ; (seguridad básica).
    */
    }

    if (empty($productos)) {
        return false;
    /*
    Comprueba que el usuario ha seleccionado al menos un producto.
    $productos es un array (checkboxes).
    */
    }

    return true;
    //Si todas las validaciones pasan, la función devuelve true.
}

/* ============================
   FUNCIÓN: Calcular precio
   Calcula el importe total del pedido sumando los precios de los productos seleccionados.
   ============================ */
function calculaPrecioPedido($productos) {

    $precios = [
        1 => 8.95,
        2 => 10,
        3 => 15,
        4 => 11,
        5 => 8,
        6 => 15,
        7 => 4,
        8 => 3
    ];
    /*
    Usamos un array asociativo:
    Clave → Código del producto.
    Valor → Precio.
    Permite relacionar el código enviado por el formulario con su precio. Recuerda que en el html, 
    cada uno de los productos tiene puesto un "value". Eso es lo que manda el formulario a esta página.
    */

    //Variable acumuladora del precio final.
    $total = 0;

    //Recorre el array $productos recibido desde $_POST.
    //"isset": Verifica que el código existe en el array de precios. Evita errores o manipulaciones del formulario.
    // Por último se suma a la variable "total".
    foreach ($productos as $codigo) {
        if (isset($precios[$codigo])) {
            $total += $precios[$codigo];
        }
    }

    return $total;
    //Devuelve el importe total calculado.
}

/* ============================
   FLUJO PRINCIPAL
   ============================ */

$nombre    = $_POST['nombre'] ?? '';
$telefono  = $_POST['telefono'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$productos = $_POST['productos'] ?? [];
$username  = $_SESSION['user']; // El nombre de sesión del usuario. Para la foreign key.

echo "<!DOCTYPE html><html><head><title>Estado del Pedido</title></head><body>";

if (!validaDatos($nombre, $telefono, $direccion, $productos)) {
    echo "<div style='border:1px solid black; padding:10px; width:500px;'>";
    echo "Los datos de contacto no han sido correctamente informados<br>ó<br>";
    echo "No se ha seleccionado ningún producto para el pedido<br>";
    echo "<strong><a href='pedido.php'>Volver al formulario</a></strong>";
    echo "</div>";
} else {
    $importe = calculaPrecioPedido($productos);

    try {
        $conexion = mysqli_connect($servidor, $user, $password, $bd);
        
        // 1. Inserción en tabla 'pedido'
        $sqlPedido = "INSERT INTO pedido (nombre, direccion, telefono, importe, username) 
                      VALUES ('$nombre', '$direccion', '$telefono', '$importe', '$username')";
        
        if (mysqli_query($conexion, $sqlPedido)) {
            // https://www.php.net/manual/en/mysqli.insert-id.php Returns the value generated for an AUTO_INCREMENT column by the last query 
            $idPedidoGenerado = mysqli_insert_id($conexion);

            // 2. Insertar cada relación en 'pedido-producto'
            foreach ($productos as $idProducto) {
                $sqlRel = "INSERT INTO `pedido-producto` (npedido, nproducto) VALUES ($idPedidoGenerado, $idProducto)";
                mysqli_query($conexion, $sqlRel);
            }

            // 3. OBTENER NOMBRES DE PRODUCTOS DESDE LA BD para el mensaje
            // Convertimos el array de IDs en un string separado por comas: "1,2,5"
            $ids_string = implode(",", $productos);
            $sqlNombres = "SELECT nombre FROM producto WHERE nproducto IN ($ids_string)";
            $resNombres = mysqli_query($conexion, $sqlNombres);
            
            $lista_nombres = [];
            while ($fila = mysqli_fetch_assoc($resNombres)) {
                $lista_nombres[] = $fila['nombre'];
            }

            // MENSAJE ÉXITO FINAL
            echo "<div style='border:1px solid black; padding:10px; width:500px;'>";
            echo "<strong>Nombre del cliente:</strong> $nombre<br>";
            echo "<strong>Dirección:</strong> $direccion<br>";
            echo "Ha solicitado " . implode(", ", $lista_nombres) . ".<br>";
            echo "El importe total será <strong>" . number_format($importe, 2) . " €</strong>.<br>";
            echo "Su pedido se está tramitando.";
            echo "</div>";
            
            echo "<br><a href='ver_pedidos.php'>VER MIS PEDIDOS</a>";
        } else {
            echo "Error en la base de datos: " . mysqli_error($conexion);
        }
        mysqli_close($conexion);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
echo "</body></html>";
?>