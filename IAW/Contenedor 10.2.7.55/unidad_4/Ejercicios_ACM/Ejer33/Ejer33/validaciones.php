<?php
// He reusado el mismo archivo que el del ejercicio 32.

// Recibimos los datos del formulario de "datos_persona.php"
$nombre   = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nif      = $_POST['nif'];
$telefono = $_POST['telefono'];
$matricula = $_POST['matricula'];
$bastidor = $_POST['bastidor'];
$fecha_matricula = $_POST['fecha_matricula'];


// Array con los mensajes de errores:
$mensajes = [
    1 => "El campo está vacío",
    2 => "El formato no es válido",
    3 => "La letra del NIF no es correcta",
    4 => "La fecha no es válida",
    5 => "¿Te has matriculado en el futuro?"
];


/*
$mensajes = [
    1 => "El campo del nombre de la empresa está vacio",
    2 => "El formato de la nombre de la empresa no es válido",
    3 => "El campo del CIF está vacio",
    4 => "El formato del CIF no es válido",
    5 => "El campo de IPv4 está vacio",
    6 => "El formato de IPv4 no es válido",
    7 => "El formato de IPv4 es válido, pero su rango no es público",
    8 => "El campo de IPv6 está vacio",
    9 => "El formato de IPv6 no es válido"
    10 => "La fecha de renovación para IPv4 está vacia",
    11 => "Formato de fecha no válido de IPv4",
    12 => "Formato de fecha no válido para IPv4",
    13 => "Has puesto una fecha pasada para la renovación de IPv4"
    14 => "La fecha de renovación para IPv6 está vacia",
    15 => "Formato de fecha no válido de IPv4",
    16 => "Formato de fecha no válido para IPv6",
    17 => "Has puesto una fecha pasada para la renovación de IPv6"
];


*/

//Funciones de validación
function fValidaNombre($n) {
    if ($n == null || $n == "") {
        return 1;
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{1,50}$/', $n)) {
        return 2;
    } else {
        return 0;
    }
}


function fValidaApellidos($a) {
    if ($a == null || $a == "") {
        return 1;
    } elseif (!preg_match('/^[A-Za-zÁÉÍÓÚáéÍÓÚÑñ\s]{1,50}$/', $a)) {
        return 2;
    } else {
        return 0;
    }
}


function fValidaTLF($tel) {
    if ($tel == null || $tel == "") {
        return 1;
    } elseif (!preg_match('/^[0-9]{9}$/', $tel)) {
        return 2;
    } else {
        return 0;
    }
}

// Validación de NIF: formato 8 números + letra y cálculo de letra correcta.
function fValidaNIF($nif) {
    if ($nif == null || $nif == "") {
        return 1;
    } elseif (preg_match('/^[0-9]{8}[A-Za-z]$/', $nif) == false) {
        return 2;
    }

    // Extraemos número y letra por separado
    //Substrae del valor de nif desde la posición 0 hasta la 8, dejando la letra "9" a parte.
    $numero = substr($nif, 0, 8);
    // strtoupper = Convierte a mayúsculas, así evitamos el problema por el cual no reconoce si metemos una letra minúscula.
    $letraProporcionada = strtoupper(substr($nif, -1));

    // El orden de las letras es estándar para el algoritmo del DNI.
    $letrasValidas = "TRWAGMYFPDXBNJZSQVHLCKE";
    $letraCalculada = $letrasValidas[$numero % 23];

    if ($letraCalculada !== $letraProporcionada) {
        return 3;
    } else {
        return 0;
    }
}


// Función de matrícula:

function fValidaMatricula($m) {
    if (empty(trim($m))) {
        return 1;
    }

    // Definimos la expresión regular unificada
    // Acepta formato moderno (1234 BBB) y antiguo (M 1234 AB) con espacios opcionales
    // El modificador 'i' al final permite mayúsculas y minúsculas
    $patron = '/^(([0-9]{4}\s?[B-DF-HJ-NP-TV-Z]{3})|([A-Z]{1,2}\s?[0-9]{4}\s?[A-Z]{1,2}))$/i';

    // Comprobación
    if (!preg_match($patron, $m)) {
        return 2;
    }

    return 0;
}

// Función del bastidor:
// Formato ==> https://www.race.es/como-comprobar-numero-de-bastidor-coche
// VF33CHMZ6EB012345
function fValidaBastidor($b) {
    if ($b == null || $b == "") {
        return 1;
    }

    $b = strtoupper(trim($b));
    /*
    trim($b): Elimina espacios en blanco accidentales al principio o al final.
    strtoupper(...): Convierte todo el texto a mayúsculas.
    */

    if (!preg_match('/^[A-HJ-NPR-Z0-9]{17}$/', $b)) {
        return 2;
    }

    /*
    Longitud exacta: Debe tener 17 caracteres.

    Caracteres permitidos: Letras (A-Z) y números (0-9).

    Exclusiones de seguridad: Fíjate que en el rango faltan las letras I, O y Q (A-HJ-NPR-Z). 
    Esto es así porque el estándar internacional prohíbe estas letras para evitar confusiones
    visuales con los números 1 y 0.
    Ejemplo de Bastidor: 1HGCM82633A123456
    */

    return 0;
}

// Función de fecha matriculación.

function fValidaFecha($fecha) {
    if ($fecha == null || $fecha == "") {
        return 1;
    }

    /* explode('-', $fecha): Rompe la cadena de texto cada vez que encuentra un guion.
     Por ejemplo, "2023-12-21" se convierte en un array: [2023, 12, 21].
    */
    $partes = explode('-', $fecha);

    /*count($partes) != 3: Si al romper la cadena no hay exactamente tres partes (año, mes y día),
     significa que el formato es incorrecto.
    */
    if (count($partes) != 3) {
        return 2;
    }

    /*checkdate verifica si la fecha existe realmente. Recibe los datos así: "checkdate(mes, día, año)"
    Evita fechas erróneas o imposibles
    */
    if (!checkdate($partes[1], $partes[2], $partes[0])) {
        return 4;
    }

    /*compara el texto de la fecha recibida con la fecha actual del servidor
    Usamos la función "date"
    */
    if ($fecha > date("Y-m-d")) {
        return 5;
    }

    return 0;
}


//Función final. Apartado f.

/*Va llamando a cada una de las funciones anteriores, si el valor es distinto de 0, 
guarda en el array "errores" el mensaje correspondiente. Después se usa un foreach para mostrar 
cada uno de los valores que se han guardado en el array.
*/
function fValidaITV ($nombre, $apellido, $nif, $telefono, $matricula,
    $bastidor, $fecha_matricula, $mensajes) 
 {
    $errores = [];

        // Validación Nombre
        $codNombre = fValidaNombre($nombre);
        if ($codNombre != 0) {
            $errores[] = "Nombre: " . $mensajes[$codNombre];
        }

        // Validación Apellidos
        $codApellidos = fValidaApellidos($apellido);
        if ($codApellidos != 0) {
            $errores[] = "Apellidos: " . $mensajes[$codApellidos];
        }

        // Validación NIF
        $codNIF = fValidaNIF($nif);
        if ($codNIF != 0) {
            $errores[] = "NIF: " . $mensajes[$codNIF];
        }

        // Validación Teléfono
        $codTLF = fValidaTLF($telefono);
        if ($codTLF != 0) {
            $errores[] = "Teléfono: " . $mensajes[$codTLF];
        }

        // Validación Matrícula
        $codMat = fValidaMatricula($matricula);
        if ($codMat != 0) {
            $errores[] = "Matrícula: " . $mensajes[$codMat];
        }

        // Validación Bastidor
        $codBas = fValidaBastidor($bastidor);
        if ($codBas != 0) {
            $errores[] = "Bastidor: " . $mensajes[$codBas];
        }

        // Validación Fecha de matriculación
        $codFecha = fValidaFecha($fecha_matricula);
        if ($codFecha != 0) {
            $errores[] = "Fecha de matriculación: " . $mensajes[$codFecha];
        }


            // Salida en HTML
            if (!empty($errores)) {
                echo "<h2 style='color:red;'>Errores en la validación ITV</h2>";
                echo "<ul>";
                foreach ($errores as $e) {
                    echo "<li>$e</li>";
                }
                echo "</ul>";
            } else {
                echo "<h2 style='color:green;'>Todos los datos son correctos</h2>";
                echo "<p>El vehículo puede pasar la ITV correctamente.</p>";
            }
}

// LLamada a la función de validación del formulario
fValidaITV ($nombre, $apellido, $nif, $telefono, $matricula, $bastidor, $fecha_matricula, $mensajes);


// Comprobación de los códigos de error.
echo "======================================";
echo "<h2>Comprobación de los códigos de error.</h2>";

echo "<p>Return de la función de Nombre: ".fValidaNombre($nombre)."</p>";
echo "<p>Return de la función de Apellidos: ".fValidaApellidos($apellido)."</p>";
echo "<p>Return de la función de NIF: ".fValidaNIF($nif)."</p>";
echo "<p>Return de la función de Teléfono: ".fValidaTLF($telefono)."</p>";
echo "<p>Return Matrícula: ".fValidaMatricula($matricula)."</p>";
echo "<p>Return Bastidor: ".fValidaBastidor($bastidor)."</p>";
echo "<p>Return Fecha: ".fValidaFecha($fecha_matricula)."</p>";



// Guardamos cookies solo si los datos son correctos
if (fValidaNombre($nombre) == 0 && fValidaMatricula($matricula) == 0
) {
    // Cookie válida durante 7 días
    setcookie("nombre_cliente", $nombre, time() + 7 * 24 * 60 * 60);
    setcookie("matricula_cliente", $matricula, time() + 7 * 24 * 60 * 60);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de la ITV</title>
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




<?php


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








?>