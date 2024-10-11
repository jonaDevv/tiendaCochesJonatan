<?php

    Class RepoMarca implements RepoCrud{

        public static $listaMarcas = [];


        public static function create($marca){

            self::$listaMarcas = $marca;

        }

        public static function read($nombre):Marca{

            $thisMarca =  null;

            foreach(self::$listaMarcas as  $marca)
            {
                if ($marca->getNombre() === $nombre) { 
                    $thisMarca = $marca; 
                    break;
                }
            }


            return $thisMarca;


        }

        public static function update($nombre, $marca): bool {
            foreach (self::$listaMarcas as $index => $marca) {
                if ($marca->getNombre() === $nombre) { // Compara el ID del coche
                    self::$listaMarcas[$index] = $marca; // Actualiza el coche en la lista
                    return true; // Retorna true si se actualizó correctamente
                }
            }
            return false; // Retorna false si no se encontró el coche
        }

        public static function delete($nombre):bool
        {
            foreach (self::$listaMarcas as $index => $marca) {
                if ($marca->getNombre() === $nombre) { // Compara el id del coche
                    unset(self::$listaMarcas[$index]); // Elimina el coche
                    self::$listaMarcas = array_values(self::$listaMarcas); // Reindexa el array
                    return true; // Retorna true si se eliminó correctamente
                }
            }
            return false; // Retorna false si no se encontró el coche
        }      
          
        public static function getAll():array
        {

            return self::$listaMarcas;         
        }











    }







?>