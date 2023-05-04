<?php
include_once 'apiRelacionesContractuales.php';
$relacionesContractuales = new ApiRelacionesContractuales();

//default
//GET LIST

//Params
$Method="GET";
$RutPrincipal=$_GET["RutPrincipal"];
//$relacionesContractuales->listar();

switch(true){
    //get by RutPrincipal
    case($Method=="GET" && $RutPrincipal!=""):
      $relacionesContractuales->listarByRutPrincipal($RutPrincipal);
    break;
    // LIST
    case($Method=="GET" && $RutPrincipal==""):
      $relacionesContractuales->listar();
    break;  
}


?>