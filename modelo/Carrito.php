<?php

$root = $_SERVER["DOCUMENT_ROOT"];

include_once($root."control/control.php");
include_once($root."helper/sesion.php");



if (!existeClave('carrito')){

    escribirSesion('carrito',[]);
};

function cocheACarrito($coche) {
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = []; // Asegúrate de que la sesión del carrito esté inicializada
    }

    if (!empty($coche)) {
        array_push($_SESSION['carrito'], $coche); // Agregar el coche al carrito
        Pintor::exito($coche);
    } else {
        
      
            
        Pintor::error($coche);
    }
}



// Eliminar el coche seleccionado del carrito
function eliminarCocheCarrito($index){


            if (isset($_SESSION['carrito'][$index])) {

                unset($_SESSION['carrito'][$index]);  // Eliminar coche del carrito
                $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar array
                echo "<p>Coche eliminado del carrito.</p>";
            }
            
        
}


 

    
 
   


//var_dump($origen);





?>