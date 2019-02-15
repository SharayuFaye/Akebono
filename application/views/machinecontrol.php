	 <style type="text/css">
 	.button {
 		margin: 0px !important;
 	}	
 </style>
			<div class="inner-wrapper">
				

				<section role="main" class="content-body">
					<header class="page-header">
						<!-- <h2>Charts</h2> -->
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>UI Elements</span></li>
								<li><span>Charts</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
	<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
								<h2 class="card-title" style="color: black;">Maintenance Control Mold</h2>
						 
							</header>
							<div class="card-body">

<?php $this->load->helper('form');?>
<?php echo form_open('Welcome/Machinecontrol'); ?> 											
<div class="row"> 
<div class="col-sm-6" style="    margin:-12px  16px -12px -16px;"> Search:<br>
<!-- <input type="date" name="startdate"  placeholder="Start date">
<input type="date" name="enddate"  placeholder="End date">  -->
<select name="moldid" class="chosen" style="height: 31px;width: 128px;">
        <option value="0">Select Mold</option> 
         <?php foreach($mold_settingdata as $mold_setting){  ?> 
            <option><?php echo $mold_setting->mold;?></option>
        <?php }  ?>

</select> 
</div>
<div class="col-sm-6" style="    margin:-46px  12px 11px 142px;"> Action:<br> 
<input class="btn btn-primary  button button2" name="searchdisplay" type="submit" value="Search & display"/>
<input class="btn btn-primary  button button2" name="removeall" type="submit" value="Remove All"/>
<script type="text/javascript">
      $(".chosen").chosen();
</script>
 <?php echo form_close(); ?>  </div>
							

								<!-- <table class="table table-bordered table-striped" id="datatable-ajax" data-url="ajax/ajax-datatables-sample.json"> -->
									<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
									<thead>
                                       <tr>
										<th colspan="4" style="text-align: center;background-color: #026AB7;
    color: white;">Maintenance Control Mold</th>
    </tr>
										<tr>
											<th width="20%">Mold Name:</th>
											<th width="25%">Mold No.</th>
											<th width="25%">Model</th>
											<th width="15%">Characteristic</th>
										</tr>
									</thead>
									<tbody>
                                                <?php if(isset($tables)){ 
                                                	foreach($tables as $table){ ?>  
												<tr>
													<td> <?php echo $table->mold;?> </td>
													<td> <?php echo $table->model;?> </td>
													<td> <?php echo $table->mold_setting_id;?> </td>
													<td>   </td>
													
												 	<?php }
												 }?>   
												</tr>
											</tbody>
								</table>
							</div>
						</section>
					<!-- start: page -->
					<div class="chartsimple" style=" margin: 10px 0px 0px -290px;">
										<!-- <h2 class="card-title">Maintenance control mold</h2> -->
									</header>
									<div class="card-body">
										<!-- <div id="ChartistSimpleLineChart" class="ct-chart ct-perfect-fourth ct-golden-section" style="background-color: yellow;border: 1px solid;"></div>
						
										<!-- See: js/examples/examples.charts.js for the example code. -->
									<!-- </div>  -->

 
<!--  <?php 
 $test = array();
$odi = array();
$t20 = array(); 
foreach($mold_setting  as $row){  
	array_push($test, array( "y"=>'2' , "label"=>  $row->qua_att )); 
}   
foreach($mold_setting  as $mold_setting2){  
    array_push($odi, array( "y"=>'5' , "label"=> $mold_setting2->req_chorm ));
}   
foreach($mold_setting  as $mold_setting3){  
    array_push($t20, array("y"=>'7', "label"=> $mold_setting3->die_change));
}   
?> -->  
<!DOCTYPE HTML> 
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	   
	data: [{
		type: "stepLine",
		color: "red",
		showInLegend: true,
		name: "Quality Attract",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	},{
		type: "stepLine",
		color: "green",
		showInLegend: true,
		name: "Request Hard Chrome",
		dataPoints: <?php echo json_encode($odi, JSON_NUMERIC_CHECK); ?>
	},{
		type: "stepLine",
		color: "red",
		showInLegend: true,
		name: "Die Change", 
		dataPoints: <?php echo json_encode($t20, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div   id="chartContainer" style="height: 370px; width: 100%;"></div>
<?php if(isset($tables)){  ?>
<script src="<?php echo base_url(); ?>js/canvas.js"></script>
<?php }?>
</body>
</html>               
<div style="margin-left: 71px;">
<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Machinecontrol'); ?>      

   <input type="hidden" name="model" value="<?php echo $model;?>" >



  <input class="btn btn-primary  button button2" name="export" type="submit" value="Save XLS"/>

 <!--  <input class="btn btn-primary  button button2" name="hardchromeshots" type="submit" value="Hard Chrom Switch & Save"/>
  
  <input class="btn btn-primary  button button2" name="diechange" type="submit" value="Die Change & Save"/> -->

 <?php echo form_close(); ?>

</div>



									</div>
								</section>
							</div>
							
						</div>
						
					<!-- end: page -->
				</section>
			</div>
		</section>
 

 