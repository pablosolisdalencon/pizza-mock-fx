<?php
include_once '../inc/dbx.php';
// CLASE PRINCIPAL PINCIPALES
class Auditor extends DB{
  
  
  // Full List 
  function listarAuditores(){
    
    $query = $this->connect()->query("
    SELECT 
      CONCAT(usuario.usu_nombre, ' ', usuario.usu_apelpat, ' ', usuario.usu_apelmat) As Nombre,
      usuario.usu_id as idAuditor
     FROM
      rol_usuario_permiso, rol, usuario
     WHERE
      rol.rol_id=rol_usuario_permiso.rol_id
      AND
        usuario.usu_id=rol_usuario_permiso.usu_id
      AND
        rol.rol_id=2
    ");
    return $query;
  }
  
}
?>