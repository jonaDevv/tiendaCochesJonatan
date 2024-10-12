<?php

    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once("repoCrud.php");
    include_once($root."modelo/Marca.php");

    Class repoMarca implements RepoCrud{

        public static $listaMarcas = [];


        public static function create($marca){

            self::$listaMarcas[] = $marca;

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

        public static function update($nombre, $nuevaMarca): bool {
            foreach (self::$listaMarcas as $index => $marca) {
                if ($marca->getNombre() === $nombre) {
                    self::$listaMarcas[$index] = $nuevaMarca; // Actualiza con la nueva marca
                    return true; // Retorna true si se actualizó correctamente
                }
            }
            return false; // Retorna false si no se encontró la marca
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