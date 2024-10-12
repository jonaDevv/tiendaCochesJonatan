<?php
$root = $_SERVER["DOCUMENT_ROOT"];
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once($root."control/control.php");

//Esta logeado, tiene autorización, datos válidos 
//Si no me gusta header para donde sea, y muestro la vista
//Obtención de datos o realizar operación
//actualizo vista
//Una vez que actualizas la vista puedes Pintor.pista($array,listado.html)
//Los html dentro de funciones, o includes , lo guardamos dentro de vista.

 dameMarcas();
 dameCoches();











?>




