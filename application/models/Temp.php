<?php
class Temp extends CI_Model {
 
 function getTemp(){
  $this->db->select("hotpress_time,upper_upper_temp,upper_lower_temp,middle_upper_temp,middle_lower_temp,lower_upper_temp,lower_lower_temp,pressure,moldid,item,upper_moldid,lower_moldid,middle_moldid,barcode,MACHINE_NAME"); 
  $this->db->from('temp_press');
  $this->db->order_by('hotpress_time','ASC');
  $query = $this->db->get();
  return $query->result();
 }
 
}
?>
 