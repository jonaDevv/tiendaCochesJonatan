
<?php
    $root = $_SERVER["DOCUMENT_ROOT"];
    
     include_once("$root/helper/login.php");
     include_once("$root/helper/sesion.php");

     error_reporting(E_ALL);
     ini_set('display_errors', 1);
 
    $filePath = "";
    //validamos los datos
    $user=strtoupper($_GET['user']);
    $password=strtoupper($_GET['password']);
   
    if($user == "JONATAN" && $password == "1234") {
        login($user);
        
    
        if(estaLogeado()) {
            header("location:../vista/listadoMarcas.php?user=$user");
            exit();
        } else {
            echo "Error al logear";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario o contraseña incorrectos. Redirigiendo a la página de inicio...";
        header("refresh:2; url=../index.php"); // Redirige después de 2 segundos
    }



?>