<?php
    require_once '../bean/DestinationBean.php';
    require_once '../bean/AirlineBean.php';
    require_once '../bean/TipoBean.php';
    require_once '../dao/AirlineDAO.php';
    require_once '../dao/TipoDAO.php';
    require_once '../util/ConnectDB.php';
    class DestinationDAO{
        public function ListarDestinos(){
            try {
                //Conexion
                 $cn = new ConexionBD();
                 $cnx = $cn->getConexionBD(); 
                 $sql = "SELECT * from destination; ";
                 //Other
                 $stmt = $cnx->prepare($sql);
                 $stmt->execute();
                 $estado = 0;
                 $response = $stmt->get_result();  
                 
                 $Lista = array();
                 if(mysqli_num_rows($response)>0){
                     while ($fila = mysqli_fetch_array($response,MYSQLI_ASSOC)){
                    $objAirlineDAO = new AirlineDAO;
                    $objAirlineBean = new AirlineBean;
                    $objTipoBean = new TipoBean;
                    $objTipoDAO = new TipoDAO;
                    //Funciones
                    $objAirlineBean->setId($fila['idairline']);
                    $objTipoBean->setId($fila['idtipo']);
                    //VARIABLES
                    $airlineList = $objAirlineDAO->BuscarAirline($objAirlineBean);
                    $tipoList= $objTipoDAO->BuscarTipo($objTipoBean);
                    //Arma ARRAY
                        $Lista[] = array('estado'=>'success',
                            'Id'=>$fila['id'],
                            'Destino'=>$fila['destination'],
                            'Fecha'=>$fila['date'],
                            'Precio'=>$fila['price'],
                            'Aerolinea'=>$airlineList['0']['Aerolinea'],
                            'Tipo'=>$tipoList[0]['Tipo'],
                            'Image'=>$fila['image']);
                       }
                 }else{
                     $Lista = array('estado'=>'failed');
                 }
            } catch (Exception $ex) {
                echo $exc->getTraceAsString();
            }
            return $Lista; 
        }
        
        public function FiltrarDestinos(AirlineBean $obj){
            try {
                //Conexion
                 $cn = new ConexionBD();
                 $cnx = $cn->getConexionBD(); 
                 $sql = "SELECT * from destination WHERE idairline = $obj->id; ";
                 //Other
                 $stmt = $cnx->prepare($sql);
                 $stmt->execute();
                 $estado = 0;
                 $response = $stmt->get_result();  
                 
                 $Lista = array();
                 if(mysqli_num_rows($response)>0){
                     while ($fila = mysqli_fetch_array($response,MYSQLI_ASSOC)){
                    $objAirlineDAO = new AirlineDAO;
                    $objAirlineBean = new AirlineBean;
                    $objTipoBean = new TipoBean;
                    $objTipoDAO = new TipoDAO;
                    //Funciones
                    $objAirlineBean->setId($fila['idairline']);
                    $objTipoBean->setId($fila['idtipo']);
                    //VARIABLES
                    $airlineList = $objAirlineDAO->BuscarAirline($objAirlineBean);
                    $tipoList= $objTipoDAO->BuscarTipo($objTipoBean);
                        $Lista[] = array('estado'=>'success',
                            'Id'=>$fila['id'],
                            'Destino'=>$fila['destination'],
                            'Fecha'=>$fila['date'],
                            'Precio'=>$fila['price'],
                            'Aerolinea'=>$airlineList['0']['Aerolinea'],
                            'Tipo'=>$tipoList[0]['Tipo'],
                            'Image'=>$fila['image']);
                       }
                 }
            } catch (Exception $ex) {
                echo $exc->getTraceAsString();
            }
            return $Lista; 
        }
        
        public function GetById($id){
            try {
                //Conexion
                 $cn = new ConexionBD();
                 $cnx = $cn->getConexionBD(); 
                 $sql = "SELECT * from destination WHERE id = $id ";
                 //Other
                 $stmt = $cnx->prepare($sql);
                 $stmt->execute();
                 $estado = 0;
                 $response = $stmt->get_result();  
                 
                 $Lista = array();
                 if(mysqli_num_rows($response)>0){
                     while ($fila = mysqli_fetch_array($response,MYSQLI_ASSOC)){
                    $objAirlineDAO = new AirlineDAO;
                    $objAirlineBean = new AirlineBean;
                    $objTipoBean = new TipoBean;
                    $objTipoDAO = new TipoDAO;
                    //Funciones
                    $objAirlineBean->setId($fila['idairline']);
                    $objTipoBean->setId($fila['idtipo']);
                    //VARIABLES
                    $airlineList = $objAirlineDAO->BuscarAirline($objAirlineBean);
                    $tipoList= $objTipoDAO->BuscarTipo($objTipoBean);
                    //Arma ARRAY
                        $Lista[] = array('estado'=>'success',
                            'Id'=>$fila['id'],
                            'Destino'=>$fila['destination'],
                            'Fecha'=>$fila['date'],
                            'Precio'=>$fila['price'],
                            'Aerolinea'=>$airlineList['0']['Aerolinea'],
                            'Tipo'=>$tipoList[0]['Tipo'],
                            'Image'=>$fila['image']);
                       }
                 }else{
                     $Lista = array('estado'=>'failed');
                 }
            } catch (Exception $ex) {
                echo $exc->getTraceAsString();
            }
            return $Lista; 
        }
    }
?>

