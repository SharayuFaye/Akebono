<?php error_reporting(0);?> 

<style>
.dot {
    height:15px;
    width: 15px;
    background-color: green;
    border-radius: 50%;
    display: inline-block;
}
.dot1 {
    height:15px;
    width: 15px;
    background-color: black;
    border-radius: 50%;
    display: inline-block;
}
.button {
    background-color:#2F68AE; /* Green */
    border: none;
    color: white;
    padding: 7px 18px 9px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 7px 0px 7px 0px;
    cursor: pointer;
    
}
</style>

<script type="text/javascript">
function adddie($block,$tolerance,$mold){   
 
 $('#point1').val('');  
$('#point2').val('');  
$('#point3').val('');  
$('#point4').val('');  
$('#moldd').val($mold);  
$('#result').val('');
 
$('#block').val($block);      
$('#tolerance').val($tolerance);     
$('#die').modal('show');
 $('#hotpress').val($('#mold_name').val());  
  
}


function editdie($block,$tolerance,$point1,$point2,$point3,$point4,$maximum_value,$result){   
 
$('#block').val($block);      
$('#tolerance').val($tolerance);     
$('#die').modal('show');
$('#hotpress').val($('#mold_name').val());  
$('#point1').val($point1);  
$('#point2').val($point2);  
$('#point3').val($point3);  
$('#point4').val($point4);  
$('#moldd').val($maximum_value);  
$('#result').val($result);  
}


function addpunch($block,$tolerance,$moldp){   
 
 $('#point1p').val('');  
$('#point2p').val('');  
$('#point3p').val('');  
$('#point4p').val('');   
$('#resultp').val(''); 
$('#blockp').val($block);      
$('#tolerancep').val($tolerance); 
$('#moldp').val($moldp);  
$('#punch').modal('show');
 $('#hotpressp').val($('#mold_name').val());  
  
}

function editpunch($block,$tolerance,$point1,$point2,$point3,$point4,$result,$moldp){   
 
$('#blockp').val($block);      
$('#tolerancep').val($tolerance);     
$('#punch').modal('show');
$('#hotpressp').val($('#mold_name').val());  
$('#point1p').val($point1);  
$('#point2p').val($point2);  
$('#point3p').val($point3);  
$('#point4p').val($point4);   
$('#resultp').val($result);  
$('#moldp').val($moldp);  
} 

function addmold($item,$part,$qty,$standard,$moldm){   
 $('#itemm').val($item);  
 $('#part').val($part);  
$('#qty').val($qty);  
$('#standard').val($standard);  
$('#resultm').val('');  
$('#remark').val('');  
  
$('#moldm').val($moldm);  
$('#mold').modal('show');
 $('#hotpressm').val($('#mold_name').val());  
  
}


function editmold($item,$part,$qty,$standard,$result,$remark,$moldm){   
$('#hotpressm').val($('#mold_name').val());  
$('#itemm').val($item);  
$('#part').val($part);  
$('#qty').val($qty);  
$('#standard').val($standard);  
$('#resultm').val($result);  
$('#remark').val($remark);     
$('#mold').modal('show');

$('#moldm').val($moldm);  

}



function myFunction(){   
$('#mrow').val($('#mold_name').val());     
$('#moldrow').modal('show');

}

// $(document).ready(function () {        
// $('.tr5').show();$('.tr6').show(); $('#img6').show();$('#img4').hide();  
// $('#mold_name').click(function(){ 
//        if($('#mold_name').val() ==  'Hot Press 4'){
//         $('.tr5').hide();$('.tr6').hide();$('#img6').hide();$('#img4').show();  
//        }
//        else{
//         $('.tr5').show();  $('.tr6').show();    $('#img6').show(); $('#img4').hide()
//        }
// });

// });
</script>
            <div class="inner-wrapper">
                
                <section role="main" class="content-body">
                    <header class="page-header" style="background-color: #e60018;">
                        <!-- <h2>Responsive Tables</h2> -->
                    
                        <div class="right-wrapper text-right">
                            <ol class="breadcrumbs">
                                <li>        
                                </li>
                            </ol>
                    
                            
                        </div>
                    </header>

 
                        <div class="row" id="row" >
                            <div class="col" >
                                <section class="card">
                                    <header class="card-header">
                                        <div class="card-actions">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                                        </div>
                        
                                        <h2 class="card-title" style="color: black;">Inspection Result Sheet</h2>
                                        <div style="text-align: right;margin:-20px 75px 26px -4px;">Date : </div> 
                                    </header> 
    <div class="card-body">
         <?php $this->load->helper('form');?>
   <?php echo    form_open_multipart('Welcome/Inspection_Result_Sheet');?> 
     
 <table  id="mytable"  border="1px" width="1120px" cellpadding="10px">
<thead>
 <tr>    
  <td>
     Mold Name :
	 
<?php if(isset($mold_setting_data[0]->mold)){ echo $mold_setting_data[0]->mold; } else
  { ?>
 
<select name="moldId"  class="chosen"  style="height: 31px;width: 128px;" onchange="submit()">
        <option value="0">Select Mold</option> 
        <?php foreach($mold_settingdata as $Temp){?> 
            <option><?php echo $Temp->mold;?></option>
        <?php }?>

</select>
<?php } ?>
  <?php echo form_close(); ?>
  
<script type="text/javascript">
      $(".chosen").chosen();
</script>


    <!---  <?php if(isset($mold_setting_data[0]->cavity)){ echo "Hot Press " . $mold_setting_data[0]->cavity; } ?>--->
<input type="hidden" id="mold_name" name="select_hotpress" value="<?php if(isset($mold_setting_data[0]->cavity)){ echo "Hot Press " . $mold_setting_data[0]->cavity; } ?>">
 
 
  </td>
  <td>Model :  <?php   if(isset($mold_setting_data[0]->model)){ echo  $mold_setting_data[0]->model; } ?>       </td>
  <td>Code Mold : 
</td>
 </tr>
</thead>    
 </table> 

<div style="padding: 3% 32%;"> 

    


    <?php if(isset($mold_setting_data[0]->cavity) && ($mold_setting_data[0]->cavity == '6')){ ?>
    <img src="<?php echo base_url();?>/img/hotpress6.JPG"  id="img6"  width="400px"> 
    <?php } 
     elseif(isset($mold_setting_data[0]->cavity) && ($mold_setting_data[0]->cavity == '4')){ ?>   
    <img src="<?php echo base_url();?>/img/hotpress4.JPG" id="img4" width="400px"> 
     <?php } else { ?>
     <img src="<?php echo base_url();?>/img/hotpress6.JPG"  id="img6"  width="400px"> 
       <?php } ?>
</div>

<BR>
 
<h2 class="card-title" style="color: black;">The wear of the mold surface ( Die )</h2> 
  
<BR>  

 
<table  id="mytable"  class="table table-responsive-lg table-bordered table-striped table-sm mb-0"  >
<thead>
<tr>
<th  style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Item</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Tolerance</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Point  1</th> 
<th  style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Point  2</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Point  3</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Point  4</th> 
<th  style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Maximum Value</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  colspan="2">Result data</th> 
<th style="text-align: center;background-color: #026AB7;color: white; " rowspan="2" >Action</th> 
</tr> 
<tr>
<th  style="text-align: center;background-color: #026AB7;color: white;">Ok</th>
<th style="text-align: center;background-color: #026AB7;color: white;">NG</th>
</tr> 
</thead>          
<tbody>
<tr class="tr1">  
    <td>Block A</td> 
    <td>ไม่เกิน <?php echo $mold_setting_data[0]->die_change ; ?> mm</td> 
    <td><?php if($inspectiona){ echo $inspectiona[0]->point1; } ?></td> 
    <td><?php if($inspectiona){ echo $inspectiona[0]->point2; } ?></td> 
    <td><?php if($inspectiona){ echo $inspectiona[0]->point3; } ?></td> 
    <td><?php if($inspectiona){ echo $inspectiona[0]->point4; } ?></td> 
    <td><?php if($inspectiona){ echo $inspectiona[0]->maximum_value; } ?></td> 
    <td align="center">
    <?php if(isset($inspectiona[0]->maximum_value )){ if($inspectiona[0]->maximum_value < $mold_setting_data[0]->die_change){ ?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php } }?>
    </td>  
    <td align="center">
    <?php if(isset($inspectiona[0]->maximum_value )){ if($inspectiona[0]->maximum_value > $mold_setting_data[0]->die_change){  ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>
    <td align="center"><a  <?php if($inspectiona){?> onclick="editdie('Block A','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+' mm',
        '<?php echo $inspectiona[0]->point1;?>','<?php echo $inspectiona[0]->point2;?>',
        '<?php echo $inspectiona[0]->point3;?>','<?php echo $inspectiona[0]->point4;?>',
        '<?php if(isset($moldId)){ echo $moldId; } ?>','<?php echo $inspectiona[0]->result;?>'
          )" <?php } else { ?>  onclick="adddie('Block A','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change; ?> +'mm','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>        
 </tr> 
 <tr class="t21">  
    <td>Block B</td> 
    <td>ไม่เกิน <?php echo $mold_setting_data[0]->die_change ; ?> mm</td> 
    <td><?php if($inspectionb){ echo $inspectionb[0]->point1; } ?></td> 
    <td><?php if($inspectionb){ echo $inspectionb[0]->point2; } ?></td> 
    <td><?php if($inspectionb){ echo $inspectionb[0]->point3; } ?></td> 
    <td><?php if($inspectionb){ echo $inspectionb[0]->point4; } ?></td> 
    <td><?php if($inspectionb){ echo $inspectionb[0]->maximum_value; } ?></td> 
    <td align="center">
    <?php if(isset($inspectionb[0]->maximum_value )){ if($inspectionb[0]->maximum_value <$mold_setting_data[0]->die_change){ ?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php } }?>
    </td>  
    <td align="center">
    <?php if(isset($inspectionb[0]->maximum_value )){ if($inspectionb[0]->maximum_value > $mold_setting_data[0]->die_change){  ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>
    <td align="center"><a  <?php if($inspectionb){?> onclick="editdie('Block B','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+' mm',
        '<?php echo $inspectionb[0]->point1;?>','<?php echo $inspectionb[0]->point2;?>',
        '<?php echo $inspectionb[0]->point3;?>','<?php echo $inspectionb[0]->point4;?>',
        '<?php if(isset($moldId)){ echo $moldId; } ?>','<?php echo $inspectionb[0]->result;?>'
          )" <?php } else { ?>  onclick="adddie('Block B','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+' mm','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>            
 </tr> 
 <tr class="tr3">  
    <td>Block C</td> 
    <td>ไม่เกิน <?php echo $mold_setting_data[0]->die_change ; ?> mm</td> 
     <td><?php if($inspectionc){ echo $inspectionc[0]->point1; } ?></td> 
    <td><?php if($inspectionc){ echo $inspectionc[0]->point2; } ?></td> 
    <td><?php if($inspectionc){ echo $inspectionc[0]->point3; } ?></td> 
    <td><?php if($inspectionc){ echo $inspectionc[0]->point4; } ?></td> 
    <td><?php if($inspectionc){ echo $inspectionc[0]->maximum_value; } ?></td> 
   <td align="center">
    <?php if(isset($inspectionc[0]->maximum_value )){ if($inspectionc[0]->maximum_value <$mold_setting_data[0]->die_change){ ?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>  
    <td align="center">
    <?php if(isset($inspectionc[0]->maximum_value )){ if($inspectionc[0]->maximum_value > $mold_setting_data[0]->die_change){  ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>
    <td align="center"><a  <?php if($inspectionc){?> onclick="editdie('Block C','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+' mm',
        '<?php echo $inspectionc[0]->point1;?>','<?php echo $inspectionc[0]->point2;?>',
        '<?php echo $inspectionc[0]->point3;?>','<?php echo $inspectionc[0]->point4;?>',
        '<?php if(isset($moldId)){ echo $moldId; } ?>','<?php echo $inspectionc[0]->result;?>'
          )" <?php } else { ?>  onclick="adddie('Block C','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+' mm','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>           
 </tr> 
 <tr class="tr4">  
    <td>Block D</td> 
    <td>ไม่เกิน <?php echo $mold_setting_data[0]->die_change ; ?> mm</td> 
     <td><?php if($inspectiond){ echo $inspectiond[0]->point1; } ?></td> 
    <td><?php if($inspectiond){ echo $inspectiond[0]->point2; } ?></td> 
    <td><?php if($inspectiond){ echo $inspectiond[0]->point3; } ?></td> 
    <td><?php if($inspectiond){ echo $inspectiond[0]->point4; } ?></td> 
    <td><?php if($inspectiond){ echo $inspectiond[0]->maximum_value; } ?></td> 
   <td align="center">
    <?php if(isset($inspectiond[0]->maximum_value )){ if($inspectiond[0]->maximum_value < $mold_setting_data[0]->die_change){ ?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php } }?>
    </td>  
    <td align="center">
    <?php if(isset($inspectiond[0]->maximum_value )){ if($inspectiond[0]->maximum_value > $mold_setting_data[0]->die_change){  ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } }  ?>
    </td>
    <td align="center"><a  <?php if($inspectiond){?> onclick="editdie('Block D','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+' mm',
        '<?php echo $inspectiond[0]->point1;?>','<?php echo $inspectiond[0]->point2;?>',
        '<?php echo $inspectiond[0]->point3;?>','<?php echo $inspectiond[0]->point4;?>',
        '<?php if(isset($moldId)){ echo $moldId; } ?>','<?php echo $inspectiond[0]->result;?>'
          )" <?php } else { ?>  onclick="adddie('Block D','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+' mm','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>         
 </tr> 
 <?php if($mold_setting_data[0]->cavity == '6'){ ?>
 <tr class="tr5">  
    <td>Block E</td> 
    <td>ไม่เกิน <?php echo $mold_setting_data[0]->die_change ; ?> mm</td> 
     <td><?php if($inspectione){ echo $inspectione[0]->point1; } ?></td> 
    <td><?php if($inspectione){ echo $inspectione[0]->point2; } ?></td> 
    <td><?php if($inspectione){ echo $inspectione[0]->point3; } ?></td> 
    <td><?php if($inspectione){ echo $inspectione[0]->point4; } ?></td> 
    <td><?php if($inspectione){ echo $inspectione[0]->maximum_value; } ?></td> 
  <td align="center">
    <?php if(isset($inspectione[0]->maximum_value )){ if($inspectione[0]->maximum_value <$mold_setting_data[0]->die_change){ ?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  }  }?>
    </td>  
    <td align="center">
    <?php if(isset($inspectione[0]->maximum_value )){ if($inspectione[0]->maximum_value > $mold_setting_data[0]->die_change){  ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>
    <td align="center"><a  <?php if($inspectione){?> onclick="editdie('Block E','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+'mm',
        '<?php echo $inspectione[0]->point1;?>','<?php echo $inspectione[0]->point2;?>',
        '<?php echo $inspectione[0]->point3;?>','<?php echo $inspectione[0]->point4;?>',
        '<?php if(isset($moldId)){ echo $moldId; } ?>','<?php echo $inspectione[0]->result;?>'
          )" <?php } else { ?>  onclick="adddie('Block E','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+' mm','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>        
 </tr> 
 <tr class="tr6">  
<td>Block F</td> 
<td>ไม่เกิน <?php echo $mold_setting_data[0]->die_change ; ?> mm</td> 
<td><?php if($inspectionf){ echo $inspectionf[0]->point1; } ?></td> 
<td><?php if($inspectionf){ echo $inspectionf[0]->point2; } ?></td> 
<td><?php if($inspectionf){ echo $inspectionf[0]->point3; } ?></td> 
<td><?php if($inspectionf){ echo $inspectionf[0]->point4; } ?></td> 
<td><?php if($inspectionf){ echo $inspectionf[0]->maximum_value; } ?></td> 
<td align="center">
    <?php if(isset($inspectionf[0]->maximum_value )){ if($inspectionf[0]->maximum_value <$mold_setting_data[0]->die_change){ ?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php } }?>
    </td>  
    <td align="center">
    <?php if(isset($inspectionf[0]->maximum_value )){ if($inspectionf[0]->maximum_value > $mold_setting_data[0]->die_change){  ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>
<td align="center"><a  <?php if($inspectionf){?> onclick="editpunch('Block F','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+' mm',
'<?php echo $inspectionf[0]->point1;?>','<?php echo $inspectionf[0]->point2;?>',
'<?php echo $inspectionf[0]->point3;?>','<?php echo $inspectionf[0]->point4;?>',
'<?php if(isset($moldId)){ echo $moldId; } ?>','<?php echo $inspectionf[0]->result;?>'
)" <?php } else { ?>  onclick="adddie('Block F','ไม่เกิน '+<?php echo $mold_setting_data[0]->die_change ; ?>+' mm','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>        
 </tr> 

<?php } ?>
</table> 
<!-- <button data-toggle="modal" id="open-die"   data-modal="modal" type="button" class="btn btn-primary  button button2">Add</button> -->





<BR><BR><BR>
 
<h2 class="card-title" style="color: black;">The wear of the mold surface ( Punch )</h2> 
  
<BR>  

 
<table  id="mytable"  class="table table-responsive-lg table-bordered table-striped table-sm mb-0"  >
<thead>
<tr>
<th  style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Item</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Tolerance</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Point  1</th> 
<th  style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Point  2</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Point  3</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Point  4</th>  
<th style="text-align: center;background-color: #026AB7;color: white;"  colspan="2">Result data</th> 
<th style="text-align: center;background-color: #026AB7;color: white; " rowspan="2" >Action</th> 
</tr> 
<tr>
<th  style="text-align: center;background-color: #026AB7;color: white;">Ok</th>
<th style="text-align: center;background-color: #026AB7;color: white;">NG</th>
</tr> 
</thead>          
<tbody>  
<tr class="tr1">  
    <td>Block A</td> 
    <td>ไม่แตกร้าว,ผิวบิ่น</td> 
    <td><?php if($puncha){ echo $puncha[0]->point1; } ?></td> 
    <td><?php if($puncha){ echo $puncha[0]->point2; } ?></td> 
    <td><?php if($puncha){ echo $puncha[0]->point3; } ?></td> 
    <td><?php if($puncha){ echo $puncha[0]->point4; } ?></td>  
    <td align="center">
    <?php if($puncha){ if($puncha[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>  
    <td align="center">
    <?php if($puncha){ if($puncha[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>  
    <td align="center"><a  <?php if($puncha){?> onclick="editpunch('Block A','ไม่แตกร้าว,ผิวบิ่น',
        '<?php echo $puncha[0]->point1;?>','<?php echo $puncha[0]->point2;?>',
        '<?php echo $puncha[0]->point3;?>','<?php echo $puncha[0]->point4;?>',
        '<?php echo $puncha[0]->result;?>','<?php if(isset($moldId)){ echo $moldId; } ?>'
          )" <?php } else { ?>  onclick="addpunch('Block A','ไม่แตกร้าว,ผิวบิ่น','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>    
 </tr> 
 <tr class="t21">  
    <td>Block B</td> 
    <td>ไม่แตกร้าว,ผิวบิ่น</td> 
     <td><?php if($punchb){ echo $punchb[0]->point1; } ?></td> 
    <td><?php if($punchb){ echo $punchb[0]->point2; } ?></td> 
    <td><?php if($punchb){ echo $punchb[0]->point3; } ?></td> 
    <td><?php if($punchb){ echo $punchb[0]->point4; } ?></td>  
    <td align="center">
    <?php if($punchb){ if($punchb[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>  
    <td align="center">
    <?php if($punchb){ if($punchb[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>  
    <td align="center"><a  <?php if($punchb){?> onclick="editpunch('Block B','ไม่แตกร้าว,ผิวบิ่น',
        '<?php echo $punchb[0]->point1;?>','<?php echo $punchb[0]->point2;?>',
        '<?php echo $punchb[0]->point3;?>','<?php echo $punchb[0]->point4;?>',
        '<?php echo $punchb[0]->result;?>','<?php if(isset($moldId)){ echo $moldId; } ?>'
          )" <?php } else { ?>  onclick="addpunch('Block B','ไม่แตกร้าว,ผิวบิ่น','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>    
 </tr> 
 <tr class="tr3">  
    <td>Block C</td> 
    <td>ไม่แตกร้าว,ผิวบิ่น</td> 
     <td><?php if($punchc){ echo $punchc[0]->point1; } ?></td> 
    <td><?php if($punchc){ echo $punchc[0]->point2; } ?></td> 
    <td><?php if($punchc){ echo $punchc[0]->point3; } ?></td> 
    <td><?php if($punchc){ echo $punchc[0]->point4; } ?></td>  
    <td align="center">
    <?php if($punchc){ if($punchc[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>  
    <td align="center">
    <?php if($punchc){ if($punchc[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>  
    <td align="center"><a  <?php if($punchc){?> onclick="editpunch('Block C','ไม่แตกร้าว,ผิวบิ่น',
        '<?php echo $punchc[0]->point1;?>','<?php echo $punchc[0]->point2;?>',
        '<?php echo $punchc[0]->point3;?>','<?php echo $punchc[0]->point4;?>',
        '<?php echo $punchc[0]->result;?>','<?php if(isset($moldId)){ echo $moldId; } ?>'
          )" <?php } else { ?>  onclick="addpunch('Block C','ไม่แตกร้าว,ผิวบิ่น','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>    
 </tr> 
 <tr class="tr4">  
    <td>Block D</td> 
    <td>ไม่แตกร้าว,ผิวบิ่น</td> 
     <td><?php if($punchd){ echo $punchd[0]->point1; } ?></td> 
    <td><?php if($punchd){ echo $punchd[0]->point2; } ?></td> 
    <td><?php if($punchd){ echo $punchd[0]->point3; } ?></td> 
    <td><?php if($punchd){ echo $punchd[0]->point4; } ?></td>  
    <td align="center">
    <?php if($punchd){ if($punchd[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>  
    <td align="center">
    <?php if($punchd){ if($punchd[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>  
    <td align="center"><a  <?php if($punchd){?> onclick="editpunch('Block D','ไม่แตกร้าว,ผิวบิ่น',
        '<?php echo $punchd[0]->point1;?>','<?php echo $punchd[0]->point2;?>',
        '<?php echo $punchd[0]->point3;?>','<?php echo $punchd[0]->point4;?>',
        '<?php echo $punchd[0]->result;?>','<?php if(isset($moldId)){ echo $moldId; } ?>'
          )" <?php } else { ?>  onclick="addpunch('Block D','ไม่แตกร้าว,ผิวบิ่น','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>      
 </tr> 
 <?php if($mold_setting_data[0]->cavity == '6'){ ?>
 
 <tr class="tr5">  
    <td>Block E</td> 
    <td>ไม่แตกร้าว,ผิวบิ่น</td> 
     <td><?php if($punche){ echo $punche[0]->point1; } ?></td> 
    <td><?php if($punche){ echo $punche[0]->point2; } ?></td> 
    <td><?php if($punche){ echo $punche[0]->point3; } ?></td> 
    <td><?php if($punche){ echo $punche[0]->point4; } ?></td>  
    <td align="center">
    <?php if($punche){ if($punche[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>  
    <td align="center">
    <?php if($punche){ if($punche[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>  
    <td align="center"><a  <?php if($punche){?> onclick="editpunch('Block E','ไม่แตกร้าว,ผิวบิ่น',
        '<?php echo $punche[0]->point1;?>','<?php echo $punche[0]->point2;?>',
        '<?php echo $punche[0]->point3;?>','<?php echo $punche[0]->point4;?>',
        '<?php echo $punche[0]->result;?>','<?php if(isset($moldId)){ echo $moldId; } ?>'
          )" <?php } else { ?>  onclick="addpunch('Block E','ไม่แตกร้าว,ผิวบิ่น','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>       
 </tr> 
 <tr class="tr6">  
    <td>Block F</td> 
    <td>ไม่แตกร้าว,ผิวบิ่น</td> 
     <td><?php if($punchf){ echo $punchf[0]->point1; } ?></td> 
    <td><?php if($punchf){ echo $punchf[0]->point2; } ?></td> 
    <td><?php if($punchf){ echo $punchf[0]->point3; } ?></td> 
    <td><?php if($punchf){ echo $punchf[0]->point4; } ?></td>  
    <td align="center">
    <?php if($punchf){ if($punchf[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>  
    <td align="center">
    <?php if($punchf){ if($punchf[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>  
    <td align="center"><a  <?php if($punchf){?> onclick="editpunch('Block F','ไม่แตกร้าว,ผิวบิ่น',
        '<?php echo $punchf[0]->point1;?>','<?php echo $punchf[0]->point2;?>',
        '<?php echo $punchf[0]->point3;?>','<?php echo $punchf[0]->point4;?>',
        '<?php echo $punchf[0]->result;?>','<?php if(isset($moldId)){ echo $moldId; } ?>'
          )" <?php } else { ?>  onclick="addpunch('Block F','ไม่แตกร้าว,ผิวบิ่น','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>    
 </tr> 
<?php } ?>
</table> 
<!-- <button onclick="myFunction()" type="button" class="btn btn-primary  button button2">Add</button>
 -->




<BR><BR><BR>
 
<h2 class="card-title" style="color: black;">Overall Condition of the mold</h2> 
  
<BR>  

 
<table  id="mytable"  class="table table-responsive-lg table-bordered table-striped table-sm mb-0"  >
<thead>
<tr>
<th  style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Item</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Part Name</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Q'ty</th> 
<th  style="text-align: center;background-color: #026AB7;color: white;"  rowspan="2">Standard</th> 
<th style="text-align: center;background-color: #026AB7;color: white;"  colspan="2">Result </th> 
<th style="text-align: center;background-color: #026AB7;color: white; " rowspan="2" >Remark</th> 
 
<th style="text-align: center;background-color: #026AB7;color: white; " rowspan="2" >Action</th> 
</tr> 
<tr>
<th  style="text-align: center;background-color: #026AB7;color: white;">Ok</th>
<th style="text-align: center;background-color: #026AB7;color: white;">NG</th>
</tr> 
</thead>          
<tbody>
<tr>  
    <td><?php echo $item1 = '1' ; ?></td>  
    <td><?php echo $part1= 'Pin'; ?></td> 
    <td><?php  if($mold1){ echo $qty1= $mold1[0]->qty; } else{ echo $qty1='2' ;} ?></td> 
    <td><?php echo $standard1 = 'วัดขนาด Diameter  ไม่ต่ำกว่า  15.00 mm <br> 1 =                  mm     2  =                    mm  ';?>          </td>  
    <td align="center">
    <?php if($mold1){ if($mold1[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold1){ if($mold1[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold1){ echo $mold1[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold1){?>
     onclick="editmold('<?php echo $item1;?>','<?php echo $part1;?>','<?php echo $qty1;?>','<?php echo $standard1;?>','<?php echo $mold1[0]->result;?>','<?php echo $mold1[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item1;?>','<?php echo $part1;?>','<?php echo $qty1;?>','<?php echo $standard1;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>    
 </tr>  
 </tr>


 <tr>  
    <td><?php echo $item2 = 2; ?></td> 
    <td><?php echo $part2 = 'ฝาโมลด์'; ?></td>  
    <td><?php if($mold2){ echo $qty2=  $mold2[0]->qty; } else{ echo $qty2= 1; } ?></td> 
    <td><?php echo $standard2 = 'ไม่มีรอยแตกและด้ามจับรอยเชื่อมแน่น';   ?></td> 
    <td align="center">
    <?php if($mold2){ if($mold2[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold2){ if($mold2[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold2){ echo $mold2[0]->remark; } ?></td>  
   <td align="center"><a  <?php if($mold2){?>
     onclick="editmold('<?php echo $item2;?>','<?php echo $part2;?>','<?php echo $qty2;?>','<?php echo $standard2;?>','<?php echo $mold2[0]->result;?>','<?php echo $mold2[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item2;?>','<?php echo $part2;?>','<?php echo $qty2;?>','<?php echo $standard2;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>   
 </tr>
 <tr>  
    <td><?php echo $item3 =3; ?></td> 
    <td><?php echo $part3 = 'Spring mold'; ?></td>  
    <td><?php if($mold3){ echo $qty3=  $mold3[0]->qty; } else{ echo $qty3=  4 ; } ?></td> 
    <td><?php echo $standard3 = 'ไม่เสียรูปและวัดความยาวต้องไม่ต่ำกว่า  90 mm'; ?></td>  
    <td align="center">
    <?php if($mold3){ if($mold3[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold3){ if($mold3[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold3){ echo $mold3[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold3){?>
     onclick="editmold('<?php echo $item3;?>','<?php echo $part3;?>','<?php echo $qty3;?>','<?php echo $standard3;?>','<?php echo $mold3[0]->result;?>','<?php echo $mold3[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item3;?>','<?php echo $part3;?>','<?php echo $qty3;?>','<?php echo $standard3;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>    
 </tr>
 <tr>  
    <td><?php echo $item4 =4; ?></td> 
    <td><?php echo $part4 = 'Bush'; ?></td>  
    <td><?php if($mold4){ echo $qty4= $mold4[0]->qty; } else{ echo $qty4= 2 ; } ?></td> 
     <td><?php echo $standard4 = 'ไม่มีรอยขูดขีดโดยรอบตัว Bush'; ?></td>  
    <td align="center">
    <?php if($mold4){ if($mold4[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold4){ if($mold4[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold4){ echo $mold4[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold4){?>
     onclick="editmold('<?php echo $item4;?>','<?php echo $part4;?>','<?php echo $qty4;?>','<?php echo $standard4;?>','<?php echo $mold4[0]->result;?>','<?php echo $mold4[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item4;?>','<?php echo $part4;?>','<?php echo $qty4;?>','<?php echo $standard4;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>   
 </tr>
 <tr>  
    <td><?php echo $item5 =5; ?></td> 
    <td><?php echo $part5 = 'Stopper (knock out)'; ?></td>  
    <td><?php if($mold5){ echo $qty5=  $mold5[0]->qty; } else{ echo $qty5= 5 ;} ?></td> 
    <td><?php echo $standard5 = 'ไม่หลวมคลอน,ด้านล่างไม่สึกหรอมาก'; ?></td> 
    <td align="center">
    <?php if($mold5){ if($mold5[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold5){ if($mold5[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold5){ echo $mold5[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold5){?>
     onclick="editmold('<?php echo $item5;?>','<?php echo $part5;?>','<?php echo $qty5;?>','<?php echo $standard5;?>','<?php echo $mold5[0]->result;?>','<?php echo $mold5[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item5;?>','<?php echo $part5;?>','<?php echo $qty5;?>','<?php echo $standard5;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>  
 </tr>
 <tr>  
    <td><?php echo $item6 =6; ?></td> 
    <td><?php echo $part6 = 'Cover'; ?> </td>  
    <td><?php if($mold6){ echo $qty6=  $mold6[0]->qty; } else{ echo $qty6= 'All'; } ?></td> 
    <td><?php echo $standard6 = 'มีน็อตยึดครบทุกตัว,ไม่เสียรูป'; ?></td> 
    <td align="center">
    <?php if($mold6){ if($mold6[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold6){ if($mold6[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold6){ echo $mold6[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold6){?>
     onclick="editmold('<?php echo $item6;?>','<?php echo $part6;?>','<?php echo $qty6;?>','<?php echo $standard6;?>','<?php echo $mold6[0]->result;?>','<?php echo $mold6[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item6;?>','<?php echo $part6;?>','<?php echo $qty6;?>','<?php echo $standard6;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>    
 </tr>
 <tr>  
    <td><?php echo $item7 =7; ?></td> 
    <td><?php echo $part7 = 'Punch' ; ?></td>  
    <td><?php if($mold7){  echo $qty7=   $mold7[0]->qty; } else{  echo $qty7=   4 ; } ?></td> 
    <td><?php echo $standard7 = 'ผิวชุบไม่หลุดลอก,ไม่เปลี่ยนสี'; ?></td> 
    <td align="center">
    <?php if($mold7){ if($mold7[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold7){ if($mold7[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold7){ echo $mold7[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold7){?>
     onclick="editmold('<?php echo $item7;?>','<?php echo $part7;?>','<?php echo $qty7;?>','<?php echo $standard7;?>','<?php echo $mold7[0]->result;?>','<?php echo $mold7[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item7;?>','<?php echo $part7;?>','<?php echo $qty7;?>','<?php echo $standard7;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>   
 </tr>
 <tr>  
    <td><?php echo $item8 =8; ?></td> 
    <td><?php echo $part8 = 'Die' ; ?></td>  
    <td><?php if($mold8){ echo $qty8=   $mold8[0]->qty; } else{ echo $qty8=  4 ; } ?></td> 
    <td><?php echo $standard8 = 'ผิวชุบไม่หลุดลอก,ไม่เปลี่ยนสี'; ?></td> 
    <td align="center">
    <?php if($mold8){ if($mold8[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold8){ if($mold8[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold8){ echo $mold8[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold8){?>
     onclick="editmold('<?php echo $item8;?>','<?php echo $part8;?>','<?php echo $qty8;?>','<?php echo $standard8;?>','<?php echo $mold8[0]->result;?>','<?php echo $mold8[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item8;?>','<?php echo $part8;?>','<?php echo $qty8;?>','<?php echo $standard8;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td> 
 </tr>
 <tr>  
    <td><?php echo $item9 =9; ?></td> 
    <td><?php echo $part9 = 'ฝาโมลด์'; ?></td>  
    <td><?php if($mold9){  echo $qty9=  $mold9[0]->qty; } else{  echo $qty9=  1 ;} ?></td> 
    <td><?php echo $standard9 = 'ผิวชุบไม่หลุดลอก,ไม่เปลี่ยนสี'; ?></td> 
    <td align="center">
    <?php if($mold9){ if($mold9[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold9){ if($mold9[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold9){ echo $mold9[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold9){?>
     onclick="editmold('<?php echo $item9;?>','<?php echo $part9;?>','<?php echo $qty9;?>','<?php echo $standard9;?>','<?php echo $mold9[0]->result;?>','<?php echo $mold9[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item9;?>','<?php echo $part9;?>','<?php echo $qty9;?>','<?php echo $standard9;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td> 
 </tr>
 <tr>  
    <td><?php echo $item10 =10; ?></td> 
    <td><?php echo $part10 = 'Pin ยึดตำแหน่งฝาโมลด์'; ?></td>  
   <td><?php if($mold10){  echo $qty10=   $mold10[0]->qty; } else{  echo $qty10=  1 ; } ?></td> 
    <td><?php echo $standard10 = 'ไม่เสียรูปและไม่สึกหรอ'; ?></td> 
    <td align="center">
    <?php if($mold10){ if($mold10[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold10){ if($mold10[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold10){ echo $mold10[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold10){?>
     onclick="editmold('<?php echo $item10;?>','<?php echo $part10;?>','<?php echo $qty10;?>','<?php echo $standard10;?>','<?php echo $mold10[0]->result;?>','<?php echo $mold10[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item10;?>','<?php echo $part10;?>','<?php echo $qty10;?>','<?php echo $standard10;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>    
 </tr>
 <tr>   
    <td><?php echo $item11 =11; ?></td> 
    <td><?php echo $part11 = 'Triper bolt nut'; ?></td>  
   <td><?php if($mold11){  echo $qty11=   $mold11[0]->qty; } else{  echo $qty11=  'All' ; } ?></td> 
    <td><?php echo $standard11 = 'เปลียนตามรอบส่งออกชุบ'; ?></td> 
    <td align="center">
    <?php if($mold11){ if($mold11[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold11){ if($mold11[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold11){ echo $mold11[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold11){?>
     onclick="editmold('<?php echo $item11;?>','<?php echo $part11;?>','<?php echo $qty11;?>','<?php echo $standard11;?>','<?php echo $mold11[0]->result;?>','<?php echo $mold11[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item11;?>','<?php echo $part11;?>','<?php echo $qty11;?>','<?php echo $standard11;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>    
 </tr>
 <tr>   
    <td><?php echo $item12 =12; ?></td> 
    <td><?php echo $part12 = 'Dis spring'; ?></td>  
   <td><?php if($mold12){  echo $qty12=   $mold12[0]->qty; } else{  echo $qty12=  'All' ; } ?></td> 
    <td><?php echo $standard12 = 'เปลียนตามรอบส่งออกชุบ'; ?></td> 
    <td align="center">
    <?php if($mold12){ if($mold12[0]->result=='OK'){?>
        <img  src="<?php echo base_url();?>/img/green.png"  id="img6"  width="20px">
    <?php  } }?>
    </td>   
    <td align="center">
    <?php if($mold12){ if($mold12[0]->result=='NG'){ ?>
        <img  src="<?php echo base_url();?>/img/red.png"  id="img6"  width="20px">
    <?php  } } ?>
    </td>   
    <td><?php if($mold12){ echo $mold12[0]->remark; } ?></td>  
    <td align="center"><a  <?php if($mold12){?>
     onclick="editmold('<?php echo $item12;?>','<?php echo $part12;?>','<?php echo $qty12;?>','<?php echo $standard12;?>','<?php echo $mold12[0]->result;?>','<?php echo $mold12[0]->remark;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')" 
    <?php } else { ?>
    onclick="addmold('<?php echo $item12;?>','<?php echo $part12;?>','<?php echo $qty12;?>','<?php echo $standard12;?>','<?php if(isset($moldId)){ echo $moldId; } ?>')"   <?php } ?> ><i class="fa fa-pencil"></i></a></td>  
 </tr>



 <tr>
<td  rowspan="2" colspan="4"></td>
<td  colspan="2"  >Inspection by</td>
<td  >Checked by</td>  
<td  >Approved by</td>  
<tr>
   <tr>
<td  colspan="4">
    <!-- <button type="button" onclick="myFunction()" class="btn btn-primary  button button2">Add</button> -->
</td>
<td  colspan="2"  ></td>
<td  ></td>  
<td  ></td>  
<tr>
</tbody>
</table> 
<!-- <button onclick="myFunction()" type="button" class="btn btn-primary  button button2">Add</button>
 -->



<h5 style="    margin-bottom: 27px;"> 
  <div  style="float: left;">Form Number : FR-MN-014 </div>
<div style="float: left;padding: 0 286px">Akebono Brake ( Thailand) Co.,Ltd</div>
<div style="float: left;padding: 0 20px 0  10px;">Revision 00(April 25,2014)</div>
</h5>


<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Mold_Die_History_Record'); ?> 
<input type="hidden" name="moldId" value="<?php if(isset($moldId)){ echo $moldId;  } ?>">
<input type="hidden" name="hotpress_data" value="<?php if(isset($select_hotpress)){ echo $select_hotpress;  } ?>">
     <input class="btn btn-primary  button button2" style="MARGIN: 0 0 0 -77%;    padding-top: 12px;" name="export" type="submit" value="Save XLS"/>
      <button onclick="myPrint()" type="button" class="btn btn-primary  button button2">Print</button>

<a ><button onclick="submit()" style="    margin: -79px 0 0 95%;" type="button" class="btn btn-primary  button button2">Next</button></a>
 <?php echo form_close(); ?>    



                                    </div>
                                </section>
                                </div>
                        </div>              
                </section>
            </div>      
        </section>
 


 <script type="text/javascript">
function myPrint() { 
    document.getElementById("row").style.paddingLeft = "300px"; 
    $('.header').hide(); 
    window.print();
    $('.header').show(); 
    document.getElementById("row").style.paddingLeft = "0px";
}
 </script>        
<!-------------------Modal Popup ---------------------------->



<!-- add die -->
<div class="modal fade" id="die" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 123%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">The wear of the mold surface ( Die ) </h4>
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style=" color:black;background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo form_open_multipart('Welcome/Inspection_Result_Sheet');?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
     
    <div class="container-fluid">
  <div class="row">
     <input type="hidden" name="hotpress"   id="hotpress" value="">
      <input type="hidden" name="moldId"   id="moldd" value="">
    <div class="col-sm-4" > Item:<br>
  <input type="text" name="block" readonly="readonly"   id="block" value=""></div>
    <div class="col-sm-4"> Tolerance:<br>
  <input type="text" name="tolerance"  readonly="readonly" id="tolerance" value=""></div>
    <div class="col-sm-4" > Point 1:<br>
  <input type="text" name="point1" id="point1" value=""></div>
    <div class="col-sm-4"> Point 2:<br>
  <input type="text" name="point2" id="point2" value=""></div>
  <div class="col-sm-4"> Point 3:<br>
  <input type="text" name="point3" id="point3" value=""></div>
  <div class="col-sm-4"> Point 4:<br>
  <input type="text" name="point4" id="point4" value=""></div>
 <!--  <div class="col-sm-4"> Maximum Value:<br>
  <input type="text" name="maximum_value" id="maximum_value" value=""></div>  
  <div class="col-sm-4"> Result:<br>  
    <select name='result'  id='result' style="width: 181px">
        <option>Select</option>
         <option>OK</option>
        <option>NG</option>
    </select>
  </div> -->
    
  </div>
</div> 


  </div>
</div> 
</div>
        </div>
         <div class="row">
    
         </div>
    
        <div class="modal-footer">
             <input class="btn btn-primary  button button2" type="button" onclick="submit()" name="save_die" value="Save">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

 <?php echo form_close(); ?>
      </div> 
      </div></div>                                          
</div>

<!-- end die -->




<!-- add punch -->
<div class="modal fade" id="punch" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 123%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">The wear of the mold surface ( Punch ) </h4>
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style=" color:black;background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo    form_open_multipart('Welcome/Inspection_Result_Sheet');?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
     
    <div class="container-fluid">
  <div class="row">
     <input type="hidden" name="hotpressp"   id="hotpressp" value="">
      <input type="hidden" name="moldId"   id="moldp" value="">
    <div class="col-sm-4" > Item:<br>
  <input type="text" name="blockp" readonly="readonly"   id="blockp" value=""></div>
    <div class="col-sm-4"> Tolerance:<br>
  <input type="text" name="tolerancep"  readonly="readonly" id="tolerancep" value=""></div>
    <div class="col-sm-4" > Point 1:<br>
  <input type="text" name="point1p" id="point1p" value=""></div>
    <div class="col-sm-4"> Point 2:<br>
  <input type="text" name="point2p" id="point2p" value=""></div>
  <div class="col-sm-4"> Point 3:<br>
  <input type="text" name="point3p" id="point3p" value=""></div>
  <div class="col-sm-4"> Point 4:<br>
  <input type="text" name="point4p" id="point4p" value=""></div>
   
   <div class="col-sm-4"> Result:<br>  
    <select name='resultp'  id='resultp' style="width: 181px">
        <option>Select</option>
         <option>OK</option>
        <option>NG</option>
    </select>
  </div>  
    
  </div>
</div> 


  </div>
</div> 
</div>
        </div>
         <div class="row">
    
         </div>
    
        <div class="modal-footer">
             <input class="btn btn-primary  button button2" type="button" onclick="submit()" name="save_punch" value="Save">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

 <?php echo form_close(); ?>
      </div> 
      </div></div>                                          
</div>

<!-- end punch -->





<!-- add Mold -->
<div class="modal fade" id="mold" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 123%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Overall Condition of the mold </h4>
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style=" color:black;background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo    form_open_multipart('Welcome/Inspection_Result_Sheet');?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
     
    <div class="container-fluid">
  <div class="row">
     <input type="hidden" name="hotpressm"   id="hotpressm" value="">
          <input type="hidden" name="moldId"   id="moldm" value="">
     <input type="hidden" name="itemm"   id="itemm" value="">
    <div class="col-sm-4" > Part Name:<br>
  <input type="text" name="part" readonly="readonly"   id="part" value=""></div>
    <div class="col-sm-4"> Q'ty :<br>
  <input type="text" name="qty"    id="qty" value=""></div>
    <div class="col-sm-4" >Standard:<br>
  <input type="text" name="standard" id="standard" readonly="readonly"  value=""  ></div>
    <div class="col-sm-4"> Result:<br>
        <select name='resultm'  id='resultm' style="width: 181px"> 
         <option>OK</option>
        <option>NG</option>
    </select>
    </div>
  <div class="col-sm-4"> Remark:<br>
  <input type="text" name="remark" id="remark" maxlength="200" style="    width: 361px;" value=""></div> 
  </div>
</div> 


  </div>
</div> 
</div>
        </div>
         <div class="row">
    
         </div>
    
        <div class="modal-footer">
             <input class="btn btn-primary  button button2" type="button" onclick="submit()" name="save_mold" value="Save">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

 <?php echo form_close(); ?>
      </div> 
      </div></div>                                          
</div>

<!-- end Mold -->









<!-- add row -->
<div class="modal fade" id="moldrow" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 123%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Overall Condition of the mold </h4>
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style=" color:black;background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo    form_open_multipart('Welcome/Inspection_Result_Sheet');?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
     
    <div class="container-fluid">
  <div class="row">
     <input type="hidden" name="mrow"   id="mrow" >
     <input type="hidden" name="itemm"   id="itemm" value="">
    <div class="col-sm-4" > Part Name:<br>
  <input type="text" name="part"  id="part" value=""></div>
    <div class="col-sm-4"> Q'ty :<br>
  <input type="text" name="qty"    id="qty" value=""></div>
    <div class="col-sm-4" >Standard:<br>
  <input type="text" name="standard" id="standard" value=""  ></div>
    <div class="col-sm-4"> Result:<br>
        <select name='resultm'  id='resultm' style="width: 181px"> 
         <option>OK</option>
        <option>NG</option>
    </select>
    </div>
  <div class="col-sm-4"> Remark:<br>
  <input type="text" name="remark" id="remark" maxlength="200" style="    width: 361px;" value=""></div> 
  </div>
</div> 


  </div>
</div> 
</div>
        </div>
         <div class="row">
    
         </div>
    
        <div class="modal-footer">
             <input class="btn btn-primary  button button2" type="button" onclick="submit()" name="save_mold" value="Save">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

 <?php echo form_close(); ?>
      </div> 
      </div></div>                                          
</div>

<!-- end row -->