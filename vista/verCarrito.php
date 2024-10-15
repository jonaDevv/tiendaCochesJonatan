<?php 
    $root = $_SERVER["DOCUMENT_ROOT"];
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include_once($root."control/control.php");


    Pintor::viewCarrito();
    


?>