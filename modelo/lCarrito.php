<?php
     $root = $_SERVER["DOCUMENT_ROOT"];
    
   
   
    

    class Carrito implements RepoCrud{


     
        private static $productos = [];


        
        //METODOS CRUD

        public static function create($coche) {
            // Solo agrega el coche a la colección de productos.
            self::$productos[] = $coche;
        }
        

        public static function read($id): ?Coche { 
            $thisCoche = null; 
        
            foreach (self::$productos as $coche) {
                if ($coche->getId() == $id) { 
                    $thisCoche = $coche; 
                    break;
                }
            }
            
            return $thisCoche; // Retorna el coche encontrado o null
           
        }
        
        
        public static function update($id, $coche): bool {
            foreach (self::$productos as $index => $coche) {
                if ($coche->getId() === $id) { // Compara el ID del coche
                    self::$productos[$index] = $coche; // Actualiza el coche en la lista
                    return true; // Retorna true si se actualizó correctamente
                }
            }
            return false; // Retorna false si no se encontró el coche
        }
        


        public static function delete($id): bool {
            foreach (self::$productos as $index => $coche) {
                if ($coche->getId() === $id) { // Compara el id del coche
                    unset(self::$productos[$index]); // Elimina el coche
                    self::$productos = array_values(self::$productos); // Reindexa el array
                    return true; // Retorna true si se eliminó correctamente
                }
            }

          
            return false; // Retorna false si no se encontró el coche
        }
         
        
        public static function getAll():array
        {

            return self::$productos;

        }


    
    
    
    
    
    
    
    
    
    
    
        





    }

?>