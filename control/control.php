<?php 




    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once($root."repositorio/repoMarca.php");
    include_once($root."repositorio/repoCoche.php");
    include_once($root."vista/Pintor.php");
    include_once($root."repositorio/repoMarca.php");
    include_once($root."repositorio/repoCoche.php");
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



    //ESPACIO DE CONTROL MEDIANTE ELSE IF

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $order =$_POST['order'];
        

        // Comenzamos la estructura switch
        switch ($order) {
            case 'vCarrito':
                header("location:../vista/verCarrito.php");
                break;
            case 'blogin':
                header("location:../vista/i.html");
                break;
            case 'compra':

                $idn=$_POST['id'];
                $marc=$_POST['marca'];
                var_dump($idn);
                paraCarrito($idn);
              
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

        Pintor::pintaBCarrito();

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

        RepoCoche::create($c1);
        RepoCoche::create($c2);
        RepoCoche::create($c3);
        RepoCoche::create($c4);
        RepoCoche::create($c5);

        //if (isset($_POST['marca'])) {
           
        //}


        Pintor::pintaCoches(RepoCoche::getAll(),$marca);


        Pintor::volver();
        Pintor::pintaBCarrito();

        if (isset($user)){
            
            Pintor::pintaInterfaceUser();
            
        }else{
             Pintor::pintaBLogin();
        }

        





    }


    function paraCarrito($n) {
        
        echo "ID recibido: " . $n . "<br>"; // Verifica el ID recibido
        $newCoche = RepoCoche::read($n);
        
        if ($newCoche) {
            echo "Coche encontrado: " . $newCoche->getModelo() . "<br>"; // Si existe, imprime el modelo
        } else {
            echo "No se encontró el coche con ID: $n<br>"; // Mensaje si no existe
        }
    }

    


   







?>

