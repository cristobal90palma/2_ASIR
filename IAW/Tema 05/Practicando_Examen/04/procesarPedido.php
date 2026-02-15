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
function calculaPrecioPedido($productos, $conexion) {
    // Convertimos el array de IDs en un string: "1,3,5"
    $ids_string = implode(",", $productos);

    // Consultamos los precios directamente de la tabla 'producto'
    $sql = "SELECT precio FROM producto WHERE nproducto IN ($ids_string)";
    $resultado = mysqli_query($conexion, $sql);

   $total = 0;

    // Sumamos cada precio que nos devuelva la base de datos
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $total += $fila['precio'];
    }

    return $total;
}

/* ============================
   FLUJO PRINCIPAL
   ============================ */


// Campturamos lo recibido desde pedido.php
$nombre    = $_POST['nombre'] ?? '';
$telefono  = $_POST['telefono'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$productos = $_POST['productos'] ?? [];
$username  = $_SESSION['user']; // El nombre de sesión del usuario. Para la foreign key.

echo "<!DOCTYPE html><html><head><title>Estado del Pedido</title></head><body>";

// Se hace la validación de datos antes de hacer nada con la BBDD
if (!validaDatos($nombre, $telefono, $direccion, $productos)) {
    echo "<div style='border:1px solid black; padding:10px; width:500px;'>";
    echo "Los datos de contacto no han sido correctamente informados<br>ó<br>";
    echo "No se ha seleccionado ningún producto para el pedido<br>";
    echo "<strong><a href='pedido.php'>Volver al formulario</a></strong>";
    echo "</div>";
} else {

    // Conexión con la BBDD.
    try {
        $conexion = mysqli_connect($servidor, $user, $password, $bd);
        
        // Si los datos están bien, se calcula el importe del pedido.
        $importe = calculaPrecioPedido($productos, $conexion);
        
        // Inserción en tabla 'pedido'. Se guarda en una variable y luego con mysqli_query se manda.
        $sqlPedido = "INSERT INTO pedido (nombre, direccion, telefono, importe, username) 
                      VALUES ('$nombre', '$direccion', '$telefono', '$importe', '$username')";
        
        if (mysqli_query($conexion, $sqlPedido)) {
            // https://www.php.net/manual/en/mysqli.insert-id.php 
            // Returns the value generated for an AUTO_INCREMENT column by the last query 
            // Obtenemos la "id" del pedido y la guardamos en una variable.
            $idPedidoGenerado = mysqli_insert_id($conexion);

            // Insertar cada relación en 'pedido-producto'
            // $producto es un array y lo estamos recorriendo. Ya tenemos la variable con la ip del pedido.
            // $_POST['producto'] nos envia un código del producto, no su nombre. ASí que simplemente estamos insertando códigos.
            foreach ($productos as $idProducto) {
                $sqlRel = "INSERT INTO `pedido-producto` (npedido, nproducto) VALUES ($idPedidoGenerado, $idProducto)";
                mysqli_query($conexion, $sqlRel);
            }

            // OBTENER NOMBRES DE PRODUCTOS DESDE LA BD para el mensaje
            // con IMPLODE; Convertimos el array de IDs en un string separado por comas: "1,2,5"
            $ids_string = implode(",", $productos);
            // Junta los IDs en una lista (ej: 1,4,5), busca sus nombres y los guarda en $resNombres.
            //En lugar de hacer tres consultas distintas (una para cada ID), usa la palabra clave IN.
            //Traducción: "Dame los nombres de la tabla productos donde el ID sea cualquiera 
            // de los que hay en esta lista (1, 4 o 5)".
            $sqlNombres = "SELECT nombre FROM producto WHERE nproducto IN ($ids_string)";
            $resNombres = mysqli_query($conexion, $sqlNombres);
            
            // Para listar los nombres más adelante.
            $lista_nombres = []; // // Preparamos una lista vacía.
            // bucle: https://www.php.net/manual/en/mysqli-result.fetch-assoc.php
            // Es una función que saca una fila del paquete y la convierte en un array asociativo 
            // (donde puedes acceder al dato usando el nombre de la columna: $fila['nombre']).
            // Saca los nombre de "resNombres" y y los mete en $lista_nombres.  
            // en $fila (array) se guardan los datos de las filas y después en $lista_nombres se sacan solo los datos
            // de la columna "nombre".
            while ($fila = mysqli_fetch_assoc($resNombres)) {
                $lista_nombres[] = $fila['nombre'];
            }

            //El while: Se repite automáticamente. Cuando sacas la última ficha del 
            // sobre, mysqli_fetch_assoc devuelve un valor falso (está vacío) y el bucle se detiene.

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