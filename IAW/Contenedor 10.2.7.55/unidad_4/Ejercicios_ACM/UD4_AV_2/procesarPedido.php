<?php

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
   FUNCIÓN: Mostrar resultado
   Muestra el resultado final del pedido con formato HTML.
   ============================ */
function mostrarResultado($nombre, $direccion, $importe) {

    echo "<h2>Pedido confirmado</h2>";
    echo "<p><strong>Nombre del cliente:</strong> $nombre</p>";
    echo "<p><strong>Dirección:</strong> $direccion</p>";
    echo "<p>Su pedido se está tramitando.</p>";
    echo "<p><strong>Importe total:</strong> " . number_format($importe, 2) . " €</p>";
    //number_format($importe, 2): Dos decimales. 
}

/* ============================
   FLUJO PRINCIPAL
   ============================ */

// Recepción de los datos desde el formulario.
/*
✔ Usa el operador ??:

Si existe → se asigna.

Si no → valor por defecto ('' o []).

✔ Evita errores Undefined index.
*/

$nombre     = $_POST['nombre'] ?? '';
$telefono   = $_POST['telefono'] ?? '';
$direccion  = $_POST['direccion'] ?? '';
$productos  = $_POST['productos'] ?? []; // Recuerdas que "productos" es un array.


//Si algún dato es incorrecto, entra en el bloque de error.
if (!validaDatos($nombre, $telefono, $direccion, $productos)) {

    echo "<h2>Error en el pedido</h2>";
    echo "<p>Los datos de contacto no han sido correctamente informados o no se ha seleccionado ningún producto.</p>";
    echo '<a href="pedido.html">Volver al formulario</a>';

} else {

    $importe = calculaPrecioPedido($productos);
    //Calcula el precio.
    mostrarResultado($nombre, $direccion, $importe);
    //Muestra el resultado usando la función.
    echo '<br><a href="pedido.html">Realizar otro pedido</a>';
    //Permite reiniciar el proceso sin redireccionamiento automático.
}
?>
