<?php
require_once '../bean/DestinationBean.php';
require_once '../dao/DestinationDAO.php';
require_once '../bean/AirlineBean.php';
$op = $_GET['op'];
switch ($op)
{
    case "1":
        {                       
            $objBean = new DestinationBean;
            $objDao = new DestinationDAO();           

            $LISTA = $objDao->ListarDestinos();  
            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);       

            break;
        }
    case "2":
        {
            $id = $_GET['id'];
            
            $objBean = new AirlineBean();
            $objDao = new DestinationDAO();
            
            $objBean->setId($id);

            $LISTA = $objDao->FiltrarDestinos($objBean);  
            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);       

            break;
        }
    case "3":
        {
            break;
        }
    default :
        {
            break;
        }

}
?>

