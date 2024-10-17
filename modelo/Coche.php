<?php

    Class Coche
    {
        private int $id;
        private string $marca;
        private string $modelo;

        public function __construct(int $id,string $marca,string $modelo){

            $this->setId($id);
            $this->setMarca($marca);
            $this->setModelo($modelo);

        }


        public function getId():int
        {

            return $this->id;
        }

        public function setId($id):void
        {

            $this->id = $id;


        }

        
        public function getMarca():string
        {

            return $this->marca;
        }

        public function setMarca($marca):void
        {

            $this->marca = strtoupper($marca);


        }

        public function getModelo():string
        {

            return $this->modelo;
        }

        public function setModelo($modelo):void
        {

            $this->modelo = strtoupper($modelo);


        }






        


        




    }