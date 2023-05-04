<?php 
header('Content-Type: application/json');

include_once 'apiAsignaciones.php';
$asignaciones = new ApiAsignaciones();

//default
//GET LIST

//Params
$Method=strtoupper($_SERVER["REQUEST_METHOD"]);
$idVinculacion=$_POST["idVinculacion"];
$idAuditor=$_POST["idAuditor"];
$idAsignacion=$_POST["idAsignacion"];

$Pausa=$_POST["Pausa"];
//$relacionesContractuales->listar();
echo $Method." id:".$idAsignacion;
switch(true){
    
       //get View Asignaciones from Vinculaciones By Nivel
    case($Method=="POST" && $idAuditor!="" && $idVinculacion!=""):
      $asignaciones->AsignarPvcAuditor($idAuditor,$idVinculacion);exit;
    break;
    
    case($Method=="POST" && $idAsignacion!="" && $idAuditor=="" && $idVinculacion=="" && $Pausa=="1"):
      $asignaciones->PausarPvcAuditor($idAsignacion);exit;
    break;
    case($Method=="POST" && $idAsignacion!="" && $idAuditor=="" && $idVinculacion=="" && $Pausa=="0"):
      $asignaciones->ReactivarPvcAuditor($idAsignacion);exit;
    break;
    case($Method=="POST" && $idAsignacion!="" && $idAuditor=="" && $idVinculacion=="" && $Pausa==""):
      $asignaciones->DesAsignarPvcAuditor($idAsignacion);exit;
    break;
    
    
}


?>