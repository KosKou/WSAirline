<?php
    require_once '../bean/Cli_DesBean.php';  
    require_once '../util/ConnectDB.php';
    class PurchaseDAO{
//        Funcion Comprar
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
//        Listar Compras
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
                        //Obtiene datos de cli_des
                        $Id = $fila['id'];
                        $IdCliente = $fila['id_cli'];
                        $IdDestino = $fila['id_des'];
                        //Obtiene datos de destination
                        
                        //Seteamos en el JSON
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
//        Obtener viaje por Cliente
        public function getTripByClient(DetailBean $obj){
            try {
                //Conecta a la BD
            $cn = new ConexionBD();
            $cnx = $cn->getConexionBD();
//            Un Join para obtener valores
            $sql = "SELECT 
                    destination.id,
                    destination.destination,
                    destination.date,
                    destination.price,
                    destination.image,
                    clients.id AS id_cliente,
                    tipo.tipo,
                    airlines.name AS airline 
                    FROM
                    clients
                    INNER JOIN cli_des ON cli_des.id_cli = clients.id
                    INNER JOIN destination ON cli_des.id_des = destination.id
                    INNER JOIN tipo ON destination.idtipo = tipo.id
                    INNER JOIN airlines ON destination.idairline = airlines.id
                    WHERE clients.id = ? ;"  ;
            
            $stmt = $cnx->prepare($sql);
            $stmt->bind_param('s',$obj->idCliente);
            $stmt->execute();
            $estado = 0;
                
            $response = $stmt->get_result();

            $Lista = array();
            if(mysqli_num_rows($response)>0){
                    while ($fila = mysqli_fetch_array($response,MYSQLI_ASSOC)){
                        //Obtiene datos de cli_des
                        $IdDestino = $fila['id'];
                        $IdCliente = $fila['id_cliente'];
                        $Destino = $fila['destination'];
                        $Date = $fila['date'];
                        $Price = $fila['price'];
                        $Image = $fila['image'];
                        $Type = $fila['tipo'];
                        $Airline = $fila['airline'];
                        //Obtiene datos de destination
                        
                        //Seteamos en el JSON
                        $Lista[] = array('estado'=>'success',
                            'IdDestino'=>$IdDestino,
                            'IdCliente'=>$IdCliente,
                            'Destino'=>$Destino,
                            'Date'=>$Date,
                            'Price'=>$Price,
                            'Image'=>$Image,
                            'Type'=>$Type,
                            'Airline'=>$Airline);
                    }
            }else{
                $Lista[] = array('estado'=>failed);
            }
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            return $Lista;
        }
    }
    

?>

