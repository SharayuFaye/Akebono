<?php
class Moldsetting1 extends CI_Model {
 
 function getMoldsetting1(){
  $this->db->select("mold_setting,model,shot_current,shot_setting,hard_current,hard_setting,change_current,change_setting,status_running,m_c"); 
  $this->db->from('status_mold');
  $query = $this->db->get();
  return $query->result();
 }
 
}
?>

