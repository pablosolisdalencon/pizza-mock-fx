<?php
header('Conent-Type: application/json');
include_once 'apiContratistas.php';
$contratistas = new ApiContratistas();

//default
//GET LIST

//Params
$Method=$_SERVER["REQUEST_METHOD"];
$RutPrincipal=$_GET["RutPrincipal"];
$idNivel=$_GET["idNivel"];
$Rut=$_GET["Rut"];
$Origin=$_GET["Origin"];
$View=$_GET["View"];
//$relacionesContractuales->listar();

switch(true){
    
    //get View Contratistas from Vinculaciones By idNivel
    case($Method=="GET" && $Rut=="" && $RutPrincipal=="" && $Origin=="vinculaciones" && $View=="" && $idNivel!=""):
      $contratistas->listarContratistasFromVinculacionesByIdNivel($idNivel);exit;
    break;
    
    //get View Contratistas from Relaciones Contractuales By rutPrincipal
    case($Method=="GET" && $Rut=="" && $RutPrincipal!="" && $Origin=="" && $View=="asignaciones" && $idNivel==""):
      $contratistas->listarContratistasViewAsignaciones($RutPrincipal);exit;
    break;
    //get Contratistas from Relaciones Contractuales by RutPrincipal
    case($Method=="GET" && $Rut=="" && $RutPrincipal!="" && $Origin=="relaciones-contractuales" && $View=="" && $idNivel==""):
    
      $contratistas->listarFromRelacionesContractualesByRutPrincipal($RutPrincipal);exit;
    break;
    
    //get Contratistas by Rut
    case($Method=="GET" && $RutPrincipal=="" && $Rut!="" && $Origin=="" && $View=="" && $idNivel==""):
      $contratistas->getContratistaByRut($Rut);exit;
    break;
    // LIST
    case($Method=="GET" && $RutPrincipal=="" && $Rut=="" && $Origin=="" && $View==""):
      $contratistas->listarContratistas();exit;
    break;  
}


?>