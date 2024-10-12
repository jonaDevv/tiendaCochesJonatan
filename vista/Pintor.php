
<?php
    //*Hacer un metodo para lo que queremos pintar en cada ocasión, 
    //y dentro meteremos el cógido html o php para pintar. Por parametros le apsamos lo que queremos*/
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
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
                        <form method='POST' action='' style='display:inline;'>
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
                        <form method='POST' action='' style='display:inline;'>
                            <button type='submit' name='coche' value='".$coche->getId()."'>COMPRAR</button>
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








    }