<?php
include_once 'apiAuditores.php';
$auditores = new ApiAuditores();

//default
//GET LIST
//Params
$Method=$_SERVER["REQUEST_METHOD"];
$Method="GET";
switch(true){
    
    //get Auditores List
    case($Method=="GET"): 
      $auditores->listarAuditores();
    break;
   
}


?>