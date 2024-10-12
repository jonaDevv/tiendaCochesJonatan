<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);



    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once($root."vista/Pintor.php");
    include_once($root."repositorio/repoMarca.php");
    include_once($root."repositorio/repoCoche.php");
    include_once($root."modelo/Marca.php");
    include_once($root."modelo/Coche.php");
   

//include_once("../vista/Pintor.php");
//include_once("../repositorio/RepoMarca.php");

//todo pasa por control
//un fchero por cada
//valido según quien es
//Esta logeado o no esta logeado

//Si me gusta voy a un repo a guardar, modificar etc.. y me traigo un array de objetos para darselos a la vista para que los pinte

    function run(){


        header("location:../vista/listadoMarcas.php");
        exit();
            //Pintor::pintaMarcas(RepoMarca::getAll());
            




        
    }  

    function dameMarcas(){



        $m1 = new Marca("FORD");
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

    }


    function dameCoches(){


        $c1 = new Coche(1,"FORD","Mondeo");
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
            $marca = "FORD";  
        //}


        Pintor::pintaCoches(RepoCoche::getAll(),$marca);

    }








?>

