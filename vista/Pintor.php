
<?php

    //*Hacer un metodo para lo que queremos pintar en cada ocasión, 
    //y dentro meteremos el cógido html o php para pintar. Por parametros le apsamos lo que queremos*/

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once($root."/control/control.php");
    include_once($root."/repositorio/Conexion.php");
    
    class Pintor
    {
        
        public static function pintaMarcas($listaMarcas)
        {
            if (!empty($listaMarcas)) {
                echo "<table>
                <thead>
                    <tr>
                        <th>MARCAS</th>
                        
                    </tr>
                </thead><tbody><tr>";
                foreach ($listaMarcas as $marca) {
                    echo "<tr>
                    <td>
                        <form method='POST' action='listadoCoches.php' style='display:inline;'>
                            <input type='hidden' name='order' value='lMarcas'>
                            <button type='submit' name='marca' value='".$marca->getNombre()."'>".$marca->getNombre()."</button>
                        </form>
                    </td>
                  </tr>";
                }
                echo "</tbody></table>";
                
            
            } else {
                echo "<p>No hay marcas</p><br>";
                var_dump($listaMarcas);
                
                
                
            }


        }

        
        public static function pintaCoches($listaCoches,$marca)
        {   
            if(!empty($listaCoches))
            {    
                echo "<table>
                <thead>
                <tr>
                <th>COCHES</th>
                </tr>
                </thead><tbody><tr>";
                foreach($listaCoches as  $coche) {

                    if($coche->getMarca() === $marca)
                    {
                        echo "<tr>
                    <td>
                    ".$coche->getMarca()." ".$coche->getModelo()."
                        <form method='POST' action='../control/control.php' style='display:inline;'>
                            <input type='hidden' name='marca' value='".$coche->getMarca()."'>
                            <input type='hidden' name='order' value='compra'>
                                               <button type='submit' name='id' value='".$coche->getId()."'>COMPRAR</button><br>
                        </form>
                        </td>
                        </tr>";

                    }
                     echo "</tbody></table>";

                }

            } else{

                echo "No hay coches de la marca $marca";


            }   



        }


        public static function viewCarrito(){

                        // Mostrar el carrito con el botón de eliminar
            if (!empty($_SESSION['carrito'])) {
                echo "<h2>Carrito de Compras:</h2><ul>";
                foreach ($_SESSION['carrito'] as $index => $coche) {
                    echo "<li> 
                    ".$coche->getMarca()." ".$coche->getModelo()."
                        <form method='POST' action='../control/control.php' style='display:inline;'>
                            <input type='hidden' name='order' value='eliminar'>
                            <button type='submit' name='eliminar' value='$index'>Eliminar</button>
                        </form>
                        </li>";
                }
                echo "</ul><br><br>";
                

            } else {
                echo "<p>El carrito está vacío.</p><br>";
                
                
    
            }
            

            //Pintor::volver();



        }


        public static function pintaBLogin(){


            echo "<br><br><form method='POST' action='../control/control.php' style='display:inline;'>
            <button type='submit' name='order' value='blogin'>Login</button>
            </form>"; 

            



        }
        

        public static function pintaBCarrito($origin=null,$marca=null){


            echo " <br>
                    <form action='../control/control.php' method='POST'>
                        <input type='hidden' name='volver' value='$origin'>
                        <input type='hidden' name='marca' value='$marca'>
                        <input type='hidden' name='order' value='vCarrito'>
                        <button type='submit'>Ver Carrito</button>
                    </form>";

            



        }


        public static function pintaInterfaceUser(){


            
            echo "<br><br><form action='../control/control.php' method='POST'>
            <input type='hidden' name='order' value='logout'><button type=submit>Cerrar sesión</button></form>";



        }

        public static function volverF($origen){
            echo '<br><br><form method="POST" action="' . htmlspecialchars($_SERVER['HTTP_REFERER']) . '">
                <button type="submit">Volver</button>
                </form>';
           // Cambia a la URL deseada

        }
       
        public static function volver($origen=null,$marca=null){
                echo " <br>
                            <form action='../control/control.php' method='POST'>
                                <input type='hidden' name='marca' value='$marca'>
                                <input type='hidden' name='origen' value='$origen'>
                                <button type='submit'>Volver</button>
                            </form>";
        
                }

        


        public static function error($error){

                echo "No se ha podido realizar la operación";
               


        }

        public static function exito($coche){

            echo "El $coche se ha añadido al carrito";
            

        }


        








    }