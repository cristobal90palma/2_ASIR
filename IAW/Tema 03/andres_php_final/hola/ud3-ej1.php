<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Recibido</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-10 px-4">

    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-xl overflow-hidden">
        
        <!-- Cabecera igual que el formulario -->
        <div class="bg-green-600 p-6">
            <h1 class="text-2xl font-bold text-white text-center">Currículum Recibido</h1>
            <p class="text-green-100 text-center mt-2">Tus datos han sido procesados correctamente</p>
        </div>

        <div class="p-8 space-y-6">

        <?php

            $puestos = [
                "programador_jr" => "Programador Junior",
                "programador_sr" => "Programador Senior",
                "analista" => "Analista de sistemas",
                "disenador" => "Diseñador web",
                "sysadmin" => "Administrador de sistemas"
            ];

            // SECCIÓN 1: SOLICITUD DE EMPLEO
            echo "<div class='bg-gray-50 p-4 rounded-lg border border-gray-200'>";
            echo "  <h2 class='text-xl font-semibold text-gray-800 border-b-2 border-green-500 pb-2 mb-4'>Información del puesto</h2>";
            echo "  <div class='grid grid-cols-1 md:grid-cols-2 gap-4'>";
            echo "      <div class='flex flex-col'><span class='text-sm text-gray-500'>Puesto</span><span class='font-medium text-gray-900'>".$puestos[$_POST["puesto"]]."</span></div>";
            echo "      <div class='flex flex-col'><span class='text-sm text-gray-500'>Fecha</span><span class='font-medium text-gray-900'>".$_POST["fecha_solicitud"]."</span></div>";
            echo "  </div>";
            echo "</div>";

            // SECCIÓN 2: DATOS PERSONALES
            echo "<div class='bg-white'>";
            echo "  <h2 class='text-xl font-semibold text-gray-800 border-b-2 border-green-500 pb-2 mb-4 mt-6'>Datos personales</h2>";
            
            echo "  <div class='grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-6'>";
            
            // He arreglado las etiquetas HTML (añadiendo la apertura <p> y clases) respetando tus variables
            echo "      <p class='border-b border-gray-100 py-1'><span class='font-bold text-gray-700'>Nombre:</span> <span class='text-gray-600'>".$_POST["nombre"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1'><span class='font-bold text-gray-700'>Apellidos:</span> <span class='text-gray-600'>".$_POST["apellidos"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1'><span class='font-bold text-gray-700'>Edad:</span> <span class='text-gray-600'>".$_POST["edad"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1'><span class='font-bold text-gray-700'>Fecha de nacimiento:</span> <span class='text-gray-600'>".$_POST["fecha_nacimiento"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1'><span class='font-bold text-gray-700'>Nacionalidad:</span> <span class='text-gray-600'>".$_POST["nacionalidad"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1'><span class='font-bold text-gray-700'>Teléfono:</span> <span class='text-gray-600'>".$_POST["telefono"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1'><span class='font-bold text-gray-700'>Género:</span> <span class='text-gray-600'>".$_POST["genero"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1'><span class='font-bold text-gray-700'>Calle:</span> <span class='text-gray-600'>".$_POST["calle"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1'><span class='font-bold text-gray-700'>Municipio:</span> <span class='text-gray-600'>".$_POST["municipio"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1'><span class='font-bold text-gray-700'>Provincia:</span> <span class='text-gray-600'>".$_POST["provincia"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1 md:col-span-2'><span class='font-bold text-gray-700'>Correo:</span> <span class='text-blue-600'>".$_POST["correo"]."</span></p>";
            echo "      <p class='border-b border-gray-100 py-1 md:col-span-2'><span class='font-bold text-gray-700'>Estado civil:</span> <span class='text-gray-600'>".$_POST["estado_civil"]."</span></p>";
            
            // Área de texto con fondo diferente para destacar
            echo "      <div class='md:col-span-2 mt-2 bg-gray-50 p-3 rounded border border-gray-200'>";
            echo "          <span class='block font-bold text-gray-700 mb-1'>Sobre mí:</span>";
            echo "          <p class='text-gray-600 italic'>".$_POST["sobre_mi"]."</p>";
            echo "      </div>";
            
            echo "  </div>"; 
            echo "</div>"; 


            // SECCIÓN 3: ARCHIVO / IMAGEN
            echo "<div class='mt-8 pt-6 border-t-2 border-dashed border-gray-300'>";
            echo "  <h2 class='text-xl font-semibold text-gray-800 mb-4'>Archivo Adjunto</h2>";
            
            $directorioSubida = "archivos/";
            
            // Crear carpeta si no existe (pequeño añadido de seguridad para que no falle)
            if (!file_exists($directorioSubida)) {
                mkdir($directorioSubida, 0777, true);
            }

            if(isset($_FILES["archivo"])){
                $nombre = $_FILES["archivo"]["name"];
                $size = $_FILES["archivo"]["size"];
                $direTemp = $_FILES["archivo"]["tmp_name"];
                $tipoArch = $_FILES["archivo"]["type"];

                $arrayarchivo = pathinfo($nombre);
                // Verificación de seguridad básica por si el archivo no tiene extensión
                $extension = isset($arrayarchivo["extension"]) ? $arrayarchivo["extension"] : '';
                $nombreBase = $arrayarchivo["filename"];
                
                $nombreCom = $directorioSubida.$nombreBase.".".$extension;

                $arrayTipos = ['image/jpeg','image/png','application/pdf'];
                $tamanio = 1024 * 1024; // 1MB

                if (!in_array($tipoArch,$arrayTipos)){
                    echo "<div class='bg-red-100 border-l-4 border-red-500 text-red-700 p-4' role='alert'>
                            <p class='font-bold'>Error</p>
                            <p>Tipo de archivo no válido (solo JPG/PNG).</p>
                          </div>";
                } elseif ($size > $tamanio){
                    echo "<div class='bg-red-100 border-l-4 border-red-500 text-red-700 p-4' role='alert'>
                            <p class='font-bold'>Error</p>
                            <p>Tamaño máximo superado (Máx 1MB).</p>
                          </div>";
                } else {
                    if(move_uploaded_file($direTemp, $nombreCom)){
                        echo "<div class='bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4' role='alert'>
                                <p class='font-bold'>¡Éxito!</p>
                                <p>El archivo se ha subido correctamente.</p>
                              </div>";
                        // Mostramos la imagen con estilo responsive y borde
                        echo "<div class='flex justify-center'>";
                        echo "  <img src='".$nombreCom."' class='max-w-full h-auto rounded-lg shadow-lg border-4 border-white' style='max-height: 300px;'>";
                        echo "</div>";
                    } else {
                        echo "<div class='bg-red-100 border-l-4 border-red-500 text-red-700 p-4' role='alert'>
                                <p>Error al mover el archivo a la carpeta de destino.</p>
                              </div>";
                    }
                }

            } else {
                echo "<div class='bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4' role='alert'>
                        <p class='font-bold'>Atención</p>
                        <p>No se ha recibido ningún archivo o hubo un error en la subida.</p>
                      </div>";
            }

        ?>

        </div>
        
        <div class="bg-gray-50 p-4 text-center border-t border-gray-200">
            <a href="formulario_cv.html" class="text-blue-600 hover:text-blue-800 font-medium">← Volver al formulario</a>
        </div>

    </div>
</body>
</html>