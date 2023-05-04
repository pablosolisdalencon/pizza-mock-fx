<?php
include_once 'principal.php';

class ApiPrincipales{
  
  function listarPrincipalesViewAsignaciones(){
   
    $principal = new Principal();
    $principales = array();
    $principales["meta"]=array();
    $principales["items"]=array();
    $res = $principal->listarFromVinculaciones();
    $principales["meta"]["count"]=$res->rowCount();
    $principales["meta"]["fx"]="view";
    
    /*Paginator pendiente*/
    
    // 
    
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        
        // count principales
        $countContratistas=$principal->getCountContratistas($row["Rut"]);
        $countContratistas=$countContratistas->fetch(PDO::FETCH_ASSOC);
        $countContratistas=$countContratistas["c"];
        // Count Trabajadores
        $countTrabajadores=$principal->getCountTrabajadores($row["Rut"]);
        $countTrabajadores=$countTrabajadores->fetch(PDO::FETCH_ASSOC);
        $countTrabajadores=$countTrabajadores["c"];
         $countContratistasAsignados=7;
         $countContratistasNoAsignados=9;
        
        $item = array(
          'idPrincipal' => $row['idPrincipal'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'countContratistas' => $countContratistas,
          'countTrabajadores' => $countTrabajadores,
          'countContratistasAsignados' => $countContratistasAsignados,
          'countContratistasNoAsignados' => $countContratistasNoAsignados
        );
        array_push($principales["items"],$item);
      }
      
      echo json_encode($principales);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  
   function listarPrincipalesFromVinculaciones(){
   
     
    $principal = new Principal();
    $principales = array();
    $principales["meta"]=array();
    $principales["items"]=array();
    $res = $principal->listarFromVinculaciones();
    $principales["meta"]["count"]=$res->rowCount();
    $principales["meta"]["fx"]="view";
    
    /*Paginator pendiente*/
    
    // 
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        
        // count principales
        $countContratistas=$principal->getCountContratistas($row["idNivel"]);
        $countContratistas=$countContratistas->fetch(PDO::FETCH_ASSOC);
        $countContratistas=$countContratistas["c"];
        // Count Trabajadores
        $countTrabajadores=$principal->getCountTrabajadores($row["idNivel"]);
        $countTrabajadores=$countTrabajadores->fetch(PDO::FETCH_ASSOC);
        $countTrabajadores=$countTrabajadores["c"];
         $countContratistasAsignados=0;
         $countContratistasNoAsignados=$countContratistas-$countContratistasAsignados;
        
        $item = array(
          'Razon' => $row['Razon'],
          'Principal' => $row['Principal'],
          'Rut' => $row['Rut'],
          'countContratistas' => $countContratistas,
          'countTrabajadores' => $countTrabajadores,
          'countContratistasAsignados' => $countContratistasAsignados,
          'countContratistasNoAsignados' => $countContratistasNoAsignados,
          'idNivel' => $row['idNivel']
        );
        array_push($principales["items"],$item);
      }
      
      echo json_encode($principales);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  function listarPrincipales(){
   
    $principal = new Principal();
    $principales = array();
    $principales["meta"]=array();
    $principales["items"]=array();
    $res = $principal->listarPrincipales();
    $principales["meta"]["count"]=$res->rowCount();
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idPrincipal' => $row['idPrincipal'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($principales["items"],$item);
      }
      
      echo json_encode($principales);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  function listarByRutPrincipal(){
   
    $principal = new Principal();
    $principales = array();
    $principales["meta"]=array();
    $principales["items"]=array();
    $res = $principal->listarByRutPrincipal();
    $principales["meta"]["count"]=$res->rowCount();
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idPrincipal' => $row['idPrincipal'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($principales["items"],$item);
      }
      
      echo json_encode($principales);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  function listarFromRelacionesContractuales(){
   
    $principal = new Principal();
    $principales = array();
    $principales["meta"]=array();
    $principales["items"]=array();
    $res = $principal->listarFromRelacionesContractuales();
    $principales["meta"]["count"]=$res->rowCount();
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idPrincipal' => $row['idPrincipal'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($principales["items"],$item);
      }
      
      echo json_encode($principales);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  
  function getPrincipalByRut(){
   
    $principal = new Principal();
    $principales = array();
    $principales["items"]=array();
    $res = $principal->getPrincipalByRut();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idPrincipal' => $row['idPrincipal'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($principales["items"],$item);
      }
      
      echo json_encode($principales);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
}
?>