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
        echo "<p>El coche {$coche->getId()} ha sido agregado al carrito.</p>";
    } else {
        
      
            
        Pintor::error($coche);
    }
}



// Eliminar el coche seleccionado del carrito
if (isset($_POST['eliminar'])) {
    $index = $_POST['eliminar'];
    if (isset($_SESSION['carrito'][$index])) {
        unset($_SESSION['carrito'][$index]);  // Eliminar coche del carrito
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar array
        echo "<p>Coche eliminado del carrito.</p>";
    }
    
}


 
/*

/* 
if (!empty($origen)) { //Si origen no esta vacio vuelve a la referencia
    echo "<form action='$origen' method='POST'><input type='hidden' name='marca' value='$marca'><button type=submit>Volver</button></form>";

} else {

    //Al borrar cosas del carro se recarga la sesión y se pierde la referencia en este caso diregiremos directamente
    if(!empty($marca)){ 
        
        echo "<form action='listadoCoches.php' method='POST'>
        <input type='hidden' name='marca' value='$marca'>
        <button type='submit'>Volver</button>
        </form>";

    }else{

        echo "<form action='listadoMarcas.php' method='POST'>
        <input type='hidden' name='marca' value='$marca'>
        <button type='submit'>Volver</button>
        </form>";
       

            
    }

        
       
}*/
    
 
   


//var_dump($origen);





?>