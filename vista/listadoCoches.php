<?php

$root = $_SERVER["DOCUMENT_ROOT"];
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once($root."control/control.php");
include_once($root."helper/sesion.php");



  $user=null;
  iniciaSesion();
 
  if (!existeClave('carrito')){

        escribirSesion('carrito',[]);
    };
   

    if (estaLogeado()) {
        // Usuario existe y está logueado
        $user=$_SESSION['user'];
    }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $verbo=$_POST['marca'];

  }else{

    $verbo=$_GET['marca'];
  }




  $marca=$verbo;

  
  
    
    

    dameCoches($marca,$user,$marca);

        
    
       

?>