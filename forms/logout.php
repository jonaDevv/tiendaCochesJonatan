<?php
    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once($root."helper/login.php");
    include_once($root."helper/sesion.php");
   


    //Cerramos sesión y la destruimos
    logout();

    //Reconduciomos al index de nuevo
    echo "<h1>Hasta otra</h1>";
    header("refresh:1; url=../index.php");
    exit();
    



?>