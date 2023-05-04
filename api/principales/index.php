<?php
header('Conent-Type: application/json');

include_once 'apiPrincipales.php';
$principales = new ApiPrincipales();

//default
//GET LIST

//Params
$Method=$_SERVER["REQUEST_METHOD"];
$RutPrincipal=$_GET["RutPrincipal"];
$Rut=$_GET["Rut"];
$Origin=$_GET["Origin"];
$View=$_GET["View"];
//$relacionesContractuales->listar();

switch(true){
    //get View Principales from Relaciones Contractuales 
    case($Method=="GET" && $Rut=="" && $RutPrincipal=="" && $Origin=="vinculaciones"):
      $principales->listarPrincipalesFromVinculaciones();exit;
    break;
    case($Method=="GET" && $Rut=="" && $RutPrincipal=="" && $Origin=="" && $View=="asignaciones"):
      $principales->listarPrincipalesViewAsignaciones();exit;
    break;
    //get Principales from Relaciones Contractuales
    case($Method=="GET" && $Rut=="" && $RutPrincipal=="" && $Origin=="relaciones-contractuales" && $View==""):
      $principales->listarFromRelacionesContractuales();exit;
    break;
    
    //get Principal by Rut
    case($Method=="GET" && $RutPrincipal=="" && $Rut!="" && $Origin=="" && $View==""):
      $principales->getPrincipalByRut($Rut);exit;
    break;
    // LIST
    case($Method=="GET" && $RutPrincipal=="" && $Rut=="" && $Origin=="" && $View==""):
      $principales->listarPrincipales();exit;
    break;  
}

exit;
?>