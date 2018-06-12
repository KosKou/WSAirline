<?php
    require_once '../bean/Cli_DesBean.php';  
    require_once '../util/ConnectDB.php';
    class PurchaseDAO{
        function Comprar(DetailBean $obj){
            try {
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                $sql = "INSERT INTO cli_des(id_cli, id_des) VALUES(?,?)";
            
                $stmt = $cnx->prepare($sql);
                //bind_param(#parameters,$pa1...)
                $stmt->bind_param('ss',$obj->idCliente
                        ,$obj->idDestino);
                $stmt->execute();

                    $response = $stmt->get_result();
                    $estado = 0;
                    if(mysqli_stmt_affected_rows($stmt)>0){
                            $estado = 1;
                    } else {
                        $estado = 0;
                    }
            } catch (Exception $ex) {
                echo $ex->getTraceAsString();
            }
            return $estado;
        }
        public function ListarCompras(){
            try {
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                $sql = "SELECT * FROM cli_des;";
                $stmt = $cnx->prepare($sql);
                $stmt->execute();
                $response = $stmt->get_result();
                            
                $Lista = array();
                    
                if(mysqli_num_rows($response)>0){
                    while ($fila = mysqli_fetch_array($response,MYSQLI_ASSOC)){
                      
                        $Id = $fila['id'];
                        $IdCliente = $fila['id_cli'];
                        $IdDestino = $fila['id_des'];
                        //Logica
                        $Lista[] = array('estado'=>'success',
                            'IdCompra'=>$Id,
                            'IdCliente'=>$IdCliente,
                            'IdDestino'=>$IdDestino);
                    }
                }else{
                    $Lista[] = array('estado'=>failed);
                }
                
            } catch (Exception $ex) {
                echo $ex->getTraceAsString();
            }
            return $Lista;
        }
        
        public function ListarPorClientes(DetailBean $obj){
            try {
                $cn = new ConexionBD();
                $cnx = $cn->getConexionBD();
                $sql = "SELECT * FROM cli_des WHERE id_cli = ?;";
                
                $stmt = $cnx->prepare($sql);
                $stmt->bind_param('s',$obj->idCliente);
                $stmt->execute();
                $estado = 0;
                
                $response = $stmt->get_result();
                            
                $Lista = array();
                    
                if(mysqli_num_rows($response)>0){
                    while ($fila = mysqli_fetch_array($response,MYSQLI_ASSOC)){
                      
                        $Id = $fila['id'];
                        $IdCliente = $fila['id_cli'];
                        $IdDestino = $fila['id_des'];
                        //Logica
                        $Lista[] = array('estado'=>'success',
                            'IdCompra'=>$Id,
                            'IdCliente'=>$IdCliente,
                            'IdDestino'=>$IdDestino);
                    }
                }else{
                    $Lista[] = array('estado'=>failed);
                }
                
            } catch (Exception $ex) {
                echo $ex->getTraceAsString();
            }
            return $Lista;
        }
    }
    

?>

