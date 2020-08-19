<?php
define ('DS', DIRECTORY_SEPARATOR);
define ('HOME', dirname(dirname(__FILE__)));
require_once HOME . DS . 'config.php';
require_once "api-client.php";
include("../utilities/response.php");
$api=new APIClient();
$res=$api->request("User",'Get');
?>