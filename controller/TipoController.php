<?php
require_once '../bean/TipoBean.php';
require_once '../dao/TipoDAO.php';
$op = $_GET['op'];
switch ($op)
{
    case "1":
        {                       
            $objBean = new TipoBean();
            $objDao = new TipoDAO();           

            $LISTA = $objDao->ListarTipos();
            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);       

            break;
        }
    case "2":
        {   
            $id = $_GET['id'];
            $objBean = new TipoBean();
            $objDao = new TipoDAO();
            
            $objBean->setId($id);

            $LISTA = $objDao->BuscarTipo($objBean);
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

