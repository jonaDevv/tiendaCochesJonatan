<?php

    /*Class ejemploRepo
    {
        private $con;


        public  function __construct($con)
        {
                $this->con = $con;
        }



        public function findById($id)
        {
            $stmt=$this->con->prepare("select * from coche where id= :id");
            $stmt->execute(['id'=>$id]);
            $coche=null;
            $registro = $stmt->fetch();

            if($registro){

                $coche = new Coche();
                $coche->id = $registro['id'];
                $coche->modelo = $registro['modelo'];
                $coche->marca = $registro['marca'];

                
            
            }

            return $coche;
        }



    
    } //rc=new repoCoche(Conexion::getConnection());
    
     //&miCoche = $rc -> findbyid(1); //buscaos este coche
    //car_dump($micoche);

?>