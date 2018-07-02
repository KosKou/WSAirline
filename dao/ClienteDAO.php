<?php
require_once '../util/ConnectDB.php';
require_once '../bean/ClienteBean.php';
class ClienteDAO
{   
//    Login
    public function ValidarCliente(ClienteBean $obj){
            try {
                //Conexion
                 $cn = new ConexionBD();
                 $cnx = $cn->getConexionBD();                 

                 $sql = "SELECT id as Id from clients WHERE username = ? and password = ? ; ";                

                $stmt = $cnx->prepare($sql);
                $stmt->bind_param('ss',$obj->Username,$obj->Password);
                $stmt->execute();                  

                $estado = 0;

                $response = $stmt->get_result();                        

                $LISTA = array();                   

                if(mysqli_num_rows($response)>0)
                        {
                            while($row = mysqli_fetch_array($response,MYSQLI_ASSOC))
                                    {
                                        $Id = $row['Id'];                                       
                                        $LISTA[] = array('estado'=>'success','Id'=>$Id);
                                    }
                        }else
                            {
                                $LISTA[] = array('estado'=>'failed', 'sql'=>sql);
                            }           
                     $stmt->close();        

            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
                                    }
                 return $LISTA;                   
    }
//              Registro  
        public function RegistrarCliente(ClienteBean $obj){
            try {              
                $cn = new ConexionBD();
                    $cnx = $cn->getConexionBD();
                    $sql = " INSERT INTO clients (username, password, name, address) 
                    VALUES (?,?,?,?); ";                

                    $stmt = $cnx->prepare($sql);
                    $stmt->bind_param('ssss',$obj->Username,$obj->Password,
                            $obj->Name,$obj->Address);
                    $stmt->execute();                  

                    $response = $stmt->get_result();
                    $estado = 0;
                    if(mysqli_stmt_affected_rows($stmt)>0)
                        {
                                $estado = 1; 
                        }else
                            {
                            $estado = 0;
                            }               

                }catch (Exception $exc) {
                echo $exc->getTraceAsString();
                                }
            return $estado;
        }
                
    }
?>

