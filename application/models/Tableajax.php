<?php
class Tableajax extends CI_Model {
 
 function getTableajax(){
  $this->db->select("*"); 
  $this->db->from('mold_setting');
  $query = $this->db->get();
  return $query->result();
 }
 
}
?> 