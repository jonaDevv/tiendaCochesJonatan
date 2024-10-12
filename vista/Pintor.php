
<?php

    //*Hacer un metodo para lo que queremos pintar en cada ocasión, 
    //y dentro meteremos el cógido html o php para pintar. Por parametros le apsamos lo que queremos*/

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $root = $_SERVER["DOCUMENT_ROOT"];
    include_once($root."/control/control.php");
    
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
                            <button type='submit' name='id' value='".$coche->getId()."'>COMPRAR</button>
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


        public static function pintaBLogin(){


            echo "<br><br><form method='POST' action='../control/control.php' style='display:inline;'>
            <button type='submit' name='order' value='blogin'>Login</button>
            </form>"; 

            



        }


        public static function pintaInterfaceUser(){


            echo " <br><br>
                    <form action='../modelo/Carrito.php' method='POST'>
                        <input type='hidden' name='order' value='vCarrito'>
                        <button type='submit'>Ver Carrito</button>
                    </form>";

            echo "<br><br><form action='../control/control.php' method='POST'>
            <input type='hidden' name='order' value='logout'><button type=submit>Cerrar sesión</button></form>";



        }

        public static function volver(){
            echo '<form method="GET" action="' . htmlspecialchars($_SERVER['HTTP_REFERER']) . '">
                <button type="submit">Volver</button>
                </form>';
           // Cambia a la URL deseada

        }


        public static function error(){

                echo "No se ha podido realizar la operación";


        }

        public static function exito($coche){

            echo "El $coche se ha añadido al carrito";


        }


        








    }