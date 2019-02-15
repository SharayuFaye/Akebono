 
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


                        <div class="row"  id="row">
                            <div class="col" >
                                <section class="card">
                                    <header class="card-header">
                                        <div class="card-actions">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                                        </div>
                        
                                        <h2 class="card-title" style="color: black;">Mold & Die History Record
                                            <br>(บันทึกประวัติแม่พิมพ์)</h2>
                                <!--         <div style="text-align: right;margin:-20px 75px 26px -4px;">Date : </div>  -->


<?php $this->load->helper('form');?>
<?php echo form_open('Welcome/Mold_Die_History_Record'); ?>                                            
<div class="row"> 
<div class="col-sm-6" style="    margin: 27px 0px -12px 0px;"> Search:<br>
<input type="date" name="startdate"  placeholder="Start date">
<input type="date" name="enddate"  placeholder="End date">
<!-- <input type="text" name="moldid"  placeholder="Enter Mold ID "> -->

<select name="moldId"  class="chosen" style="height: 31px;width: 128px;">
        <option value="0">Select Mold</option> 
        <?php foreach($mold_settingdt as $Temp){?> 
            <option><?php echo $Temp->mold;?></option>
        <?php }?>

</select>

<script type="text/javascript">
      $(".chosen").chosen();
</script>
</div>
<div class="col-sm-6" style="    margin: 14px 1px -5px -34px"> Action:<br> 
<input class="btn btn-primary  button button2" name="searchdisplay" type="submit" value="Search & display"/>
<input class="btn btn-primary  button button2" name="removeall" type="submit" value="Remove All"/>

 <?php echo form_close(); ?>  
</div>

                                    </header> 
    <div class="card-body" style="color: black">


 <table  id="mytable"  border="1px" width="1120px" cellpadding="10px">
<thead>
 <tr>    
  <td>Model Name : <?php if(isset($mold_settingdata[0]->model)){ echo  $mold_settingdata[0]->model; } ?> </td>
  <td>Mold No. :  <?php echo $moldId; ?></td> 
 </tr>
 <tr>    
  <td>Location</td>
  <td>Maker</td> 
 </tr>
</thead>    
 </table> 

<BR>
   

 
<table  id="mytable"  class="table table-responsive-lg table-bordered table-striped table-sm mb-0"  >
<thead>
<tr>
<th  style="text-align: center;background-color: #026AB7;color: white;"  >Drawing Pad</th>
<th style="text-align: center;background-color: #026AB7;color: white;"  >Picture Mold</th> 
</thead>          
<tbody>  
    <td style="height: 200px;    width: 48%;"></td> 
    <td style="padding: 0 0 0 105px;">
         <?php  
         if(isset($mold_settingdata[0]->cavity) && ($mold_settingdata[0]->cavity == '6')){ ?>
    <img src="<?php echo base_url();?>/img/hotpress6.JPG"  id="img6"  width="400px"> 
    <?php } 
     elseif(isset($mold_settingdata[0]->cavity) && ($mold_settingdata[0]->cavity == '4')){ ?>   
    <img src="<?php echo base_url();?>/img/hotpress4.JPG" id="img4" width="400px"> 
     <?php }   ?> 
    </td> 
 </tr> 
</table>  




<BR> 
 
 <script type="text/javascript">
function adddie($date,$mold,$c1,$c2,$c3,$c4){ 
$('#date').val($date);  
$('#mold').val($mold); 
$('#c1').val($c1); 
$('#c2').val($c2); 
$('#c3').val($c3); 
$('#c4').val($c4); 
$('#die').modal('show');  
}
</script>
<table  id="mytable"  class="table table-responsive-lg table-bordered table-striped table-sm mb-0"  >
<thead>
<tr>
<th  style="text-align: center;background-color: #026AB7;color: white;" >วันที่</th>
<th style="text-align: center;background-color: #026AB7;color: white;" >รายละเอียด</th>
<th style="text-align: center;background-color: #026AB7;color: white;">รายละเอียดการซ่อม</th> 
<th  style="text-align: center;background-color: #026AB7;color: white;">ผู้รับผิดชอบ</th>
<th style="text-align: center;background-color: #026AB7;color: white;">หมายเหตุ</th> 
<th style="text-align: center;background-color: #026AB7;color: white;">Action</th> 

</tr> 
</thead>          
<tbody>
<?php  
foreach($status_mold_data as $status_mold){
  if($status_mold->time !=''){
  $query1 = $this->db->query("SELECT * FROM mold_die_history where   mold ='".$this->input->post('moldId')."'  and date ='".$status_mold->time."'  "); 
  $Mold_Die =$query1->result(); 
$c1 ='';$c2='';$c3='';$c4='';
  ?>
<tr>  
    <td><?php echo $status_mold->time;?></td> 
    <td><?php if($Mold_Die){ echo $c1 = $Mold_Die[0]->c1; } ?></td> 
    <td><?php if($Mold_Die){  echo $c2 = $Mold_Die[0]->c2; }?></td> 
    <td><?php if($Mold_Die){  echo $c3 = $Mold_Die[0]->c3; }?></td>  
    <td><?php if($Mold_Die){  echo $c4 = $Mold_Die[0]->c4; }?></td>  
    <td><a    onclick="adddie('<?php echo $status_mold->time;?>','<?php if(isset($moldId)){ echo $moldId; } ?>','<?php echo $c1;?>','<?php echo $c2;?>','<?php echo $c3;?>','<?php echo $c4;?>')"    ><i class="fa fa-pencil"></i></a></td>
 </tr> 
<?php  }
} ?>
</table>  
<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Mold_Die_History_Record'); ?> 

<input class="btn btn-primary  button button2" name="export" type="submit" value="Save XLS"/>
<button onclick="myPrint()" type="button" class="btn btn-primary  button button2">Print</button>
 
  <?php echo form_close(); ?> 




  <script type="text/javascript">
function myPrint() { 
    document.getElementById("row").style.paddingLeft = "300px"; 
    $('.header').hide(); 
    window.print();
    $('.header').show(); 
    document.getElementById("row").style.paddingLeft = "0px";
}
 </script> 

<h5>
  <div  >หมายเหตุ :  เมื่อมีการซ่อมแก้ไข ดัดแปลง เปลี่ยนชิ้นส่วนแม่พิมพ์ให้ลงบันทึกรายละเอียดทุกครั้ง </div> </h5>
<h5>
  <div  style="float: left;" >Form Number : FR-MN-012</div>
<div style="float: left;padding: 0 276px">Akebono Brake ( Thailand ) Co.,Ltd</div>
<div style="float: left;padding: 0 20px 0  10px;">Revision 00(January 5,2012)</div></h5>

<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Machinecontrol'); ?>   

 <input type="hidden" name="moldId_die" value="<?php if(isset($moldId)){ echo $moldId; } ?>">
<input style="margin:-12% 0 0 94%;" type="submit" name="Next" value="Next" class="btn btn-primary  button button2"> 

 <?php echo form_close(); ?>  

                                    </div>
                                </section>
                                </div>
                        </div>              
                </section>
            </div>      
        </section>

        
        






<!-- add die -->
<div class="modal fade" id="die" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 123%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Mold & Die History Record </h4>
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style=" color:black;background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo form_open_multipart('Welcome/Mold_Die_History_Record');?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
     
    <div class="container-fluid">
  <div class="row"> 
      <input type="hidden" name="moldId"   id="mold" value="">
    <div class="col-sm-4" > Date:<br>
  <input type="text" name="date" readonly="readonly"   id="date" value=""></div>
    <div class="col-sm-4"> รายละเอียด   :<br>
  <input type="text" name="c1"   id="c1" value=""></div>
    <div class="col-sm-4" > รายละเอียดการซ่อม:<br>
  <input type="text" name="c2" id="c2" value=""></div>
    <div class="col-sm-4"> ผู้รับผิดชอบ:<br>
  <input type="text" name="c3" id="c3" value=""></div>
  <div class="col-sm-4"> หมายเหตุ:<br>
  <input type="text" name="c4" id="c4" value=""></div>  
    
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

