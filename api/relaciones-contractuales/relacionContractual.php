<?php
include_once '../inc/dbx.php';
// CLASE TRABAJADORES
class RelacionContractual extends DB{
  
  // Full List
  function listarRelacionesContractuales(){
    $query = $this->connect()->query('SELECT * FROM RelacionesContractuales');
    return $query;
  }
  /*
  //Crud
  function createTrabajador(){
    $query = $this->connect()->query("INSERT INTO Trabajadores ($params)VALUES($values)");
    return $query;
  }
  */
  //cRud
  function getRelacionesContractualesByRutPrincipal($RutPrincipal){
    $query = $this->connect()->query("SELECT * FROM RelacionesContractuales WHERE RutPrincipal='$RutPrincipal'");
    return $query;
  }
   
  /*
  //crUd
  function updateTrabajador($idTrabajador){
    $query = $this->connect()->query('UPDATE Trabajadores SET 
    
    Razon='$Razon',
    Rut='$Rut'
    
    WHERE
    
    idTrabajador='$idTrabajador'
    ');
    return $query;
  }
  //cruD
  function deleteTrabajador($idTrabajador){
    $query = $this->connect()->query("DELETE FROM Trabajadores WHERE idTrabajador='$idTrabajador'");
    return $query;
  }
  */
}
?>