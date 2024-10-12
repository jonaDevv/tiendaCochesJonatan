<?php


    Class Marca{

        private String $nombre;
        
        
        public function __construct(String $nombre){

            $this->setNombre($nombre);
            
        }


        

        public function getNombre():String
        {
            
            return $this->nombre;
        }

        public function setNombre($name):void
        {

            $this->nombre = strtoupper($name);


        }











    }