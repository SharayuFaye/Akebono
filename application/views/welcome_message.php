<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


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
.button_wel {
    background-color: #04d59b;
    border: none;
    color: white;
    /* padding: 6px 7px 16px 9px; */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 78px 9px 39px;
    cursor: pointer;
    width: 288px;
    height: 55px;
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
						
										<h2 class="card-title" style="color:black;">Status Mold Display</h2>
										<div style="text-align: right;margin: -26px 75px 26px -4px;color: #008000;">Green:Running</div>
										<div style="text-align: right;margin: -30px 54px 7px 2px;color: black">Black:Not Running</div>
									</header>
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
  height:570px;
  overflow:auto;
  overflow-x:hidden;
  display:block;
  width:100%;
}
tbody tr {
  display:table;
  width:100%;
  table-layout:fixed;
}
</style>


									<div class="card-body">
	<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
		<thead>
			<tr>
		<th colspan="8" style="width:8%;text-align: center;background-color: #026AB7;color: white;">Mold ID Status Display</th>
		<th rowspan="3" style="width:8%;text-align: center;background-color: #026AB7;color: white;">Status Running</th>
		<th rowspan="3" style="width:8%;text-align: center;background-color: #026AB7;color: white;">M/C</th>
	</tr>
     <tr> 
		<th rowspan="2" style="width:8%;text-align: center;background-color: #026AB7;color: white;">Mold/setting</th>
		<th rowspan="2" style="width:8%;text-align: center;background-color: #026AB7;color: white;">Model</th>
		<th colspan="2" style="width:8%;text-align: center;background-color: #026AB7;color: white;">Shot Counter</th>
		<th colspan="2" style="width:8%;text-align: center;background-color: #026AB7;color: white;">Hard Chrome</th>
		<th colspan="2" style="width:8%;text-align: center;background-color: #026AB7;color: white;">Die Change </th>
	</tr>
	<tr> 
		<th style="width:8%;text-align: center;background-color: #026AB7;color: white;" >Current</th>
		<th style="width:8%;text-align: center;background-color: #026AB7;color: white;" >Setting</th>
		<th style="width:8%;text-align: center;background-color: #026AB7;color: white;">Current</th>	
		<th style="width:8%;text-align: center;background-color: #026AB7;color: white;">Setting</th>
		<th style="width:8%;text-align: center;background-color: #026AB7;color: white;">Current</th>
		<th style="width:8%;text-align: center;background-color: #026AB7;color: white;">Setting</th>
			</tr>
													
											</thead>
											<tbody><!-- <button id="subm1">Open Modal</button> -->
                   <?php
				   $status_running = 0;
				  
		$machine_running= 0;
		$clean_set = 0; 
		$hard_chrom_set = 0;$shot_current_count=0;$hard_current_count=0;$change_current_count=0;
		$die_change_set = 0;
		$model ='';
	foreach($mold_setting as $mold_setting_data){ 
 $mold_count =  str_replace('HP-','',$mold_setting_data->mold) ; 
$shot_current = $this->db->query("SELECT mold FROM status_mold where  mold_setting_id = '".$mold_count."' and shot_current = '1'  "); 
$shot_current_count = $shot_current->num_rows() ;	
//print_r("SELECT mold FROM status_mold where  mold = '".$mold_count."' and shot_current = '1' ");
// print_r($shot_current_count);


$hard_current = $this->db->query("SELECT mold FROM status_mold where  mold_setting_id = '".$mold_count."' and hard_current = '1'  "); 
$hard_current_count = $hard_current->num_rows() ;	
// print_r($hard_current_count);


$change_current = $this->db->query("SELECT mold FROM status_mold where  mold_setting_id = '".$mold_count."' and change_current = '1'  "); 
$change_current_count = $change_current->num_rows() ;	
// print_r($change_current_count);



	 $current = 0;	 $status_running = 0;$m_c ='';
				foreach($status_mold as $status_mold_data){
 					 
	
	  		 
	  			 
					 $mymold = 'HP-'.$status_mold_data->mold_setting_id ; 
					if($mymold == $mold_setting_data->mold  ){
						$change_setting = $status_mold_data->change_setting;  
						$hard_setting = $status_mold_data->hard_setting;    
						$shot_setting = $status_mold_data->shot_setting;  
						$status_running = $status_mold_data->status_running; 
						$m_c = $status_mold_data->m_c ; 
                       
                   	} 
        //                	foreach($countdata as $count){ 
        //                		$m = 'HP-'. $count->upper_moldid ;
        //                		if($m == $mymold){
        //                		$current = $count->Upper_Cycle_Complete; 
        //                		$status_running = $count->machine_running;  
 							// }                      		
 						// }    
				}
				 
				foreach($production as $product){ 
	           		$m = 'HP-'. $product->mold_no ;
	           		if($m == $mold_setting_data->mold){
	           			$current = $product->COMPLETE;   
					}                   		
				}     
		$clean_set = $mold_setting_data->clean_set; 
		$hard_chrom_set = $mold_setting_data->hard_chrom_set;
		$die_change_set = $mold_setting_data->die_change_set; 
		$model = $mold_setting_data->model;  
?>  		<tr data-toggle="modal" >         
<td style="width:8%;" > <?php echo $mold_setting_data->mold ;?></td>
<td style="width:8%;" ><?php echo $model;?></a></td>

<td  <?php  if($shot_current_count > $clean_set){ ?> style="color:red;width:8%;" <?php } else { ?> style="width:8%;" <?php } ?> 
><?php echo $shot_current_count;?></td>

<td style="width:8%;"  ><?php echo $clean_set;?></td>

<td  <?php  if($hard_current_count > $hard_chrom_set){ ?> style="color:red;width:8%;" <?php } else { ?> style="width:8%;" <?php } ?> 
><?php echo $hard_current_count;?></td>

<td style="width:8%;"  ><?php echo $hard_chrom_set;?></td>

<td <?php  if($change_current_count > $die_change_set){ ?> style="color:red;width:8%;" <?php } else { ?> style="width:8%;" <?php } ?>   
><?php echo $change_current_count;?></td>


<td style="width:8%;"  ><?php echo $die_change_set;?></td>

<td style="width:8%;"  ><?php if ($status_running == 1){	echo'<span class="dot"></span>';
}else{ echo'
<span class="dot1"></span>';
}?></td>
<td style="width:8%;"  ><?php if ($status_running == 1){ echo $m_c; } else { echo ""; }?></span></td> 
<?php }
?> 
						</a>	</tr>												
											</tbody>
										</table>

<script type="text/javascript">
	$(document).ready(function () {    
	$('#pageload').click(function(){	
		// alert(document.getElementById("modelId").value);
	window.location = "Machinecontrol?model="+document.getElementById("modelId").value;
	});

    $('.open-my-modal').click(function(){
        $('#moldid').val($(this).data('id'));
        $('#model-id').html($(this).data('model-id')); 
        $('#modelId').val($(this).data('model-id'));
        $('#shot_current').html($(this).data('shot_current'));
        $('#hard_current').html($(this).data('hard_current')); 
        $('#shot_id').val($(this).data('shot_current')); 
        $('#hard_id').val($(this).data('hard_current'));
        $('#model_id').val($(this).data('model-id'));
        $('#modelData').val($(this).data('model-id'));
        $('#mold_setting').val($(this).data('id'));

         $('#myModal').modal('show');
    });
});
</script>

	<div class="modal fade" id="myModal" role="dialog" data-target="#exampleModal">
    <div class="modal-dialog">
       <div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Mold Identification System</h4>
        </div>
<div class="modal-body">
	<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Machinecontrol'); ?>   
 	<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
	<thead> <tr> <p> Current Mold Data</p>		 	</thead>
	<tbody>
	<tr> <td>Mold Id:</td> 	<td> 
		<input type="text" name="moldid" id="moldid" placeholder="Mold Id" >

	<input type="hidden" name="modelId" id="modelId"  >

</div> </td> </tr>	
	<tr> <td>Model Name:</td> <td> <div  id='model-id'></div> </td> </tr>	
	<tr> <td>Current shots:</td> <td><div  id='shot_current'></div></td></tr>
	<tr><td>Maximum shots:</td><td><div  id='Maximum'></div></td></tr>	
	<tr><td>Hard chrome shots:</td><td><div id='hard_current'></div></td></tr>	
	<tr><td>Last Wash date:</td><td><?php echo date('Y/m/d');?><div  id='prod-id'></div></td></tr>	
	<tr><td>Last Hard chrome date:</td><td><?php echo date('Y/m/d');?><div  id='prod-id'></div></td>
	</tr>	
	<tr><td>Last block change date :</td><td><?php echo date('Y/m/d');?><div  id='prod-id'></div></td>
	</tr>												
			</tbody>
		</table>
        </div>
           
         <div class="row">
    	<input type="hidden" name="model" id="model_id" >
    	<input type="hidden" name="shot_current" id="shot_id" >
    	<input type="hidden" name="hard_chrome" id="hard_id" >

    <div class="col-sm-6"> <input type="button" name="Currentshots" class="btn btn-primary button_wel" value="Clean Switch"  id="pageload" > </div>
    <div class="col-sm-6"><input type="submit" class="btn btn-primary button_wel" name="Hardchromeshots" value="Hard Chrome"></div>
  </div>
   <div class="row">
    <div class="col-sm-6"><input type="submit" class="btn btn-primary button_wel" name="Diechange" value="Die Change Switch"></div>

    
    <div class="col-sm-6"><input type="submit" class="btn btn-primary button_wel"  value="History of Mold"></div>
  </div>
    
        <div class="modal-footer">
        	<input type="hidden" name="modelData" id="modelData" > 
        	<input type="submit" class="btn btn-primary " name="save" value="Save">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

<?php echo form_close(); ?>
      


      </div>
      
    </div></div>
								<div style="margin: 5px 0px 0px -23px;">
								<span class="dot"></span><div style="margin: -23px 0px 0px 51px;">Mold running in machine</div>
										<span class="dot1"></span><div style="margin: -23px 0px 0px 51px;">Mold standby</div>
										</div>
									</div>
								</section>
								</div>
						</div>				
				</section>
			</div>		
		</section>

		
		