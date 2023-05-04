<?php
header('Conent-Type: application/json');

include_once 'apiPactados.php';
$principales = new ApiPrincipales();

//default
//GET LIST

//Params
$Method=$_SERVER["REQUEST_METHOD"];
$Items=$_GET["Items"];
$Reglas=$_GET["Reglas"];
$idPactado=$_GET["idPactado"];
$Update=$_POST["Update"];
$Delete=$_["Delete"];
$Pactado=$_POST["Pactado"];
//$relacionesContractuales->listar();

switch(true){
    
    // Listado universal de items
    case($Method=="GET" && $Items==1):
      $principales->listarItems();exit;
    break;
    //Listado de reglas
    case($Method=="GET" && $Reglas==1):
      $principales->listarReglas();exit;
    break;
    
    // CRUD Pactados
    //Create
    case($Method=="POST" $Pactado!==""):
      $principales->createPactado($Pactado);exit;
    break;
    //Read  
    case($Method=="GET" && $idPactado!="" && $Update!=1 && $Delete!=1):
      $principales->readPactado($idPactado);exit;
    break;
    //Update Pactado 
    case($Method=="POST" && $idPactado!="" && $Update==1 && $Delete!=1):
      $principales->updatePactado($Pactado);exit;
    break;
    //Delete
    case($Method=="POST" && $idPactado!="" && $Delete==1 && $Update!=1):
      $principales->deletePactado($idPactado);exit;
    break;  
}

exit;
?>