<?php
class forecastsetting extends CI_Model { 
	function getforecastsetting(){ 
    $this->db->select('f.mold_item,f.forecast,f.no_value,f.year,f.jan,f.feb,f.mar,f.apr,f.may,f.jun,f.jul,f.aug,f.sep,f.oct,f.nov,f.dec,f.sum,f.cost,f.cost1,
    	t.x,ty.y,t.count as countx,ty.count as county,ms.price_hard_chrom, ms.mold,ms.price_die_change');
    $this->db->from('forecast f');  
    $this->db->join('targets t', 't.mold_item=f.mold_item', 'left');  
    $this->db->join('targetsy ty', 'ty.mold_item=f.mold_item', 'left'); 
    $this->db->join('mold_setting ms', 'ms.mold_setting_id=f.mold_setting_id', 'left');  
    $query = $this->db->get(); 
    if($query->num_rows() != 0)
    {
        return $query->result();
    } 
    }




     function getdateforecastsetting($year){ 
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