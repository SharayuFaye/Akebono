<?php
class Inspection_Result_Sheet extends CI_Model {
 
 function Inspection_Result_Sheet_get($item,$mold){ 
 	 $this->db->select("item,tolerance,point1,point2,point3,point4,maximum_value,result
  	"); 
  $this->db->from('inspection_result_sheet_die');
  $this->db->where('item',$item);
  $this->db->where('mold',$mold);
  $query = $this->db->get();
  return $query->result();
 }
 

 //  function Inspection_Result_Sheet_getB($hotpress){ 
	//    $this->db->select("item,tolerance,point1,point2,point3,point4,maximum_value,result
 //  	"); 
	//   $this->db->from('inspection_result_sheet_die');
	//   $this->db->where('item','Block B');
 //  $this->db->where('hotpress',$hotpress);
	//   $query = $this->db->get();
	//   return $query->result();
 // }
 // function Inspection_Result_Sheet_getC($hotpress){ 
	//    $this->db->select("item,tolerance,point1,point2,point3,point4,maximum_value,result
 //  	"); 
	//   $this->db->from('inspection_result_sheet_die');
	//   $this->db->where('item','Block C');
 //  $this->db->where('hotpress',$hotpress);
	//   $query = $this->db->get();
	//   return $query->result();
 // }
 // function Inspection_Result_Sheet_getD($hotpress){ 
	//    $this->db->select("item,tolerance,point1,point2,point3,point4,maximum_value,result
 //  	"); 
	//   $this->db->from('inspection_result_sheet_die');
	//   $this->db->where('item','Block D');
 //  $this->db->where('hotpress',$hotpress);
	//   $query = $this->db->get();
	//   return $query->result();
 // }
 // function Inspection_Result_Sheet_getE($hotpress){ 
	//    $this->db->select("item,tolerance,point1,point2,point3,point4,maximum_value,result
 //  	"); 
	//   $this->db->from('inspection_result_sheet_die');
	//   $this->db->where('item','Block E');
 //  $this->db->where('hotpress',$hotpress);
	//   $query = $this->db->get();
	//   return $query->result();
 // }
 // function Inspection_Result_Sheet_getF($hotpress){ 
	//    $this->db->select("item,tolerance,point1,point2,point3,point4,maximum_value,result
 //  	"); 
	//   $this->db->from('inspection_result_sheet_die');
	//   $this->db->where('item','Block F');
 //  $this->db->where('hotpress',$hotpress);
	//   $query = $this->db->get();
	//   return $query->result();
 // }





 function Inspection_Result_Sheetpunch($item,$mold){ 
 	 $this->db->select("item,tolerance,point1,point2,point3,point4,result
  	"); 
  $this->db->from('inspection_result_sheet_punch');
  $this->db->where('item',$item);
  $this->db->where('mold',$mold);
  $query = $this->db->get();
  return $query->result();
 }



 function Inspection_Result_Sheet_mold($hotpress,$part,$item,$mold){ 
  $this->db->select("part,qty,standard,result,remark,hotpress"); 
  $this->db->from('inspection_result_sheet_mold');
  $this->db->where('part',$part); 
  $this->db->where('item',$item);
  $this->db->where('mold',$mold);
  $query = $this->db->get();
  return $query->result();
 }



 //  function Inspection_Result_SheetpunchB($hotpress){ 
	//    $this->db->select("item,tolerance,point1,point2,point3,point4,result
 //  	"); 
	//   $this->db->from('inspection_result_sheet_punch');
	//   $this->db->where('item','Block B');
 //  $this->db->where('hotpress',$hotpress);
	//   $query = $this->db->get();
	//   return $query->result();
 // }
 // function Inspection_Result_SheetpunchC($hotpress){ 
	//    $this->db->select("item,tolerance,point1,point2,point3,point4,result
 //  	"); 
	//   $this->db->from('inspection_result_sheet_punch');
	//   $this->db->where('item','Block C');
 //  $this->db->where('hotpress',$hotpress);
	//   $query = $this->db->get();
	//   return $query->result();
 // }
 // function Inspection_Result_SheetpunchD($hotpress){ 
	//    $this->db->select("item,tolerance,point1,point2,point3,point4,result
 //  	"); 
	//   $this->db->from('inspection_result_sheet_punch');
	//   $this->db->where('item','Block D');
 //  $this->db->where('hotpress',$hotpress);
	//   $query = $this->db->get();
	//   return $query->result();
 // }
 // function Inspection_Result_SheetpunchE($hotpress){ 
	//    $this->db->select("item,tolerance,point1,point2,point3,point4,result
 //  	"); 
	//   $this->db->from('inspection_result_sheet_punch');
	//   $this->db->where('item','Block E');
 //  $this->db->where('hotpress',$hotpress);
	//   $query = $this->db->get();
	//   return $query->result();
 // }
 // function Inspection_Result_SheetpunchF($hotpress){ 
	//    $this->db->select("item,tolerance,point1,point2,point3,point4,result
 //  	"); 
	//   $this->db->from('inspection_result_sheet_punch');
	//   $this->db->where('item','Block F');
 //  $this->db->where('hotpress',$hotpress);
	//   $query = $this->db->get();
	//   return $query->result();
 // }


}
?>

 