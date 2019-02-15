<?php
class Statushistory extends CI_Model {
 
 function getStatushistory(){
  $this->db->select("date,cleaner_shot,short_history_count,shot_counter_status,hard_history_count,hard_counter_status,change_boxes_history_count,change_boxes_status,mold"); 
  $this->db->from('history_display');
  $query = $this->db->get();
  return $query->result();
 }
 
}
?>
 