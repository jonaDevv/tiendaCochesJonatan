<?php
    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once($root."/repositorio/repoCrud.php");
    include_once($root."/modelo/Coche.php");


    Class RepoCocheBD implements RepoCrud{
        


        private static $listaCoches = [];


        
        //METODOS CRUD

        public static function create($coche){


            

            self::$listaCoches[] = $coche;
            
            
        }

        public static function read($id): ?Coche { 
           // Obtener la conexión a la base de datos
            $conn = BdConnection::getConnection();

            $stmt=$conn->prepare("select * from coche where id= :id");
            $stmt->execute(['id'=>$id]);
            $coche=null;
            $registro = $stmt->fetch(PDO::FETCH_OBJ);

            if($registro){

                
                
                $coche = new Coche($registro->id,$registro->marca,$registro->modelo);
                

                
            
            }

            return $coche;
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
            
            try{
            
                $conn = BdConnection::getConnection();

                $stmt=$conn->prepare("DELETE from coche where id= :id");
                $stmt->execute(['id'=>$id]);
                $registro = $stmt->fetch();

                return $registro;

            }catch (PDOException $e) {
                // Manejo de errores de conexión
                die("Error en la conexión: " . $e->getMessage());
            }

            
        }
         
        
        public static function getAll():array
        {

                       
            // Obtener la conexión a la base de datos
            $conn = BdConnection::getConnection();

            // Preparar la consulta
            $sql = "SELECT * FROM coche"; // Cambia "coche" por el nombre de tu tabla
            $stmt = $conn->prepare($sql);

            // Ejecutar la consulta
            $stmt->execute();

            // Usar fetch con FETCH_OBJ para obtener objetos
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                // Crear un nuevo objeto Coche y agregarlo a la lista
                $coche = new Coche($row->id, $row->marca, $row->modelo);
                self::$listaCoches[] = $coche; // Añadir a la lista de coches
            }


            return self::$listaCoches;
        }








    }


    



    







?>