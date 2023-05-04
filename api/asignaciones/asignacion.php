<?php
include_once '../inc/dbx.php';
// CLASE PRINCIPAL PINCIPALES
class Asignacion extends DB{
  
  
 function AsignarPvcAuditor($idAuditor,$idVinculacion){
    $query="INSERT INTO asignaciones_pvc_auditor 
    (
      pvc_id,
      id_auditor
    )
    VALUES
    (
      '$idVinculacion',
      '$idAuditor'
    )";
       $sql_exec = $this->connect()->query($query);
    return $sql_exec;
  }
  
 function Pausar($idAsignacion){
    $query="UPDATE asignaciones_pvc_auditor SET pausa=1 WHERE id='$idAsignacion'";
       $sql_exec = $this->connect()->query($query);
    return $sql_exec;
  }
  function Reactivar($idAsignacion){
    $query="UPDATE asignaciones_pvc_auditor SET pausa=0 WHERE id='$idAsignacion'";
       $sql_exec = $this->connect()->query($query);
    return $sql_exec;
  }
   function DesAsignar($idAsignacion){
    $query="UPDATE asignaciones_pvc_auditor SET estado=0 WHERE id='$idAsignacion'";
       $sql_exec = $this->connect()->query($query);
    return $sql_exec;
  }

}
?>