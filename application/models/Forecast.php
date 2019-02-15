<?php
class forecast extends CI_Model { 
	function getforecast(){ 
    $this->db->select('f.mold_item,f.forecast,f.no_value,f.jan,f.feb,f.mar,f.apr,f.may,f.jun,f.jul,f.aug,f.sep,f.oct,f.nov,f.dec,f.sum,f.cost,f.cost1,f.year,
    	t.x,ty.y,t.count as countx,ty.count as county,ms.price_hard_chrom,ms.price_die_change ,ms.mold ,ms.mold_setting_id');
    $this->db->from('forecast f');  
    $this->db->join('targets t', 't.mold_setting_id=f.mold_setting_id', 'left');  
    $this->db->join('targetsy ty', 'ty.mold_setting_id=f.mold_setting_id', 'left'); 
    $this->db->join('mold_setting ms', 'ms.mold_setting_id=f.mold_setting_id', 'left'); 
    $query = $this->db->get(); 
    if($query->num_rows() != 0)
    {
        return $query->result();
    } 
    }


    function getdateforecast($year){ 
    $this->db->select('f.mold_item,f.forecast,f.no_value,f.jan,f.feb,f.mar,f.apr,f.may,f.jun,f.jul,f.aug,f.sep,f.oct,f.nov,f.dec,f.sum,f.cost,f.cost1,f.year,
        t.x,ty.y,t.count as countx,ty.count as county,ms.price_hard_chrom,ms.price_die_change ,ms.mold ,ms.mold_setting_id');
    $this->db->from('forecast f');  
    $this->db->join('targets t', 't.mold_setting_id=f.mold_setting_id', 'left');  
    $this->db->join('targetsy ty', 'ty.mold_setting_id=f.mold_setting_id', 'left'); 
    $this->db->join('mold_setting ms', 'ms.mold_setting_id=f.mold_setting_id', 'left'); 
    $this->db->where('f.year',$year);   
    $query = $this->db->get(); 
    if($query->num_rows() != 0)
    {
        return $query->result();
    } 
    }


}
?>