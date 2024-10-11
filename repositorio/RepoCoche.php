<?php

    Class RepoCoche implements RepoCrud{


        private static $listaCoches = [];


        
        //METODOS CRUD

        public static function create($coche){

            self::$listaCoches[] = $coche;
            
            
        }

        public static function read($id): Coche { 
            $thisCoche = null; 
        
            foreach (self::$listaCoches as $coche) {
                if ($coche->getId() === $id) { 
                    $thisCoche = $coche; 
                    break;
                }
            }
        
            return $thisCoche; // Retorna el coche encontrado o null
        }
        
        
        public static function update($id, $coche): bool {
            foreach (self::$listaCoches as $index => $coche) {
                if ($coche->getId() === $id) { // Compara el ID del coche
                    self::$listaCoches[$index] = $coche; // Actualiza el coche en la lista
                    return true; // Retorna true si se actualizó correctamente
                }
            }
            return false; // Retorna false si no se encontró el coche
        }
        


        public static function delete($id): bool {
            foreach (self::$listaCoches as $index => $coche) {
                if ($coche->getId() === $id) { // Compara el id del coche
                    unset(self::$listaCoches[$index]); // Elimina el coche
                    self::$listaCoches = array_values(self::$listaCoches); // Reindexa el array
                    return true; // Retorna true si se eliminó correctamente
                }
            }
            return false; // Retorna false si no se encontró el coche
        }
         
        
        public static function getAll():array
        {

            return self::$listaCoches;

        }



    }







?>