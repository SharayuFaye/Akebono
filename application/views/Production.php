 


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
    background-color:#04d59b; /* Green */
    border: none;
    color: white;
    padding: 6px 7px 16px 9px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 78px 9px 39px;
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


                        <div class="row">
                            <div class="col" >
                                <section class="card">
                                    <header class="card-header">
                                        <div class="card-actions">
                                            <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                                            <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                                        </div>
                        
                                        <h2 class="card-title" style="color: black;">Production Data Logger</h2>
                                        <!-- <div style="text-align: right;margin: -26px 75px 26px -4px;color: #008000;">Green:Running</div>
                                        <div style="text-align: right;margin: -30px 54px 7px 2px;color: black">Black:Not Running</div> -->
                
 <?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Production'); ?>                                            
  <div class="row"> 
<div class="col-sm-8" style=  margin: 27px 0px -12px 0px;"> Search:<br>  

<input type="date" name="startdate" placeholder="Start date">
<input type="date" name="enddate" placeholder="End date"> 
<select class="chosen1" name="moldid" style="height: 31px;width: 128px;">
        <option value="0">Select Mold</option>   
          <?php foreach($mold_setting as $Temp){?> 
            <option><?php echo $Temp->mold;?></option>
        <?php }?>
</select>  
<select class="chosen2" name="model" style="height: 31px;width: 128px;">
        <option value="0">Select Model</option> 
        <?php foreach($prod_item as $Production){
            if($Production->item!=''){ ?> 
            <option><?php echo $Production->item;?></option>
        <?php } }?>

</select>

<select class="chosen3" name="machine" style="height: 31px;width: 128px;">
        <option  value="0">Select Machine</option> 
        <?php foreach($prod_machine  as $Production){
            if($Production->hot_press!=''){ ?> 
            <option><?php echo $Production->hot_press;?></option>
        <?php } }?>

</select> 


<script type="text/javascript">
      $(".chosen1").chosen();
      $(".chosen2").chosen();
      $(".chosen3").chosen();
</script>



</div>
<div class="col-sm-4" style=  margin: 10px  16px 16px -16px;"> Action:<br> 
<input class="btn btn-primary  button button2" name="searchdisplay" type="submit" value="Search" style="margin: 0 5px 21px 0;" />
<input class="btn btn-primary  button button2" name="removeall" type="submit" value="Remove All" style=" margin: 0 5px 21px 0;" />

 <?php echo form_close(); ?>  </div>    
  
 <style>
table {
  max-width:980px;
  table-layout:fixed;
  margin:auto;
}
th, td {
  padding:5px 10px;
  border:1px solid #000;
}
thead, tfoot {
  background:#f9f9f9;
  display:table;
  width:100%;
  width:calc(100% - 8px);
}
tbody {
  height:600px;
  overflow:auto;
  overflow-x:hidden;
  display:block;
  width:100%;
}
tbody tr {
  display:table; 
  table-layout:fixed;
}
</style>                                    </header>

<div class="card-body">

    <table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
        <thead>
            <tr>
    <th    style="width:8%;text-align: center;background-color: #026AB7;color: white;">Date</th>
    <th  style="width:8%;text-align: center;background-color: #026AB7;color: white;">Time</th>
    <th  style="width:8%;text-align: center;background-color: #026AB7;color: white;">Item</th>
    <th   style="width:8%;text-align: center;background-color: #026AB7;color: white;">Hotpress<br> M/C</th>
    <th  style="width:8%;text-align: center;background-color: #026AB7;color: white;">Mold No.</th>
    <th  style="width:8%;text-align: center;background-color: #026AB7;color: white;">UPPER/<br>MIDDLE/<br>LOWER</th> 

<th  style="width:8%;text-align: center;background-color: #026AB7;color: white;">Pcs.</th>
    <th   style="width:8%;text-align: center;background-color: #026AB7;color: white;">Upper temp <br> &#x2103;</th>
    <th  style="width:8%;text-align: center;background-color: #026AB7;color: white;">Lower temp <br> &#x2103;</th>
</tr>
                
        </thead>
        <tbody><!-- <button id="subm1">Open Modal</button> -->
<?php 
if(isset($Productions)){
$complete = 1;
foreach($Productions as $Production){
$mold_no= 'HP-'.$Production->mold_no;
$cavity = 1 ;
$complete = $Production->COMPLETE;       
foreach($mold_setting as $moldd){  
    if($moldd->mold == $mold_no){ 
       $cavity = $moldd->cavity;  
    }                           
}


// foreach($temp_press as $temp_pres){  
//     if($temp_pres->upper_moldid == $Production->mold_no){ 
//        $complete = $temp_pres->Upper_Cycle_Complete;  
//     }                           
// }

$pcs = $cavity * $complete ;

    ?> 
        <tr style="    width: 100%;">
        <td style="width:12%;"><!-- <?php echo $Production->date;?> --> 
        <?php  
        echo date('d-M-Y', strtotime($Production->date));
        ?> </td>
        <td style="width:12%;" >  <?php  
        echo date('h:i A', strtotime($Production->time));
        ?> </td>
        <td style="width:12%;"><?php echo $Production->item;?> </td>
        <td style="width:12%;"><?php echo $Production->hot_press;?></td>
        <td style="width:12%;"><?php echo $mold_no;?> </td>
        <td style="width:12%;"><?php echo $Production->udl;?> </td> 
        <td  style="width:12%;"><?php echo  $cavity;?></span></td> 
        <td  style="width:12%;"><?php echo $Production->upper_temp;?></span></td> 
        <td  style="width:12%;"><?php echo $Production->lower_temp;?></span></td> 

           </tr>          
        <?php } }?>                                       
        </tbody>
    </table>
                                        

<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

    <div class="modal fade" id="myModal" role="dialog" data-target="#exampleModal">
    <div class="modal-dialog">
       <div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Mold identification system</h4>
        </div>
        <div class="modal-body">
         
        </div>
         <div class="row">
    <div class="col-sm-6"><button class="button">Reset mold current short >> click</button></div>
    <div class="col-sm-6"><button class="button">Reset mold hard chrome short >>click</button></div>
  </div>
   <div class="row">
    <div class="col-sm-6"><button class="button">Inset custom mold physical specific >>click</button></div>
    <div class="col-sm-6"><button class="button">show this mold historical >>click</button></div>
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div></div>
                                <!-- <div style="margin: 5px 0px 0px -23px;">
                                <span class="dot"></span><div style="margin: -23px 0px 0px 51px;">Mold running in machine</div>
                                        <span class="dot1"></span><div style="margin: -23px 0px 0px 51px;">Mold standby</div>
                                        </div> -->
                                    </div>
                                </section>
                                </div>
                        </div>              
                </section>
            </div>      
        </section>

        
        