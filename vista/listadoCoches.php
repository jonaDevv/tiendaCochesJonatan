<?php

$root = $_SERVER["DOCUMENT_ROOT"];
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once($root."control/control.php");
include_once($root."helper/sesion.php");


var_dump($_SESSION);
  $user=null;
  $marca=$_GET['marca'];
  
  iniciaSesion();
 
  if (!existeClave('carrito')){

        escribirSesion('carrito',[]);
    };
   
   
   


    if (estaLogeado()) {
        // Usuario existe y está logueado
        $user=$_SESSION['user'];
    }
    
    

        dameCoches($marca,$user);

        
    var_dump(RepoCoche::read("3"));
        var_dump($_SESSION['carrito']);

?>