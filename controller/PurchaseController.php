<?php
require_once '../bean/Cli_DesBean.php';
require_once '../dao/PurchaseDAO.php';
$op = $_GET['op'];
switch ($op)
{
    case "1":
        {                       
            $objBean = new DetailBean();
            $objDao = new PurchaseDAO();           

            $LISTA = $objDao->ListarCompras();
            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);       

            break;
        }
    case "2":   //Insertar
        {   
            $idCliente = $_GET['idCliente'];
            $idDestino = $_GET['idDestino'];
            
            $objBean = new DetailBean();
            $objDao = new PurchaseDAO();
            
            $objBean->setIdCliente($idCliente);
            $objBean->setIdDestino($idDestino);
            
            $LISTA = $objDao->Comprar($objBean);
            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);       

            break;
        }
    case "3":   //Listar por clientes
        {
            $id = $_GET['id'];
            
            $objBean = new DetailBean();
            $objDao = new PurchaseDAO();
            
            $objBean->setIdCliente($id);
            
            $LISTA = $objDao->ListarPorClientes($objBean);
            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);       

            break;
        }
    default :
        {
            break;
        }

}
?>

