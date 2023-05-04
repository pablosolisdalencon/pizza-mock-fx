<?php
include_once '../inc/dbx.php';
// CLASE PRINCIPAL PINCIPALES
class Contratista extends DB{
  
  
  // Full List
  function listarContratistas(){
    $query = $this->connect()->query('SELECT * FROM Contratistas');
    return $query;
  }
  
 function listarContratistasFromVinculacionesByIdNivel($idNivel){
    $query = $this->connect()->query("
    SELECT 
      contratista.cot_razon_social as Razon,
      contratista.cot_id as idContratista,
      contratista.cot_rut as Rut,
      nivel.niv_id as idNivel,
      CONCAT(nivel.niv_descripcion,' de ',principal.pri_descripcion) as Nivel,
      principal_nivel_contratista.pvc_id as idVinculacion
    FROM 
      contratista, principal, nivel, principal_nivel_contratista 
    WHERE 
      principal_nivel_contratista.niv_id = nivel.niv_id
    AND
      contratista.cot_id = principal_nivel_contratista.cot_id
    AND
      principal_nivel_contratista.niv_id =$idNivel
    AND
      principal.pri_id=nivel.pri_id
    GROUP BY
      Razon
    ");
   
   //,    asignaciones_pvc_auditor.estado as Estado,
   //asignaciones_pvc_auditor
   //  AND asignaciones_pvc_auditor.pvc_id=principal_nivel_contratista.pvc_id
    return $query;
  }
  
  
  // Listar By Rut Principal From Relaciones COntractuales
  function listarFromRelacionesContractualesByRutPrincipal($RutPrincipal){
    $query = $this->connect()->query("    
    SELECT DISTINCT Rut, Razon, code, idContratista 
    FROM Contratistas
    INNER JOIN RelacionesContractuales
    ON RelacionesContractuales.RutContratista = Contratistas.Rut 
    WHERE RelacionesContractuales.RutPrincipal = '$RutPrincipal'
    ");
    return $query;
  }
  
  function getCountTrabajadores($idNivel,$idContratista){
    $query = $this->connect()->query("
      SELECT COUNT(DISTINCT vinculacion_trabajador_contratista.vtc_id) as c FROM vinculacion_trabajador_contratista, principal_nivel_contratista WHERE vinculacion_trabajador_contratista.pvc_id=principal_nivel_contratista.pvc_id AND principal_nivel_contratista.cot_id=$idContratista
      AND
      principal_nivel_contratista.niv_id = $idNivel
      ");
    return $query;
  }
  
   function getDotacion($idNivel,$idContratista){
    $query = $this->connect()->query("
      SELECT ficha_trabajador_contratista.ftc_rut as Rut, ficha_trabajador_contratista.ftc_nombre as Nombre, ficha_trabajador_contratista.ftc_apelpat as Apellido, ficha_trabajador_contratista.ftc_apelmat as ApellidoMat FROM ficha_trabajador_contratista, vinculacion_trabajador_contratista, principal_nivel_contratista WHERE vinculacion_trabajador_contratista.pvc_id=principal_nivel_contratista.pvc_id AND ficha_trabajador_contratista.ftc_id = vinculacion_trabajador_contratista.ftc_id AND principal_nivel_contratista.cot_id=$idContratista AND principal_nivel_contratista.niv_id = $idNivel
      ");
    return $query;
  }

  function getContratistaByRut($Rut){
    $query = $this->connect()->query("SELECT * FROM Contratistas WHERE Rut='$Rut'");
    return $query;
  }
  
  function getAsignacion($idVinculacion){
    $query = $this ->connect()->query("SELECT DISTINCT (id) as idAsignacion, usuario.usu_id as idAuditor, CONCAT(usuario.usu_nombre, ' ', usuario.usu_apelpat, ' ', usuario.usu_apelmat) as Auditor, estado as Estado, pausa as Pausa FROM asignaciones_pvc_auditor, usuario WHERE pvc_id ='$idVinculacion' AND usuario.usu_id=asignaciones_pvc_auditor.id_auditor ORDER BY id DESC LIMIT 4");
    return $query;
  }
  
}
?>