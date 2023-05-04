<?php
include_once 'apiTrabajadores.php';
$trabajadores = new ApiTrabajadores();

//default
//GET LIST

//Params
$Method="GET";
$RutPrincipal=$_GET["RutPrincipal"];
$RutContratista=$_GET["RutContratista"];
$Rut=$_GET["Rut"];
$Origin=$_GET["Origin"];
//$relacionesContractuales->listar();

switch(true){
    
    //get Trabajadores from Relaciones Contractuales by RutPrincipal
    case($Method=="GET" && $Rut=="" && $RutPrincipal!="" && $RutContratista=="" && $Origin=="relaciones-contractuales"):
      $trabajadores->listarFromRelacionesContractualesByRutPrincipal($RutPrincipal);
    break;
    
    //get Trabajadores from Relaciones Contractuales by Relacion
    case($Method=="GET" && $Rut=="" && $RutPrincipal!="" && $RutContratista!="" && $Origin=="relaciones-contractuales"):
      $trabajadores->listarFromRelacionesContractualesByRelacion($RutPrincipal,$RutContratista);
    break;
    
    //get Trabajadores by Rut
    case($Method=="GET" && $RutPrincipal=="" && $RutContratista=="" && $Rut!="" && $Origin==""):
      $trabajadores->getTrabajadorByRut($Rut);
    break;
    // LIST
    case($Method=="GET" && $RutPrincipal=="" && $RutContratista=="" && $Rut=="" && $Origin==""):
    
      $trabajadores->listarTrabajadores();
    break;  
}


?>