<?php
include_once 'auditor.php';

class ApiAuditores{
  
  function listarAuditores(){
    $auditor = new Auditor();
    $auditores = array();
    $auditores["meta"]=array();
    $auditores["items"]=array();
    $res = $auditor->listarAuditores();
    $auditores["meta"]["count"]=$res->rowCount();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idAuditor' => $row['idAuditor'],
          'Nombre' => $row['Nombre']
        );
        array_push($auditores["items"],$item);
      }
      
      echo json_encode($auditores);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
   
  
}
?>