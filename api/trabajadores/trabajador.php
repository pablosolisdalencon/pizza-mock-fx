<?php
include_once '../inc/dbx.php';
// CLASE PRINCIPAL PINCIPALES
class Trabajador extends DB{
  
  
  // Full List
  function listarTrabajadores(){
    $query = $this->connect()->query('SELECT * FROM Trabajadores');
    return $query;
  }
  
  // Listar By Rut Principal From Relaciones COntractuales
  function listarFromRelacionesContractualesByRutPrincipal($RutPrincipal){
    
    $query = $this->connect()->query("    
    SELECT DISTINCT Rut, Razon, code, idTrabajador, RelacionesContractuales.RutPrincipal AS RutPrincipal, RelacionesContractuales.RutContratista AS RutContratista
    FROM Trabajadores
    INNER JOIN RelacionesContractuales
    ON RelacionesContractuales.RutTrabajador = Trabajadores.Rut 
    WHERE RelacionesContractuales.RutPrincipal = '$RutPrincipal'
    ");
    return $query;
  }

  function listarFromRelacionesContractualesByRelacion($RutPrincipal,$RutContratista){
    
    $query = $this->connect()->query("    
    SELECT DISTINCT Rut, Razon, code, idTrabajador, RelacionesContractuales.RutPrincipal AS RutPrincipal, RelacionesContractuales.RutContratista AS RutContratista
    FROM Trabajadores
    INNER JOIN RelacionesContractuales
    ON RelacionesContractuales.RutTrabajador = Trabajadores.Rut 
    WHERE RelacionesContractuales.RutPrincipal = '$RutPrincipal' AND RelacionesContractuales.RutContratista = '$RutContratista'
    ");
    return $query;
  }
  
  function getTrabajadorByRut($Rut){
    $query = $this->connect()->query("SELECT * FROM Trabajadores WHERE Rut='$Rut'");
    return $query;
  }
  
}
?>