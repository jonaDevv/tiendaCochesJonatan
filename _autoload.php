<?php
spl_autoload_register(function($clase)
{
    $root = $_SERVER["DOCUMENT_ROOT"];
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

    // Recorrer todas las carpetas para buscar el archivo de la clase
    foreach ($carpetas as $carpeta) {
        $fichero = $root . '/' . $carpeta . '/' . $clase . '.php';
        
        // Si el archivo existe en alguna carpeta, se carga
        if (file_exists($fichero)) {
            require_once $fichero;
            return; // Salir del bucle una vez que se encuentra el archivo
        }
    }

    // Si no se encuentra el archivo, podrías manejar el error
    throw new Exception("No se pudo cargar la clase: $clase");
});

