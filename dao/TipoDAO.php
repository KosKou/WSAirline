<?php
    require_once '../bean/TipoBean.php';
    require_once '../util/ConnectDB.php';
    class TipoDAO{
        public function ListarTipos(){
            try {
                //Conexion
                 $cn = new ConexionBD();
                 $cnx = $cn->getConexionBD(); 
                 $sql = "SELECT * from tipo; ";     
                 
                 $result = mysqli_query($cnx,$sql);
                 
                 $Lista = array();
                
                while ($fila = mysqli_fetch_assoc($result)){
                        $Lista[] = array('Id'=>$fila['id'],
                            'Tipo'=>$fila['tipo']);
                       }
            } catch (Exception $ex) {
                echo $exc->getTraceAsString();
            }
            return $Lista; 
        }
        public function BuscarTipo(TipoBean $obj){
            try {
                //Conexion
                 $cn = new ConexionBD();
                 $cnx = $cn->getConexionBD(); 
                 $sql = "SELECT * from tipo where id = $obj->id; ";     
                 
                $result = mysqli_query($cnx,$sql);                 

                $estado = 0;                        

                $LISTA = array();                   
                  while ($fila = mysqli_fetch_assoc($result)){
                    $Id = $fila['id'];
                    $Tipo = $fila['tipo'];
                    
                    $LISTA[] = array('estado'=>'success',
                                            'Id'=>$Id,
                                            'Tipo'=>$Tipo);
                    }  
            } catch (Exception $ex) {
                echo $exc->getTraceAsString();
            }
            return $LISTA;
        }
    }
?>

