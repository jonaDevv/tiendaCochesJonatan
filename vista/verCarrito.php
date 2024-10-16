<?php 
    $root = $_SERVER["DOCUMENT_ROOT"];
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once($root."control/control.php");

    $origen=$_GET['origen']?? "MarcasCarrito";
    $marca=$_GET['marca'] ?? null;
   
  

    Pintor::viewCarrito();
    Pintor::volver($origen,$marca);
    


?>