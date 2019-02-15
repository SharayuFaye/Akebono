<?php
class Postmodel extends CI_Model {
 
 function getPosts(){
  $this->db->select("mold,model,shot_current,shot_setting,hard_current,hard_setting,change_current,change_setting,status_running,m_c"); 
  $this->db->from('status_mold');
 $this->db->order_by("LEFT(mold,PATINDEX('%[0-9]%',mold)-1),CONVERT(INT,SUBSTRING(mold,PATINDEX('%[0-9]%',mold),LEN(mold))) ");


  
  $query = $this->db->get();
  return $query->result();
 }
 
}
?>
 