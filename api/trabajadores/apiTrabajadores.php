<?php
include_once 'trabajador.php';

class ApiTrabajadores{
  
  function listarTrabajadores(){

    $trabajador = new Trabajador();
    $trabajadores = array();
    $trabajadores["meta"]=array();
    $trabajadores["items"]=array();
    $res = $trabajador->listarTrabajadores();
    $trabajadores["meta"]["count"]=$res->rowCount();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idTrabajador' => $row['idTrabajador'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($trabajadores["items"],$item);
      }
      
      echo json_encode($trabajadores);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
   
  function listarFromRelacionesContractualesByRutPrincipal($RutPrincipal){
    
    $trabajador = new Trabajador();
    $trabajadores = array();
    $trabajadores["meta"]=array();
    $trabajadores["items"]=array();
    
    $res = $trabajador->listarFromRelacionesContractualesByRutPrincipal($RutPrincipal);
    $trabajadores["meta"]["count"]=$res->rowCount();
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idTrabajador' => $row['idTrabajador'],
          'RutPrincipal' => $row['RutPrincipal'],
          'RutContratista' => $row['RutContratista'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($trabajadores["items"],$item);
      }
      
      echo json_encode($trabajadores);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  
  function listarFromRelacionesContractualesByRelacion($RutPrincipal,$RutContratista){
    
    $trabajador = new Trabajador();
    $trabajadores = array();
    $trabajadores["meta"]=array();
    $trabajadores["items"]=array();
    $res = $trabajador->listarFromRelacionesContractualesByRelacion($RutPrincipal,$RutContratista);
    $trabajadores["meta"]["count"]=$res->rowCount();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idTrabajador' => $row['idTrabajador'],
          'RutPrincipal' => $row['RutPrincipal'],
          'RutContratista' => $row['RutContratista'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($trabajadores["items"],$item);
      }
      
      echo json_encode($trabajadores);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  function getTrabajadorByRut(){
   
    $trabajador = new Trabajador();
    $trabajadores = array();
    $trabajadores["items"]=array();
    $res = $trabajador->getTrabajadorByRut();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idTrabajador' => $row['idTrabajador'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($trabajadores["items"],$item);
      }
      
      echo json_encode($trabajadores);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
}
?>