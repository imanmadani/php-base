<?php
define ('DS', DIRECTORY_SEPARATOR);
define ('HOME', dirname(dirname(__FILE__)));
require_once HOME . DS . 'config.php';
require_once "api-client.php";
include("../utilities/response.php");
if(count($_GET)>0){
    $params=$_GET;
}
if(count($_POST)>0){
    $params=$_POST;
}
$method = $_GET['api'];
$api=new APIClient();
$res=$api->request("User",$method,$params);

?>