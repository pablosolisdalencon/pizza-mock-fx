<?php
include_once '../inc/dbx.php';
// CLASE PRINCIPAL PINCIPALES
class Principal extends DB{
  
  // Full List
  function listarPrincipales(){
    $query = $this->connect()->query('SELECT * FROM Principales');
    return $query;
  }
  
    // Listar Principales View Asignaciones
  function listarPrincipalesViewAsignaciones(){
    $query = $this->connect()->query('    
    SELECT DISTINCT RutPrincipal FROM RelacionesContractuales');
    
    foreach ($query as $item){
      
      // contratistas
      $RutPrincipal=$item["RutPrincipal"];
      
      
      
      
      $item["countContratistas"] = $this->getCountContratistas($RutPrincipal);
      $item["countTrabajadores"] = $this->getCountTrabajadores($RutPrincipal);
      $item["countContratistasAsignados"] = $countContratistasAsignados;
      $item["countContratistasNoAsignados"] = $countContratistasNoAsignados;
      $result[]=$item;
      
    }
    var_dump($result);
    return $result;
  }
  
  function getCountContratistas($idNivel){
    $query = $this->connect()->query("
      SELECT COUNT(DISTINCT principal_nivel_contratista.pvc_id) as c FROM principal, nivel, contratista, principal_nivel_contratista WHERE principal_nivel_contratista.niv_id = nivel.niv_id AND principal.pri_id = nivel.pri_id AND contratista.cot_id = principal_nivel_contratista.cot_id AND principal_nivel_contratista.niv_id = $idNivel
         
      ");
 
    return $query;
      
  }
  function getCountTrabajadores($idNivel){
    $query = $this->connect()->query("
      SELECT COUNT(DISTINCT vinculacion_trabajador_contratista.vtc_id) as c FROM vinculacion_trabajador_contratista, principal_nivel_contratista WHERE vinculacion_trabajador_contratista.pvc_id=principal_nivel_contratista.pvc_id AND principal_nivel_contratista.niv_id=$idNivel
      ");
    return $query;
  }
  // Listar From Vinculaciones
  function listarFromVinculaciones(){
    
    //principales con relaciones
     $query = $this->connect()->query('    
    SELECT niv_descripcion as Razon, nivel.niv_id as idNivel, pri_rut as Rut, niv_id_padre as Padre, pri_descripcion as Principal, cot_razon_social as Contratista FROM principal, nivel, contratista, principal_nivel_contratista WHERE principal_nivel_contratista.niv_id = nivel.niv_id AND principal.pri_id = nivel.pri_id AND contratista.cot_id = principal_nivel_contratista.cot_id GROUP BY idNivel
    ');
    
    return $query;
  }

  
  //Listar From Relaciones COntractuales
  function listarFromRelacionesContractuales(){
    $query = $this->connect()->query('    
    SELECT DISTINCT Rut, Razon, code, idPrincipal 
    FROM Principales
    INNER JOIN RelacionesContractuales
    ON RelacionesContractuales.RutPrincipal = Principales.Rut');
    
    return $query;
  }
  

  function getPrincipalByRut($Rut){
    $query = $this->connect()->query("SELECT * FROM Principales WHERE Rut='$Rut'");
    return $query;
  }

}
?>