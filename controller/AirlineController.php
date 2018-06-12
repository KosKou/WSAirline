<?php
require_once '../bean/AirlineBean.php';
require_once '../dao/AirlineDAO.php';
$op = $_GET['op'];
switch ($op)
{
    case "1":
        {                       
            $objBean = new AirlineBean();
            $objDao = new AirlineDAO();           

            $LISTA = $objDao->ListarAirlines();
            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);       

            break;
        }
    case "2":
        {   
            $id = $_GET['id'];
            $objBean = new AirlineBean();
            $objDao = new AirlineDAO();
            
            $objBean->setId($id);

            $LISTA = $objDao->BuscarAirline($objBean);
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

