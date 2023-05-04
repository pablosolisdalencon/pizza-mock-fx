<?php
include_once 'pactado.php';

class ApiPactados{
  
  function listarItems(){
   
    $principal = new actado();
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
  
  
   function listarReglas(){
   
     
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
  function listarPactados(){
   
    $pactado = new Pactado();
    $pactados = array();
    $pactados["meta"]=array();
    $pactados["items"]=array();
    $res = $pactado->listarPactados();
    $pactados["meta"]["count"]=$res->rowCount();
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idPactado' => $row['idPactado'],
          'Titulo' => $row['Titulo'],
          'Descripcion' => $row['Descripcion'],
          'Items' => array()
        );
        array_push($pactados["items"],$item);
      }
      
      echo json_encode($pactados);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  function createPactado($Pact){
    $pactado = new Pactado();
    $pactados = array();
    $pactados["meta"]=array();
    $pactados["meta"]["info"]="Pactados";
    
    if($res = $pactado -> crearPactado($Pactado)){
      http_response_code(200);
      $pactados["meta"]["status"]="done";
      $pactados["meta"]["code"]="200";
      $response=json_encode($pactados);
    }else{
      http_response_code(400);
      $asignaciones["meta"]["status"]="fail";
      $asignaciones["meta"]["code"]="400";
      $response=json_encode($asignaciones);
    }
    echo $response; 
  }
  function readPactado(){
  }
  function updatePactado(){
  }
  function  deleteePactado(){
  }
}
?>