<?php
include_once 'relacionContractual.php';

class ApiRelacionesContractuales{
  
  function listar(){
   
    $relacion = new RelacionContractual();
    $relaciones = array();
    $relaciones["items"]=array();
    $res = $relacion->listarRelacionesContractuales();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idRelacionContractual' => $row['idRelacionContractual'],
          'RutPrincipal' => $row['RutPrincipal'],
          'RutContratista' => $row['RutContratista'],
          'RutTrabajador' => $row['RutTrabajador']
        );
        array_push($relaciones["items"],$item);
      }
      
      echo json_encode($relaciones);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  
  
  function listarByRutPrincipal($RutPrincipal){
   
    $relacion = new RelacionContractual();
    $relaciones = array();
    $relaciones["items"]=array();
    $res = $relacion->getRelacionesContractualesByRutPrincipal($RutPrincipal);
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idRelacionContractual' => $row['idRelacionContractual'],
          'RutPrincipal' => $row['RutPrincipal'],
          'RutContratista' => $row['RutContratista'],
          'RutTrabajador' => $row['RutTrabajador']
        );
        array_push($relaciones["items"],$item);
      }
      
      echo json_encode($relaciones);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
}
?>