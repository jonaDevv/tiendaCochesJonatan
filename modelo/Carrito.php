<?php
$origen=$_POST['origen'];
$root = $_SERVER["DOCUMENT_ROOT"];

include_once($root."helper/sesion.php");

iniciaSesion();
if (existeClave('carrito')){

    escribirSesion('carrito',[]);
};
/*if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verbo = $_POST['marca'];
} else {
    $verbo = $_GET['marca'];
}*/


//$marca = $verbo;


// Eliminar el coche seleccionado del carrito
if (isset($_POST['eliminar'])) {
    $index = $_POST['eliminar'];
    if (isset($_SESSION['carrito'][$index])) {
        unset($_SESSION['carrito'][$index]);  // Eliminar coche del carrito
        $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar array
        echo "<p>Coche eliminado del carrito.</p>";
    }
    
}


 
// Mostrar el carrito con el botón de eliminar
if (!empty($_SESSION['carrito'])) {
    echo "<h2>Carrito de Compras:</h2><ul>";
    foreach ($_SESSION['carrito'] as $index => $coche) {
        echo "<li>$coche 
              <form method='POST' action='' style='display:inline;'>
                  <button type='submit' name='eliminar' value='$index'>Eliminar</button>
              </form>
              </li>";
    }
    echo "</ul><br><br>";
    

} else {
    echo "<p>El carrito está vacío.</p><br>";
    
    
    
}

Pintor::volver();

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