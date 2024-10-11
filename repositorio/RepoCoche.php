<?php

    Class RepoCoche implements RepoCrud{


        private static listaCoches = [];

        function nuevoCoche(Coche coche):Coche
        {

               Conexion::getConection();

               



        return new coche(,,,,,);} //SI NO EXISTE DEVUELVE NULL SI EXISTE NO DA EL ID


        function getById(int id):Coche
        { 
            
            return new Coche(); 
        
        
        }


        
            //METODOS CRUD


        public function create($coche){

            $this.listaCoches = $coche;
            
            //tiene que devolverlo?
        }

        public function update(int $id): Coche {
            $thisCoche = null; // Inicializa la variable en caso de que no se encuentre
        
            foreach ($this->listaCoches as $coche) {
                if ($coche['id'] === $id) { // Compara el id del coche
                    $thisCoche = $coche; // Asigna el coche encontrado
                    break; // Sal del bucle una vez encontrado
                } else {

                    

                }
            }
        
            return $thisCoche; // Retorna el coche encontrado o null
        }
        
        
        public function update($id,$o){




        }
        public function delete($id): bool {
            foreach ($this->listaCoches as $index => $coche) {
                if ($coche['id'] === $id) { // Compara el id del coche
                    unset($this->listaCoches[$index]); // Elimina el coche
                    $this->listaCoches = array_values($this->listaCoches); // Reindexa el array
                    return true; // Retorna true si se eliminó correctamente
                }
            }
            return false; // Retorna false si no se encontró el coche
        }
           
        public function findAll():array{

            return $this->listaCoches;

        }



    }







?>