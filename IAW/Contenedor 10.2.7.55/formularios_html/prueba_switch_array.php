<?php

$peliculas = [
    "sala1" => [
        "Nombre"        => "Terminator",
        "Descripcion"   => "Un robot del futuro viene a liquidar al futuro lider de la resistencia humana",
        "Genero"        => "Acción",
        "Precio"        => 8
    ],
    "sala2" => [
        "Nombre"        => "Rambo 2",
        "Descripcion"   => "Rambo, un veterano de la Guerra de Vietnam, es reclutado de nuevo para llevar a cabo una misión tras las líneas enemigas",
        "Genero"        => "Acción",
        "Precio"        => 7
    ],
    "sala3" => [
        "Nombre"        => "El Señor de los Anillos: La Comunidad del Anillo",
        "Descripcion"   => "Sauron quiere dominar a los pueblos libres de la Tierra Media. Un grupo de valientes se une en una misión desesperada para detenerlo",
        "Genero"        => "Fantasía",
        "Precio"        => 9
    ],
    "sala4" => [
        "Nombre"        => "La Caza del Octubre Rojo",
        "Descripcion"   => "Un Submarino Soviético se dispone a realizar una misión suicida para atacar a los Estados Unidos.",
        "Genero"        => "Thriller",
        "Precio"        => 4
    ],
    "sala5" => [
        "Nombre"        => "Dos Tontos muy tontos",
        "Descripcion"   => "Dos amigos que son muy tontos hacen tonterías",
        "Genero"        => "Comedia",
        "Precio"        => 6.50
    ]
];

// --- Mostrar las opciones disponibles ---
echo "📺 Cartelera de Películas:\n";
foreach ($peliculas as $sala => $datos) {
    echo "  - **" . $sala . "**: " . $datos['Nombre'] . "\n";
}

// --- Capturar la entrada del usuario ---
echo "\nElige una sala (ej: sala1, sala4): ";
// $a contiene la sala elegida por el usuario (ej: 'sala4')
$sala_elegida = rtrim(fgets(STDIN));


// --- Estructura de control: switch ---
switch ($sala_elegida) { // <-- ¡CORRECCIÓN! Evaluamos la variable de la elección del usuario
    case 'sala1':
        echo "Has elegido: **" . $peliculas['sala1']['Nombre'] . "**\n";
        echo "Precio: " . $peliculas['sala1']['Precio'] . " €\n";
        break;
    case 'sala2':
        echo "Has elegido: **" . $peliculas['sala2']['Nombre'] . "**\n";
        echo "Precio: " . $peliculas['sala2']['Precio'] . " €\n";
        break;
    case 'sala3':
        echo "Has elegido: **" . $peliculas['sala3']['Nombre'] . "**\n";
        echo "Precio: " . $peliculas['sala3']['Precio'] . " €\n";
        break;
    case 'sala4':
        echo "Has elegido: **" . $peliculas['sala4']['Nombre'] . "**\n";
        echo "Precio: " . $peliculas['sala4']['Precio'] . " €\n";
        break;
    case 'sala5':
        echo "Has elegido: **" . $peliculas['sala5']['Nombre'] . "**\n";
        echo "Precio: " . $peliculas['sala5']['Precio'] . " €\n";
        break;
    
    default:
        // Si el usuario ingresa un valor que no es 'sala1', 'sala2', etc.
        echo "\n❌ **Error:** " . $sala_elegida . " no es una sala válida.\n";
        exit;
}

?>