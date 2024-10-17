<?php
    
    //TIENE QUE HACER INCLUDE DE SESION 

    function login($nombre){ //Solo para USERRR

        iniciaSesion();
        $_SESSION['user']=$nombre;

    };


    function logout(){

        
        //$_SESSION['USER']="";
        session_unset(); 
        finalizaSesion();

    };


    function estaLogeado() {
        return isset($_SESSION['user']);
    }

    



    //1.Iniciar sesion
    //2. Si esta logeado?
?>