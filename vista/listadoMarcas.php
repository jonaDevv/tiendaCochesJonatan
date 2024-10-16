<?php
$root = $_SERVER["DOCUMENT_ROOT"];
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once($root."control/control.php");





    if(!isset($user)){
    $user = null; // Obtener usuario de la sesión
    }
    
    if (estaLogeado()) {
        // Usuario existe y está logueado
        $user=$_SESSION['user'];
    }


    dameMarcas($user);


?>




