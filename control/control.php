<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);



    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once($root."vista/Pintor.php");
    include_once($root."repositorio/repoMarca.php");
    include_once($root."repositorio/repoCoche.php");
    include_once($root."modelo/Marca.php");
    include_once($root."modelo/Coche.php");
    include_once($root."helper/login.php");
    include_once($root."helper/sesion.php");


    
    iniciaSesion();
    
    

//include_once("../vista/Pintor.php");
//include_once("../repositorio/RepoMarca.php");

//todo pasa por control
//un fchero por cada
//valido según quien es
//Esta logeado o no esta logeado

//Si me gusta voy a un repo a guardar, modificar etc.. y me traigo un array de objetos para darselos a la vista para que los pinte

    //Arrancamos la aplicacion
    function run(){


        header("location:../vista/listadoMarcas.php");
        exit();
            //Pintor::pintaMarcas(RepoMarca::getAll());
            




        
    } 



    //ESPACIO DE CONTROL MEDIANTE ELSE IF

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $order =$_POST['order'];
        

        // Comenzamos la estructura switch
        switch ($order) {
            case 'vCarrito':
                header("location:../modelo/Carrito.php");
                break;
            case 'blogin':
                header("location:../vista/i.html");
                break;
            case 'compra':
                $idn=$_POST['id'];
                $marc=$_POST['marca'];
                var_dump($idn);
                cocheACarrito($idn);
                header("location:../vista/listadoCoches.php?marca=$marc");
                break;
            case 'lMarcas':
                
                $marca=$_POST['marca'];
                header("location:../vista/listadoCoches.php?marca=$marca");
                break;
            case 'logout':
                logout();
                    //Reconduciomos al index de nuevo
                    echo "<h1>Hasta otra</h1>";
                    header("refresh:1; url=../index.php");
                    exit();
                break;
            default:
                echo "Orden no válida.";
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



        $m1 = new Marca("ford");
        $m2 = new Marca("mercedes");
        $m3 = new Marca("renault");
        $m4 = new Marca("seat");
        $m5 = new Marca("fiat");

       


        repoMarca::create($m1);
        repoMarca::create($m2);
        repoMarca::create($m3);
        repoMarca::create($m4);
        repoMarca::create($m5);



        Pintor::pintaMarcas(RepoMarca::getAll());

        if (isset($user)){
            
            Pintor::pintaInterfaceUser();
            
        }else{
             Pintor::pintaBLogin();
        }

        

    }


    function dameCoches($marca,$user=null){

        


        $c1 = new Coche(1,"ford","Mondeo");
        $c2 = new Coche(2,"Mercedes","CLQ700");
        $c3 = new Coche(3,"renault","CLIO");
        $c4 = new Coche(4,"seat","Leon");
        $c5 = new Coche(5,"ford","focus rs3");

        repoCoche::create($c1);
        repoCoche::create($c2);
        repoCoche::create($c3);
        repoCoche::create($c4);
        repoCoche::create($c5);

        //if (isset($_POST['marca'])) {
           
        //}


        Pintor::pintaCoches(RepoCoche::getAll(),$marca);

        Pintor::volver();
        if (isset($user)){
            
            Pintor::pintaInterfaceUser();
            
        }else{
             Pintor::pintaBLogin();
        }

        





    }


    function cocheACarrito($id){
        
        $coche=RepoCoche::read($id);
        
        var_dump($coche);
        if (isset($coche)) {
            $newCoche = $coche;
            array_push($_SESSION['carrito'], $newCoche);  // Agregar el modelo al carrito
            Pintor::exito($newCoche);
            
        }else{

            Pintor::error();
        }


    }

    


   







?>

