<?php
include_once 'asignacion.php';

class ApiAsignaciones{
  function AsignarPvcAuditor($idAuditor,$idVinculacion){
    $asignacion = new Asignacion();
    $asignaciones = array();
    $asignaciones["meta"]=array();
    $asignaciones["meta"]["info"]="Asignar";
    
    if($res = $asignacion -> AsignarPvcAuditor($idAuditor,$idVinculacion)){
      http_response_code(200);
      $asignaciones["meta"]["status"]="done";
      $asignaciones["meta"]["code"]="200";
      $response=json_encode($asignaciones);
    }else{
      http_response_code(400);
      $asignaciones["meta"]["status"]="fail";
      $asignaciones["meta"]["code"]="400";
      $response=json_encode($asignaciones);
    }
    echo $response;  
  }
  
  function DesAsignarPvcAuditor($idAsignacion){
    $asignacion = new Asignacion();
    $asignaciones = array();
    $asignaciones["meta"]=array();    
    $asignaciones["meta"]["info"]="Desasignar";
    if($res = $asignacion -> DesAsignar($idAsignacion)){
      http_response_code(200);
      $asignaciones["meta"]["status"]="done $idAsignacion";
      $asignaciones["meta"]["code"]="200";
      $response=json_encode($asignaciones);
    }else{
      http_response_code(400);
      $asignaciones["meta"]["status"]="fail";
      $asignaciones["meta"]["code"]="400";
      $response=json_encode($asignaciones);
    }
    echo $response;  
  }
    function PausarPvcAuditor($idAsignacion){
    $asignacion = new Asignacion();
    $asignaciones = array();
    $asignaciones["meta"]=array();  
    $asignaciones["meta"]["info"]="Pausar";
    if($res = $asignacion -> Pausar($idAsignacion)){
      http_response_code(200);
      $asignaciones["meta"]["status"]="done $idAsignacion ".var_dump($res);
      $asignaciones["meta"]["code"]="200";
      $response=json_encode($asignaciones);
    }else{
      http_response_code(400);
      $asignaciones["meta"]["status"]="fail";
      $asignaciones["meta"]["code"]="400";
      $response=json_encode($asignaciones);
    }
    echo $response;  
  }
  function ReactivarPvcAuditor($idAsignacion){
    $asignacion = new Asignacion();
    $asignaciones = array();
    $asignaciones["meta"]=array();  
    $asignaciones["meta"]["info"]="Reactivar";
    if($res = $asignacion -> Reactivar($idAsignacion)){
      http_response_code(200);
      $asignaciones["meta"]["status"]="done $idAsignacion ".var_dump($res);
      $asignaciones["meta"]["code"]="200";
      $response=json_encode($asignaciones);
    }else{
      http_response_code(400);
      $asignaciones["meta"]["status"]="fail";
      $asignaciones["meta"]["code"]="400";
      $response=json_encode($asignaciones);
    }
    echo $response;  
  }
  /*
  function listarAsignacionesFromVinculacionesByIdNivel($idNivel){
    
    $asignaciones = array();
    $asignaciones["meta"]=array();
    $asignaciones["items"]=array();
    $res = $asignacion->listarAsignacionesFromVinculacionesByIdNivel($idNivel);
    $asignaciones["meta"]["count"]=$res->rowCount();
    $asignaciones["meta"]["fx"]="viewX";

    //Paginator pendiente
    
    // 
    
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        // Count Trabajadores
        $countTrabajadores=$asignacion->getCountTrabajadores($idNivel,$row['idAsignacion']);
        $countTrabajadores=$countTrabajadores->fetch(PDO::FETCH_ASSOC);
       
        
        

        $countTrabajadores=$countTrabajadores["c"];
        $Estado="Test";
        $Auditores="Testing";
        $Asignacion="Asignado Test";
        
        $Verificacion="Verificacion Test";
        
        $item = array(
          'idNivel' => $idNivel,
          'idAsignacion' => $row['idAsignacion'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'countTrabajadores' => $countTrabajadores,
          'Auditores' => $Auditores,
          'Estado' => $Estado,
          'Verificacion' => $Verificacion,
          'Dotacion' => array()
        );
        
        
           
         $Dotacion = array();
       
       
        $DotacionQuery=$asignacion->getDotacion($idNivel,$row['idAsignacion']);
        
        while($Trabajador=$DotacionQuery->fetch(PDO::FETCH_ASSOC)){
           $TItem = array(
              'Rut' => $Trabajador["Rut"],
              'Nombre' => $Trabajador["Nombre"],
             'Apellido' => $Trabajador["Apellido"],
             'ApellidoMat' => $Trabajador["ApellidoMat"]
            );
            //$Dotacion[]=$TItem;
             array_push($item["Dotacion"],$TItem);
      }

       // array_push($item["Dotacion"],$Dotacion);
        array_push($asignaciones["items"],$item);
      }
      
      echo json_encode($asignaciones);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  
  function listarAsignacionesViewAsignaciones($RutPrincipal){
   
    $asignacion = new Asignacion();
    $asignaciones = array();
    $asignaciones["meta"]=array();
    $asignaciones["items"]=array();
    $res = $asignacion->listarFromRelacionesContractualesByRutPrincipal($RutPrincipal);
    $asignaciones["meta"]["count"]=$res->rowCount();
    $asignaciones["meta"]["fx"]="view";
    //Paginator pendiente
    
    // 
    
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
       
        // Count Trabajadores
        $countTrabajadores=$asignacion->getCountTrabajadores($RutPrincipal,$row["Rut"]);
        $countTrabajadores=$countTrabajadores->fetch(PDO::FETCH_ASSOC);
        $countTrabajadores=$countTrabajadores["c"];
        $Estado="Test";
        $Asignacion="Asignado Test";
        
        $item = array(
          'idAsignacion' => $row['idContraista'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'countTrabajadores' => $countTrabajadores,
          'Estado' => $Estado,
          'Asignacion' => $Asignacion
        );
        array_push($asignaciones["items"],$item);
      }
      
      echo json_encode($asignaciones);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  function listarAsignaciones(){
   
    $asignacion = new Asignacion();
    $asignaciones = array();
    $asignaciones["meta"]=array();
    $asignaciones["items"]=array();
    $res = $asignacion->listarAsignaciones();
    $asignaciones["meta"]["count"]=$res->rowCount();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idAsignacion' => $row['idAsignacion'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($asignaciones["items"],$item);
      }
      
      echo json_encode($asignaciones);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
   
  function listarFromRelacionesContractualesByRutPrincipal($RutPrincipal){
    $asignacion = new Asignacion();
    $asignaciones = array();
    $asignaciones["meta"]=array();
    $asignaciones["items"]=array();
    $res = $asignacion->listarFromRelacionesContractualesByRutPrincipal($RutPrincipal);
    $asignaciones["meta"]["count"]=$res->rowCount();
    if($res->rowCount()){

      
      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idAsignacion' => $row['idAsignacion'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($asignaciones["items"],$item);
      }
      
      echo json_encode($asignaciones);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  
  function getAsignacionByRut(){
   
    $asignacion = new Asignacion();
    $asignaciones = array();
    $asignaciones["items"]=array();
    $res = $asignacion->getAsignacionByRut();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idAsignacion' => $row['idAsignacion'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($asignaciones["items"],$item);
      }
      
      echo json_encode($asignaciones);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  
  */
}
?>