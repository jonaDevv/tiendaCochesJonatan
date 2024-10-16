<?php
// autoload.php
spl_autoload_register(function($clase)
{
    // Lista de carpetas donde se buscarán las clases
    $carpetas = [
        'modelo',
        'repositorio',
        'vista',
        'helper',
        'forms',
        'control',
        'config'
    ];

    $i = 0; // Inicializamos un contador para el índice del array
    $numCarpetas = count($carpetas); // Obtenemos el número de carpetas

    // Usamos un bucle while para recorrer las carpetas
    while ($i < $numCarpetas) {
        $fichero = $_SERVER['DOCUMENT_ROOT'] . '/' . $carpetas[$i] . '/' . $clase . '.php';

        // Si el archivo existe, se carga
        if (file_exists($fichero)) {
            require_once $fichero;
            return; // Salimos de la función una vez que se encuentra el archivo
        }

        $i++; // Incrementamos el contador
    }

    // Si no se encuentra el archivo, podrías manejar el error
    throw new Exception("No se pudo cargar la clase: $clase");
    
});

