//Nombre unico y contraseña para saber si esta
//Contar los usuario logeados
//A hacer login le damos a crear

<?php

    Class User{

        private string $nombre;
        private string $password;
      
        public function __construct(string $nombre,string $password){

            $this->setNombre($nombre);
            $this->setPassword($password);
            

        }


        public function getNombre():string
        {

            return $this->nombre;
        }

        public function setNombre($nombre):void
        {

            $this->nombre = $nombre;


        }

        public function getPassword():string
        {

            return $this->password;
        }

        public function setPassword($password):void
        {

            $this->password = $password;


        }






    }































?>