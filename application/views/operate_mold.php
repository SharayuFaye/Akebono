 
 
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
						 <h4  style="margin-right: 263px;color:black">Mold Identification System</h4>
       
										 
									</header>

									<div class="card-body">
	 

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
         $('#myModal').modal('show');
    }); 


// $('#mold_id').click(function(){ 
//     $('#model-id').html('KV488'); 
//     $('#shot_current').html('6000'); 
//     $('#Maximum').html('6000'); 
//     $('#hard_current').html('3000');   
//     $('#wash_date').html('2018-02-12');   
//     $('#chrome_date').html('2018-02-12');   
//     $('#change_date').html('2018-02-12');   
// });
});
</script>
	 
            
 	<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
	<thead> <tr> <p> Current Mold Data</p>		 	</thead>
	<tbody>
	<tr> <td width="400px">Mold Id:</td> 
		<td> 
		<!-- <input type="text" name="moldid" id="moldid" placeholder="Mold Id" > -->
<?php $this->load->helper('form');?>
<?php echo    form_open_multipart('Welcome/operate_mold');?>  
 
<select name="mold_id"  class="chosen"  onchange="submit()" >
	<option>Mold ID</option> 
	
		<?php		foreach($mold_setting as $mold_set){ ?>
	<option  
	<?php  if(isset($mold_setting_data[0]->mold)){ if($mold_setting_data[0]->mold == $mold_set->mold ) { echo "selected"; } }?> 
	value="<?php echo $mold_set->mold ;?>"><?php echo $mold_set->mold ;  ?></option>
<?php }?> 
   </select>
   <?php echo form_close(); ?>

<script type="text/javascript">
      $(".chosen").chosen();
</script>	

<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Inspection_Result_Sheet'); ?>

</div> </td> </tr>	


<input type="hidden" name="moldId" id="moldId"  value="<?php if(isset($mold_setting_data[0]->mold)){ echo $mold_setting_data[0]->mold; } ?>">

<?php 
if(isset($mold_setting_data[0]->mold)){ 
foreach($production as $product){ 
		$m = 'HP-'. $product->mold_no ;
		if($m == $mold_setting_data[0]->mold){
			$current = $product->COMPLETE;   
		}                   		
	}  
foreach($status_history_data as $status_history){  
		if($status_history->mold == $mold_setting_data[0]->mold){
			$wash_date = $status_history->date; 

			if($status_history->current_shot == '0'){
				$Hard_date = $status_history->date; 
			}

			if($status_history->hard_chrome_shot == '0'){
				$block_date = $status_history->date; 
			}		
		}                   		
	}  
}




?>
	<tr> <td>Model Name:</td> <td> <div  id='model-id'>
		<?php if(isset($mold_setting_data[0]->model)){ echo $mold_setting_data[0]->model; } ?>
	</div> </td> </tr>	
	<tr> <td>Current shots:</td> <td><div  id='shot_current'>
		<?php if(isset($shot_current_count)){ echo $shot_current_count; } ?>
	</div></td></tr>
	<tr><td>Hard chrome shots:</td><td><div id='hard_current'>
		<?php if(isset($hard_current_count)){ echo $hard_current_count; } ?>
	</div></td></tr>
	<tr><td>Die Change shots:</td><td><div  id='Maximum'> 
		<?php if(isset($change_current_count)){ echo $change_current_count; } ?>
	</div></td></tr>	
		
	<tr><td>Last Wash date:</td><td><div  id='wash_date'> 
		<?php if(isset($wash_date)){ echo $wash_date; } ?>
	</div></td></tr>	
	<tr><td>Last Hard chrome date:</td><td><div  id='chrome_date'> 
	    <?php if(isset($Hard_date)){ echo $Hard_date; } ?>
	</tr>	
	<tr><td>Last block change date :</td><td><div  id='change_date'> 
		<?php if(isset($block_date)){ echo $block_date; } ?>
	</div></td>
	</tr>												
			</tbody>
		</table>
        <br><br><br>
         <div class="row">
<input type="hidden" name="model" id="model_id" value="<?php if(isset($mold_setting_data[0]->model)){ echo $mold_setting_data[0]->model; } ?>">
<input type="hidden" name="shot_current" id="shot_id" value="<?php if(isset($current)){ echo $current; } ?>"  >
<input type="hidden" name="hard_chrome" id="hard_id" value="<?php if(isset($current)){ echo $current; } ?>"  >
    	<input type="hidden" name="Maximum" id="hard_id" value="<?php if(isset($current)){ echo $current; } ?>"  >

    <div class="col-sm-6"> <input type="submit" name="currentshots" class="btn btn-primary button_wel" value="Clean Switch"  <?php if(!isset($mold_setting_data[0]->model)){ echo 'disabled="disabled"'; } ?> > </div>
    <div class="col-sm-6"><input type="submit" class="btn btn-primary button_wel" name="hardchromeshots" value="Hard Chrome"   <?php if(!isset($mold_setting_data[0]->model)){ echo 'disabled="disabled"'; } ?>  ></div>
  </div>
  <br>
   <div class="row">
    <div class="col-sm-6"><input type="submit" class="btn btn-primary button_wel" name="diechange" value="Die Change Switch"   <?php if(!isset($mold_setting_data[0]->model)){ echo 'disabled="disabled"'; } ?>  ></div>
 <?php echo form_close(); ?>
    
    <?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Statushistory'); ?>
   <input type="hidden" name="moldId_operate" id="moldId_operate"  value="<?php if(isset($mold_setting_data[0]->mold)){ echo $mold_setting_data[0]->mold; } ?>">
    <div class="col-sm-6"><input type="submit" class="btn btn-primary button_wel"  value="History of Mold"   <?php if(!isset($mold_setting_data[0]->model)){ echo 'disabled="disabled"'; } ?> ></div>
  </div>
      <!--   <div class="modal-footer">

        	<input type="submit" class="btn btn-primary " name="save" value="Save">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->


        <?php echo form_close(); ?>


      </div>
      
    </div></div>
								<div style="margin: 5px 0px 0px -23px;">
								 	</div>
									</div>
								</section>
								</div>
						</div>				
				</section>
			</div>		
		</section>

		
		