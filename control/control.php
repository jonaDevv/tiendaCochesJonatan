<?php 




    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once($root."repositorio/repoMarca.php");
    include_once($root."repositorio/repoCoche.php");
    include_once($root."vista/Pintor.php");
    include_once($root."repositorio/repoMarca.php");
    include_once($root."repositorio/repoCoche.php");
    include_once($root."repositorio/repoCocheBD.php");
    include_once($root."helper/login.php");
    include_once($root."helper/sesion.php");
    include_once($root."modelo/lCarrito.php");
    include_once($root."modelo/Carrito.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
    
    
    iniciaSesion();

    
  
    


    //Arrancamos la aplicacion
    function run(){


        header("location:../vista/listadoMarcas.php");
        exit();
            //Pintor::pintaMarcas(RepoMarca::getAll());
            




        
    } 



  

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $order = $_POST['order'] ?? NULL;
        

        // Comenzamos la estructura switch para que el controlador vaya repartiendo trabajo
        switch ($order) {
            case 'vCarrito':
                $or=$_POST['volver'];
                $mark=$_POST['marca'];
                header("location:../vista/verCarrito.php?origen=$or&&marca=$mark");
                break;


            case 'blogin':
                header("location:../vista/i.html");
                break;

            case 'compra':

                $idn=$_POST['id'];
                $marc=$_POST['marca'];
                header("location:../vista/listadoCoches.php?marca=$marc");
                paraCarrito($idn);
              
                break;

            case 'eliminar':

                $index=$_POST['eliminar'];
                
                vaciarCarrito($index);
                header("location:../vista/verCarrito.php");
                  
                break;


                
            case 'lMarcas':
                
                $marca=$_POST['marca'];
                header("location:../vista/listadoCoches.php?marca=$marca");
                exit();
                break;



            case 'logout':
                logout();
                    //Reconduciomos al index de nuevo
                    echo "<h1>Hasta otra</h1>";
                    header("refresh:1; url=../index.php");
                    exit();
                break;
            default:
                
                break;
        }


    }  


    //ESTRUCTURA DE CONTROL PARA VOLVER
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $origen = $_POST['origen'] ?? NULL;
        

        // Comenzamos la estructura switch
        switch ($origen) {

            case 'MarcasCarrito':
                header("location:../vista/listadoMarcas.php");
                break;


            case 'CocheMarca':
                header("location:../vista/listadoMarcas.php");
                break;

            case 'CarritoCoche':

                $m=$_POST['marca']?? null;
                
                header("location:../vista/listadoCoches.php?marca=$m");
                
               
              
                break;
            
           

            default:
                
                echo "FALLOO";
                break;
        }


    }  






    function vLogeo()
    {
        $us=$_GET['user'];
        $pass=$_GET['password'];

        header("location:../forms/LoginForm.html/?user=$us&&password=$pass");
        exit();




    }












    function dameMarcas($user=null){

        Pintor::pintaMarcas(RepoMarca::getAll());

        Pintor::pintaBCarrito('MarcasCarrito');

        if (isset($user)){
            
            Pintor::pintaInterfaceUser();
            
        }else{
             Pintor::pintaBLogin();
        }

        

    }





    function dameCoches($marca,$user=null){

        


        Pintor::pintaCoches(RepoCocheBD::getAll(),$marca);


      
        Pintor::pintaBCarrito('CarritoCoche',$marca);
        Pintor::volver('CocheMarca');

        if (isset($user)){
            
            Pintor::pintaInterfaceUser();
            
        }else{
             Pintor::pintaBLogin();
        }

        





    }


    function paraCarrito($n) {
        
      
        $newCoche = RepoCocheBD::read($n);
        cocheACarrito($newCoche);
        
     
    }


    function vaciarCarrito($i) {
        
        
        
        eliminarCocheCarrito($i);
        
        
       
    }

    


   







?>

