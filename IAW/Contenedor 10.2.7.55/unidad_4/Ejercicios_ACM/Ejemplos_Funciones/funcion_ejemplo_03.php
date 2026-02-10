<?php
function calcularNota($nombre, $nota) {
    $estado = ($nota >= 5) ? "Aprobado" : "Suspenso";
    echo "Alumno: $nombre | Calificación: $nota | Estado: <strong>$estado</strong><br>";
}

// Matriz de datos (simulando una base de datos)
$estudiantes = [
    ["Juan", 8.5],
    ["Sofía", 4.2],
    ["Mateo", 9.0],
    ["Lucía", 3.8]
];

echo "<h2>Resultados del Examen</h2>";

foreach ($estudiantes as $alumno) {
    // $alumno[0] es el nombre, $alumno[1] es la nota
    $nombreVar = $alumno[0];
    $notaVar = $alumno[1];
    
    calcularNota($nombreVar, $notaVar);
}
?>