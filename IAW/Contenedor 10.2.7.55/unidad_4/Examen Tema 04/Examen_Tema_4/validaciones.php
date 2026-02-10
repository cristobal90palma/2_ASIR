<?php

// Recepcionamos los datos del formulario.
$nombre_empresa = $_POST['nombre_empresa'];
$cif = $_POST['cif'];
$ipv4 = $_POST['ipv4_publica'];
$ipv6 = $_POST['ipv6_global'];
$fecha_ipv4 = $_POST['fecha_renovacion_ipv4'];
$fecha_ipv6 = $_POST['fecha_renovacion_ipv6'];


// Array con los mensajes de errores:
$mensajes = [
    1 => "El campo del nombre de la empresa está vacio",
    2 => "El formato de la nombre de la empresa no es válido",
    3 => "El campo del CIF está vacio",
    4 => "El formato del CIF no es válido",
    5 => "El campo de IPv4 está vacio",
    6 => "El formato de IPv4 no es válido",
    7 => "El formato de IPv4 es válido, pero su rango no es público",
    8 => "El campo de IPv6 está vacio",
    9 => "El formato de IPv6 no es válido",
    10 => "La fecha de renovación para IPv4 está vacia",
    11 => "Formato de fecha no válido de IPv4",
    12 => "Formato de fecha no válido para IPv4",
    13 => "Has puesto una fecha en el pasado para la renovación de IPv4. Eso es imposible.",
    14 => "La fecha de renovación para IPv6 está vacia",
    15 => "Formato de fecha no válido de IPv4",
    16 => "Formato de fecha no válido para IPv6",
    17 => "Has puesto una fecha en el pasado para la renovación de IPv6. Eso es imposible."
];


// Funciones de validación.


// Validación del nombre de empresa
function fValidaNombre($n) {
    if ($n == null || $n == "") {
        return 1;
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,50}$/', $n)) {
        return 2;
    } else {
        return 0;
    }
}

// Validación del CIF
function fValidaCIF($a) {
    if ($a == null || $a == "") {
        return 3;
    } elseif (!preg_match('/^[A-Z]{1}[0-9]{7}([0-9]|[A-Z]){1}$/', $a)) {
        return 4;
    } else {
        return 0;
    }
}

// Validación de IPv4
function fValidaIPv4 ($ip) {
    if ($ip == null || $ip == "") {
        return 5;
    } if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        return 6;
    } if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE)) {
        return 7;
    } else {
        return 0;
    }
}



// Validación de IPv6
function fValidaIPv6 ($ip) {
    if ($ip == null || $ip == "") {
        return 8;
    } elseif (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        return 9;
    } else {
        return 0;
    }
}



// Validación de la fecha de renovación de IPv4
function fValidaFechaIPv4($fecha) {
    if ($fecha == null || $fecha == "") {
        return 10;
    }

    /* explode('-', $fecha): Rompe la cadena de texto cada vez que encuentra un guion.
     Por ejemplo, "2023-12-21" se convierte en un array: [2023, 12, 21].
    */
    $partes = explode('-', $fecha);

    /*count($partes) != 3: Si al romper la cadena no hay exactamente tres partes (año, mes y día),
     significa que el formato es incorrecto.
    */
    if (count($partes) != 3) {
        return 11;
    }

    /*checkdate verifica si la fecha existe realmente. Recibe los datos así: "checkdate(mes, día, año)"
    Evita fechas erróneas o imposibles
    */
    if (!checkdate($partes[1], $partes[2], $partes[0])) {
        return 12;
    }

    /*compara el texto de la fecha recibida con la fecha actual del servidor
    Usamos la función "date"
    */
    if ($fecha < date("Y-m-d")) {
        return 13;
    }

    return 0;
}


// Validación de la fecha de renovación de IPv6
function fValidaFechaIPv6($fecha) {
    if ($fecha == null || $fecha == "") {
        return 14;
    }

    /* explode('-', $fecha): Rompe la cadena de texto cada vez que encuentra un guion.
     Por ejemplo, "2023-12-21" se convierte en un array: [2023, 12, 21].
    */
    $partes = explode('-', $fecha);

    /*count($partes) != 3: Si al romper la cadena no hay exactamente tres partes (año, mes y día),
     significa que el formato es incorrecto.
    */
    if (count($partes) != 3) {
        return 15;
    }

    /*checkdate verifica si la fecha existe realmente. Recibe los datos así: "checkdate(mes, día, año)"
    Evita fechas erróneas o imposibles
    */
    if (!checkdate($partes[1], $partes[2], $partes[0])) {
        return 16;
    }

    /*compara el texto de la fecha recibida con la fecha actual del servidor
    Usamos la función "date"
    */
    if ($fecha < date("Y-m-d")) {
        return 17;
    }

    return 0;
}



// Funcion final que llama al resto de funciones y luego las imprime con un foreach.
// Los errores se van guardando en "$errores".


function fValidaFormulario ($nombre_empresa, $cif, $ipv4, $ipv6, $fecha_ipv4, $fecha_ipv6, $mensajes) 
 {
    $errores = [];

        // Validación Nombre
        $codNombre = fValidaNombre($nombre_empresa);
        if ($codNombre != 0) {
            $errores[] = "Nombre: " . $mensajes[$codNombre];
        }

        // Validación Apellidos
        $codCIF = fValidaCIF($cif);
        if ($codCIF != 0) {
            $errores[] = "Apellidos: " . $mensajes[$codCIF];
        }

        // Validación NIF
        $codIPv4 = fValidaIPv4($ipv4);
        if ($codIPv4 != 0) {
            $errores[] = "NIF: " . $mensajes[$codIPv4];
        }

        // Validación Teléfono
        $codIPv6 = fValidaIPv6($ipv6);
        if ($codIPv6 != 0) {
            $errores[] = "Teléfono: " . $mensajes[$codIPv6];
        }

        // Validación Matrícula
        $codFechaIPv4 = fValidaFechaIPv4($fecha_ipv4);
        if ($codFechaIPv4 != 0) {
            $errores[] = "Matrícula: " . $mensajes[$codFechaIPv4];
        }

        // Validación Bastidor
        $codFechaIPv6 = fValidaFechaIPv6($fecha_ipv6);
        if ($codFechaIPv6 != 0) {
            $errores[] = "Bastidor: " . $mensajes[$codFechaIPv6];
        }


            // Salida en HTML
            if (!empty($errores)) {
                echo "<h2 style='color:red;'>Errores en el formulario.</h2>";
                echo "<ul>";
                foreach ($errores as $e) {
                    echo "<li>$e</li>";
                }
                echo "</ul>";
            } else {
                echo "<h2 style='color:green;'>Todos los datos son correctos</h2>";
                echo "<p>Todo está bien.</p>";
            }
}




// Llamada a la función
fValidaFormulario ($nombre_empresa, $cif, $ipv4, $ipv6, $fecha_ipv4, $fecha_ipv6, $mensajes); 

// Guardamos cookies solo si los datos son correctos
if (fValidaCIF($cif) == 0) {
    // Cookie válida durante 7 días
    setcookie("cif", $cif, time() + 7 * 24 * 60 * 60);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación del formulario</title>
</head>
<body>
    <p>
        
    Usuario: <strong><?php echo $_SESSION['usuario']; ?></strong>
    | <a href="logout.php">Cerrar sesión</a>
    </p>

    <p>
    <a href="datos_cliente.php">Volver a introducción de datos.</a>
    </p>
</body>
</html>