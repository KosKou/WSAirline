<?php
require_once '../bean/ClienteBean.php';
require_once '../dao/ClienteDAO.php';
$op = $_GET['op'];
switch ($op)
{
//    Login
    case "1":
        {           
            $username = $_GET['username'];
            $password = $_GET['password'];
            
            $objBean = new ClienteBean();
            $objDao = new ClienteDAO();           

            $objBean->setUsername($username);
            $objBean->setPassword($password);        

            $LISTA = $objDao->ValidarCliente($objBean);  
            echo json_encode($LISTA,JSON_UNESCAPED_UNICODE);       

            break;
        }
    case "2":
        {   
            $username = $_GET['username'];
            $password = $_GET['password'];
            $name     = $_GET['name'];
            $address  = $_GET['address'];
            
            $objBean = new ClienteBean();
            $objDao = new ClienteDAO(); 
            
            $objBean->setUsername($username);
            $objBean->setPassword($password);
            $objBean->setName($name);
            $objBean->setAddress($address);
            
            $LISTA = $objDao->RegistrarCliente($objBean);
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

