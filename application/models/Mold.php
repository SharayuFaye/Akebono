<?php
class Mold extends CI_Model {
 
 function getMold(){
  $this->db->select("req_num,quatation_no,rfq_no,pr,no,part_no,description,quantity,unit,unit_cost,discount,amount,required_by,objective,mp_no,due_date,no_po,tax_invoice,receive_date,new_hard_chrome,data_inspection,fileupload,fileupload_no_po,fileupload_data_inspection"); 
  $this->db->from('mold');
  $query = $this->db->get();
  return $query->result();
 }
 
}
?>

 