<?php
class Moldsetting extends CI_Model {
 
 function getMoldsetting(){
  $this->db->select("model, mold,cavity,m_c,clean_set,hard_chrom_set,die_change_set,qua_att,req_chorm,die_change,price_hard_chrom,price_die_change,mold_setting_id"); 
  $this->db->from('mold_setting');
 $this->db->order_by("LEFT(mold,PATINDEX('%[0-9]%',mold)-1),CONVERT(INT,SUBSTRING(mold,PATINDEX('%[0-9]%',mold),LEN(mold))) ");
 
  // $this->db->order_by(CAST(SUBSTR('mold FROM  4') AS UNSIGNED ));
  // CAST(SUBSTR(name FROM 7) AS UNSIGNED)
  $query = $this->db->get();
  return $query->result();
 }

function getPosts(){
  $this->db->select("mold,model,shot_current,shot_setting,hard_current,hard_setting,change_current,change_setting,status_running,m_c,mold_setting_id"); 
  $this->db->from('status_mold'); 
  $query = $this->db->get();
  return $query->result();
 }


 function saverecords($model,$mold,$cavity,$clean_set,$hard_chrom_set,$m_c,$die_change_set,$qua_att,$req_chorm,$die_change,$price_hard_chrom,$price_die_change)
	{
		alert('ok');
	$query="insert into mold_setting values('$model','$mold','cavity','$m_c','$clean_set','$hard_chrom_set','$die_change_set','$qua_att','$req_chorm','$die_change','$price_hard_chrom','$price_die_change')";
	$this->db->query($query);
	print_r($query);

	}
 
}

