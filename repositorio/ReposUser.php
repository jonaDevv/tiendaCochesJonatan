<?php
    include_once("repoCrud.php");

        Class RepoUser implements RepoCrud{


        private static $listaUser = [];



        //METODOS CRUD

        public static function create($user){

            self::$listaUser[] = $user;
            
            
        }

        public static function read($nombre): ?User { 
            $thisUser = null; 

            foreach (self::$listaUser as $user) {
                if ($user->getNombre() === $nombre) { 
                    $thisUser = $user; 
                    break;
                }
            }

            return $thisUser; // Retorna el coche encontrado o null
        }


        public static function update($nombre, $user): bool {
            foreach (self::$listaUser as $index => $user) {
                if ($user->getNombre() === $nombre) { // Compara el ID del coche
                    self::$listaUser[$index] = $user; // Actualiza el coche en la lista
                    return true; // Retorna true si se actualizó correctamente
                }
            }
            return false; // Retorna false si no se encontró el coche
        }



        public static function delete($user): bool {
            foreach (self::$listaUser as $index => $user) {
                if ($user->getNombre() === $user) { // Compara el id del coche
                    unset(self::$listaUser[$index]); // Elimina el coche
                    self::$listaUser = array_values(self::$listaUser); // Reindexa el array
                    return true; // Retorna true si se eliminó correctamente
                }
            }
            return false; // Retorna false si no se encontró el coche
        }
        

        public static function getAll():array
        {

            return self::$listaUser;

        }



        }
