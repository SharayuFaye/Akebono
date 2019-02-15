<?php
class Searchmodel extends CI_Model
{
 public function selectorganizer ($search) {
    $condition = "search = '" . $search . "'";
    $this->db->select('*');
    $this->db->from('status_mold');
    $this->db->where('mold_setting','HP-1');
    $query = $this->db->get();
    return $result = $query->result();
}
}
?>







