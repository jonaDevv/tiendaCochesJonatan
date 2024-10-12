<?php 

    

    function iniciaSesion(){

        session_start();


    }

    function finalizaSesion(){

        session_destroy();
    
    }

    //Escribir sesion   escribirSesion(user,nombre);
    function leerSesion($clave){// Dice si existe o no. Devuelve true o false

        (isset($_SESSION[$clave]))? $respuesta=$_SESSION[$clave]: $respuesta="Desconocido";

        return $respuesta;
    };

    function existeClave($clave):bool
    {// Dice si existe o no. Devuelve true o false

        return isset($_SESSION[$clave]);
    };



    //Leer la sesion
    function escribirSesion($clave,$valor){ //Guardar cualquier clave valor

        iniciaSesion();
        $_SESSION[$clave]=$valor;


    };

    

?>