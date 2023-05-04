<?php
include_once 'contratista.php';
include_once '../auditores/auditor.php';
class ApiContratistas{
  
  ///////////////////////////////////////////////
  ///////////////////////////////////////////////
  //                                           //
  // VIsta asignaciones PAGINA CONTRATISTAS    //
  //                                           //
  ///////////////////////////////////////////////
  ///////////////////////////////////////////////
  

  
  function listarContratistasFromVinculacionesByIdNivel($idNivel){
    $contratista = new Contratista();
    $contratistas = array();
    $contratistas["meta"]=array();
    $contratistas["items"]=array();
    $contratistas["meta"]["fx"]="viewX";
    $contratistas["meta"]["auditores"]=array();
    
    //================//
    //==              //
    //==  AUDITORES   //
    //==              //
    //================//
    $auditor = new Auditor;
    $auditores = array();
    $auditores=$auditor->listarAuditores();
    
    if($auditores->rowCount()){

      while($rowA = $auditores->fetch(PDO::FETCH_ASSOC)){
        $itemA = array(
          'idAuditor' => $rowA['idAuditor'],
          'Nombre' => $rowA['Nombre']
        );
        
        array_push($contratistas["meta"]["auditores"],$itemA);

      }
    }
    else
    {
       $itemA = array(
          'idAuditor' => 0,
          'Nombre' =>  'Err: Sin Auditores'
       );
      array_push($contratistas["meta"]["auditores"],$itemA);
    }
    // end auditores *


    
    $res = $contratista->listarContratistasFromVinculacionesByIdNivel($idNivel);
    $contratistas["meta"]["count"]=$res->rowCount();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $idVinculacion=$row['idVinculacion'];
        // Count Trabajadores
        $countTrabajadores=$contratista->getCountTrabajadores($idNivel,$row['idContratista']);
        $countTrabajadores=$countTrabajadores->fetch(PDO::FETCH_ASSOC);
        $countTrabajadores=$countTrabajadores["c"];
         
        $contratistas["meta"]["Nivel"]=$row["Nivel"];
        $item = array(
          'idVinculacion' => $idVinculacion,
          'idNivel' => $idNivel,
          'idContratista' => $row['idContratista'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'countTrabajadores' => $countTrabajadores,
          'Asignacion' => array(),
          'Verificacion' => $Verificacion,
          'Dotacion' => array()
        );
        
        //================//
        //==              //
        //==  DOTACION    //
        //==              //
        //================//
         $Dotacion = array();
         $DotacionQuery=$contratista->getDotacion($idNivel,$row['idContratista']);
        
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
          // end Dotacion *
        
          //================//
          //==              //
          //==  ASIGNACION  //
          //==              //
          //================//
          $Asignacion = array();
          $asignaciones=$contratista->getAsignacion($idVinculacion);
          if($asignaciones->rowCount()){
            while($rowA = $asignaciones->fetch(PDO::FETCH_ASSOC)){
              $Auditor=$rowA["Auditor"];
              $AItem = array(
                'Estado' => $rowA["Estado"],
                'idAsignacion' => $rowA["idAsignacion"],
                'Auditor' => "$Auditor",
                'idAuditor' => $rowA["idAuditor"],
                'Pausa' => $rowA["Pausa"]
              );
               array_push($item["Asignacion"],$AItem);

            }
          }else{
            $item["Asignacion"]=NULL;
          }
          
        
        

        array_push($contratistas["items"],$item);
      }
      
      echo json_encode($contratistas);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  ///////////////////////////////////////////////
  ///////////////////////////////////////////////
  //                                           //
  // end VIsta asignaciones PAGINA CONTRATISTAS//
  //                                           //
  ///////////////////////////////////////////////
  ///////////////////////////////////////////////  
  
  function listarContratistasViewAsignaciones($RutPrincipal){
   
    $contratista = new Contratista();
    $contratistas = array();
    $contratistas["meta"]=array();
    $contratistas["items"]=array();
    $res = $contratista->listarFromRelacionesContractualesByRutPrincipal($RutPrincipal);
    $contratistas["meta"]["count"]=$res->rowCount();
    $contratistas["meta"]["fx"]="view";
    /*Paginator pendiente*/
    
    // 
    
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
       
        // Count Trabajadores
        $countTrabajadores=$contratista->getCountTrabajadores($RutPrincipal,$row["Rut"]);
        $countTrabajadores=$countTrabajadores->fetch(PDO::FETCH_ASSOC);
        $countTrabajadores=$countTrabajadores["c"];
        $Estado=$row['Estado'];
        $Asignacion="Asignado Test";
        
        $item = array(
          'idContratista' => $row['idContraista'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'countTrabajadores' => $countTrabajadores,
          'Estado' => $Estado,
          'Asignacion' => $Asignacion
        );
        array_push($contratistas["items"],$item);
      }
      
      echo json_encode($contratistas);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }

    
    // 
    
    

  function listarContratistas(){
   
    $contratista = new Contratista();
    $contratistas = array();
    $contratistas["meta"]=array();
    $contratistas["items"]=array();
    $res = $contratista->listarContratistas();
    $contratistas["meta"]["count"]=$res->rowCount();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idContratista' => $row['idContratista'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($contratistas["items"],$item);
      }
      
      echo json_encode($contratistas);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
   
  function listarFromRelacionesContractualesByRutPrincipal($RutPrincipal){
    $contratista = new Contratista();
    $contratistas = array();
    $contratistas["meta"]=array();
    $contratistas["items"]=array();
    $res = $contratista->listarFromRelacionesContractualesByRutPrincipal($RutPrincipal);
    $contratistas["meta"]["count"]=$res->rowCount();
    if($res->rowCount()){

      
      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idContratista' => $row['idContratista'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($contratistas["items"],$item);
      }
      
      echo json_encode($contratistas);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
  
  
  function getContratistaByRut(){
   
    $contratista = new Contratista();
    $contratistas = array();
    $contratistas["items"]=array();
    $res = $contratista->getContratistaByRut();
    
    if($res->rowCount()){

      while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $item = array(
          'idContratista' => $row['idContratista'],
          'Razon' => $row['Razon'],
          'Rut' => $row['Rut'],
          'code' => $row['code']
        );
        array_push($contratistas["items"],$item);
      }
      
      echo json_encode($contratistas);
      
    }else{
      echo json_decode(array('mensaje'=>'No hay Elementos'));
    }
      
  }
}
?>