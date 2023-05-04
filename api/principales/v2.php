<?php
header('Conent-Type: application/json');
require_once 'apiPrincipales.php';
$method = $_SERVER["REQUEST_METHOD"];
$id=$_REQUEST["id"];

if ($method == 'GET' && !$id){
	
	//http_response_code(207);
	echo "hola";
	
}
echo $method;

//http_response_code(404);
?>