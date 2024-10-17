<?php

    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once("repoCrud.php");
    include_once($root."modelo/Marca.php");

    Class repoMarca implements RepoCrud{

        public static $listaMarcas = [];


        public static function create($marca){

            self::$listaMarcas[] = $marca;



        }

        
        public static function read($nombre): ?Marca { 
            // Obtener la conexión a la base de datos
             $conn = BdConnection::getConnection();
 
             $stmt=$conn->prepare("select * from marca where nombre= :nombre");
             $stmt->execute(['nombre'=>$nombre]);
             $marca=null;
             $registro = $stmt->fetch(PDO::FETCH_OBJ);
 
             if($registro){
 
                 
                 
                 $marca = new Marca($registro->nombre);
                 
 
                 
             
             }
 
             return $marca;
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

             // Obtener la conexión a la base de datos
             $conn = BdConnection::getConnection();

             // Preparar la consulta
             $sql = "SELECT * FROM marca"; // Cambia "coche" por el nombre de tu tabla
             $stmt = $conn->prepare($sql);
 
             // Ejecutar la consulta
             $stmt->execute();
 
             // Usar fetch con FETCH_OBJ para obtener objetos
             while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                 // Crear un nuevo objeto Coche y agregarlo a la lista
                 $marca = new Marca($row->nombre);
                 self::$listaMarcas[] = $marca; // Añadir a la lista de marcas
             }
 
 
             return self::$listaMarcas;        
        }











    }







?>