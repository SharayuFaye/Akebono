<?php
class production extends CI_Model {
 
 function getproduction(){
  $this->db->select("date,time,item,hot_press,mold_no,udl,pcs,upper_temp,lower_temp"); 
  $this->db->from('production');
  $query = $this->db->get();
  return $query->result();
 }
 

 function getprod_item(){
  $this->db->select("item"); 
  $this->db->from('production');
  $this->db->distinct();
  $query = $this->db->get();
  return $query->result();
 }

 function getprod_machine(){
  $this->db->select("hot_press"); 
  $this->db->from('production');
  $this->db->distinct();
  $query = $this->db->get();
  return $query->result();
 }


}
?>
 