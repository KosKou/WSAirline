<?php
    require_once '../bean/AirlineBean.php';
    require_once '../util/ConnectDB.php';
    class AirlineDAO{
        public function ListarAirlines(){
            try {
                //Conexion
                 $cn = new ConexionBD();
                 $cnx = $cn->getConexionBD(); 
                 $sql = "SELECT * from airlines; ";     
                 
                 $result = mysqli_query($cnx,$sql);
                 
                 $Lista = array();
                
                while ($fila = mysqli_fetch_assoc($result)){
                        $Lista[] = array('Id'=>$fila['id'],
                            'Aerolinea'=>$fila['name']);
                       }
            } catch (Exception $ex) {
                echo $exc->getTraceAsString();
            }
            return $Lista; 
        }
        public function BuscarAirline(AirlineBean $obj){
            try {
                //Conexion
                 $cn = new ConexionBD();
                 $cnx = $cn->getConexionBD(); 
                 $sql = "SELECT * from airlines where id = $obj->id; ";     
                 
                $result = mysqli_query($cnx,$sql);                 

                $estado = 0;                        

                $LISTA = array();                   
                  while ($fila = mysqli_fetch_assoc($result)){
                    $Id = $fila['id'];
                    $Airline = $fila['name'];
                    
                    $LISTA[] = array('estado'=>'success',
                                            'Id'=>$Id,
                                            'Aerolinea'=>$Airline);
                    }  
            } catch (Exception $ex) {
                echo $exc->getTraceAsString();
            }
            return $LISTA;
        }
    }
?>

