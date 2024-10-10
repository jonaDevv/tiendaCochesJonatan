<?php
    
    //TIENE QUE HACER INCLUDE DE SESION 

    function login($nombre){ //Solo para USERRR

        iniciaSesion();
        $_SESSION['user']=$nombre;

    };


    function logout(){

        
        //$_SESSION['USER']="";
        unset($_SESSION);
        finalizaSesion();

    };


    function estaLogeado(){


         if (isset($_SESSION['user'])){

            $respuesta=true;

         }else{   

            $respuesta=false;


         }; 
         return $respuesta;  //Devuelve TRUE o false

    };

    



    //1.Iniciar sesion
    //2. Si esta logeado?
?>