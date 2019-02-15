 
  <?php
class Postmodel extends CI_Model {
 
 function getPosts(){
  $this->db->select("mold_setting_id"); 
  $this->db->from('status_mold');
$this->db->distinct();


  
  $query = $this->db->get();
  return $query->result();
 }
 
}
?>
 