 
<script type="text/javascript">
	
	$(function() {
    var header_height = 0;
    $('table tr .ht th .vertical-text').each(function() {
        if ($(this).outerWidth() > header_height) header_height = $(this).outerWidth();
    });

    $('table tr .ht  th ').height(header_height);
});
</script>

<style>
  tr .ht th{
	color:black;
}
table, tr, td, th { 
  position: relative; 
   
} 

th  .vertical-text {
  transform-origin: 0 50%;
  transform: rotate(-90deg); 
  white-space: nowrap; 
  display: block;
  position: absolute;
  bottom: 0;
  left: 50%;
}
.vertical-text {
	 transform-origin: 0 50%;
  transform: rotate(-90deg); 
  white-space: nowrap; 
  display: block;
  position: absolute;
  bottom: 0;
  left: 50%;
}


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
    padding:7px 18px 9px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 78px 9px 0px;
    cursor: pointer;
    
}
</style>
			<div class="inner-wrapper">
				
				<section role="main" class="content-body">
					<header class="page-header" style="background-color: #e60018;">
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
						
										<h2 class="card-title" style="color: black;">Temperature & Pressure</h2>
									<!-- 	<div style="text-align: right;margin: -26px 75px 26px -4px;color: #008000;">Green:Running</div>
										<div style="text-align: right;margin: -30px 54px 7px 2px;color: black">Black:Not Running</div> -->
<?php $this->load->helper('form');?>
<?php echo form_open('Welcome/Temp'); ?> 											
<div class="row"> 
<div class="col-sm-6" style="margin: 27px 16px 1px 3px;"> Search:<br>
<input type="date" name="startdate"  placeholder="Start date">
<input type="date" name="enddate"  placeholder="End date">
<!-- <input type="text" name="moldid"  placeholder="Enter Mold ID "> -->

<select  class="chosen1"  name="moldid" style="height: 31px;width: 128px;">
        <option value="0">Select Mold</option>  
        <?php foreach($mold_setting as $Temp){?> 
            <option><?php echo $Temp->mold;?></option>
        <?php }?>

</select>



<select  class="chosen2"  name="hotpress" style="height: 31px;width: 118px;">
        <option value="0">Select Hotpress</option> 
        <?php foreach($Tempsmold as $Temp){ 
        	if($Temp->MACHINE_NAME !=''){ ?> 
            <option><?php echo $Temp->MACHINE_NAME;?></option>
        <?php } } ?>

</select>



<script type="text/javascript">
      $(".chosen1").chosen();
      $(".chosen2").chosen();
</script>




</div>
<div class="col-sm-6" style="    margin: -62px 0 0px 725px;"> Action:<br> 
<input class="btn btn-primary  button button2" name="searchdisplay" type="submit" value="Search & display"/>
<input class="btn btn-primary  button button2" name="removeall" type="submit" value="Remove All"/>

 <?php echo form_close(); ?>  

									</header>

									<div class="card-body">
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
  height:800px;
  overflow:auto;
  overflow-x:hidden;
  display:block;
  width:100%;
}
tbody tr {
  display:table; 
  table-layout:fixed;
}
</style> 

<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
<thead>
<!-- <tr>
<th colspan="18" style="background-color: #026AB7;color: white;">Hotpress:1</th>
</tr> -->
<tr class="ht"> 
<th     style="width:8%;text-align: center;background-color: #026AB7; color: white;"> </th>
<th     style="width:8%;text-align: center;background-color: #026AB7; color: white;"> </th>
<th  style="width:8%;text-align: center;background-color: #026AB7; color: white;"> </th> 
<th colspan="2" style="width:8%;text-align: center;background-color: #026AB7; color: white;">Upper</th>
<th  style="width:8%;text-align: center;background-color: #026AB7; color: white;">Upper <br>Mold ID</th>
<th colspan="2" style="width:8%;text-align: center;background-color: #026AB7; color: white;">Middle</th>
<th  style="width:8%;text-align: center;background-color: #026AB7; color: white;">Middle <br> Mold ID</th>
<th colspan="2" style="width:8%;text-align: center;background-color: #026AB7; color: white;">Lower</th>
<th  style="width:8%;text-align: center;background-color: #026AB7; color: white;">Lower <br> Mold ID</th>
<th  style="width:8%;text-align: center;background-color: #026AB7; color: white;"> </th>
</tr>
<tr style="    height: 160px;"> 
<th style="width:8%;"  rowspan="2"  style="text-align: center;background-color: #026AB7; color: white;">Date & Time  
 <br>
 <div>
<?php $this->load->helper('form');?>
<?php echo    form_open_multipart('Welcome/Temp1');?> 
<img src="<?php echo base_url(); ?>img/up-arrow.png"  name="up"   width="10px" onclick="submit()" style="margin: -22px 0 19px 131px;">
<?php echo form_close(); ?>	

<?php $this->load->helper('form');?>
<?php echo    form_open_multipart('Welcome/Temp');?> 
<img src="<?php echo base_url(); ?>img/angle-arrow-down.png"  name="down"  width="10px" onclick="submit()" style="margin:-84px 0 0 149px;">
<?php echo form_close(); ?>	
</div>

<input type="hidden" name="count" value="<?php if(isset($count)) { echo $count ; }else { echo 0 ; } ?>" >
</th>
<th style="width:8%;"  rowspan="2"  style="text-align: center;background-color: #026AB7; color: white;">Hotpress</th>
<th style="width:8%;"  rowspan="2"  style="text-align: center;background-color: #026AB7; color: white;"><span class="vertical-text">Item</span></th>
<th style="width:8%;"  style="text-align: center;background-color: #026AB7; color: white;"><span class="vertical-text">Upper Upper temp &#x2103;</span></th>
<th style="width:8%;" style="text-align: center;background-color: #026AB7; color: white;"><span class="vertical-text">Upper Lower temp &#x2103;</span></th>
<th style="width:8%;"  style="text-align: center;background-color: #026AB7; color: white;"></th>
<th style="width:8%;" style="text-align: center;background-color: #026AB7; color: white;"><span class="vertical-text">Middle Upper temp &#x2103;</span></th>
<th style="width:8%;" style="text-align: center;background-color: #026AB7; color: white;"><span class="vertical-text">Middle Lower temp &#x2103;</span></th>
<th style="width:8%;"  style="text-align: center;background-color: #026AB7; color: white;"></th>
<th style="width:8%;" style="text-align: center;background-color: #026AB7; color: white;"><span class="vertical-text">Lower Upper temp &#x2103;</span></th>
<th style="width:8%;" style="text-align: center;background-color: #026AB7; color: white;"><span class="vertical-text">Lower Lower temp &#x2103;</span></th> 
<th style="width:8%;"  style="text-align: center;background-color: #026AB7; color: white;"></th>
<th style="width:8%;" style="text-align: center;background-color: #026AB7; color: white;">Pressure</th>
</tr>

</thead>
<tbody><!-- <button id="subm1">Open Modal</button> -->
<?php if(isset($Temps)){
  foreach($Temps as $Temp){?> 
<tr>
<td style="width:15%;"><?php echo $Temp->hotpress_time;?></td>
<td  style="width:7%;"><?php echo $Temp->MACHINE_NAME;?></td>
<td  style="width:8%;"> <?php echo $Temp->barcode;?></td>
<td style="width:8%;"><?php echo $Temp->upper_upper_temp;?></a></td>
<td style="width:8%;"><?php echo $Temp->upper_lower_temp;?></td>
<td  style="width:8%;"><?php if($Temp->upper_moldid!=''){ echo "HP-";  echo $Temp->upper_moldid; } ?> </td>
<td style="width:8%;"><?php echo $Temp->middle_upper_temp;?></td>
<td style="width:8%;" ><?php echo $Temp->middle_lower_temp;?></td>
<td  style="width:8%;"><?php if($Temp->middle_moldid!=''){ echo "HP-";  echo $Temp->middle_moldid; } ?> </td>
<td style="width:8%;" ><?php echo $Temp->lower_upper_temp;?></td>
<td style="width:8%;"><?php echo $Temp->lower_lower_temp;?></td>
<td style="width:8%;" > <?php if($Temp->lower_moldid!=''){ echo "HP-";  echo $Temp->lower_moldid; }?></td>
<td style="width:8%;" ><?php echo $Temp->pressure;?></td> 

</a>	</tr>			
<?php }
}?>									
</tbody>
</table>					

							
								
								
<?php $this->load->helper('form');?>
<?php echo form_open('Welcome/Temp'); ?> 											
<div class="row"> 
<div class="col-sm-6" style="    margin: 27px 16px -12px -16px;"> Search:<br>
 

<select name="moldid" style="height: 31px;width: 128px;">
        <option value="0">Select Start Time</option>
        <option>0</option> 
        <option>1</option> 
        <option>2</option> 
        <option>3</option> 
        <option>4</option> 
        <option>5</option> 
        <option>6</option> 
        <option>7</option> 
        <option>8</option> 
        <option>9</option> 
        <option>10</option> 
        <option>11</option> 
        <option>12</option>  
</select>
<select name="moldid" style="height: 31px;width: 128px;">
        <option value="0">Select End Time</option>
        <option>0</option> 
        <option>1</option> 
        <option>2</option> 
        <option>3</option> 
        <option>4</option> 
        <option>5</option> 
        <option>6</option> 
        <option>7</option> 
        <option>8</option> 
        <option>9</option> 
        <option>10</option> 
        <option>11</option> 
        <option>12</option>  
</select>
</select>

<select name="hotpress" style="height: 31px;width: 118px;">
        <option value="0">Select Hotpress</option>
        <option>All</option>
        <?php foreach($Tempsmold as $Temp){ 
        	if($Temp->MACHINE_NAME !=''){ ?> 
            <option><?php echo $Temp->MACHINE_NAME;?></option>
        <?php } } ?>

</select>

<input class="btn btn-primary  button button2" name="display" type="submit" value="Display"/>
</div>
  </div>

 <?php echo form_close(); ?>  

<div class="card-body">


<?php
// print_r($timedata);						
 
// $dataPoints = array( 
// 	array("x" => 1514485800000, "y" =>22),
// 	array("x" => 1514399400000, "y" => 33) 
// )
 $dataPoints = array();
$dataPointsupper_lower = array();
$dataPointsmiddle_upper = array();
$dataPointsmiddle_lower = array();
$dataPointslower_upper = array();
$dataPointslower_lower = array();
 
    foreach($timedata  as $row){ 
array_push($dataPoints, array( "x"=>$row->time , "y"=>  $row->upper_upper_temp )); 
    }  
    foreach($upper_lower  as $row){  
        array_push($dataPointsupper_lower, array( "x"=> $row->time , "y"=> $row->upper_lower_temp ));
    }   
    foreach($middle_upper  as $row){  
        array_push($dataPointsmiddle_upper, array("y"=> $row->middle_upper_temp , "x"=> $row->time));
    }  
    foreach($middle_lower  as $row){  
        array_push($dataPointsmiddle_lower, array("y"=> $row->middle_lower_temp , "x"=> $row->time));
    }  
    foreach($lower_upper  as $row){  
        array_push($dataPointslower_upper, array("y"=> $row->lower_upper_temp , "x"=> $row->time));
    }  
    foreach($lower_lower  as $row){  
        array_push($dataPointslower_lower, array("y"=> $row->lower_lower_temp , "x"=> $row->time));
    }  
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text:"Temperature & Pressure Graph"
	}, 


	axisX:{
			valueFormatString: "####",
			interval: 1
		},
		axisY:[ 
		{
			title: "Temperature",
			logarithmic: true,
			lineColor: "#C24642",
			titleFontColor: "#C24642",
			labelFontColor: "#C24642"
		}],
		axisY2:[ 
		{
			title: "Pressure",
			logarithmic: true,
			interval: 1,
			lineColor: "#86B402",
			titleFontColor: "#86B402",
			labelFontColor: "#86B402"
		}],

	data: [
	 
	{
		type: "spline",
		showInLegend: true,
		axisYIndex: 1, //Defaults to Zero
		name: "Pressure",
		xValueFormatString: "####",
		// dataPoints: [
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
 
		
	} ,
	{
		type: "spline",
		showInLegend: true,                  	
		axisYType: "secondary",
		axisYIndex: 1, //When axisYType is secondary, axisYIndex indexes to secondary Y axis & not to primary Y axis
		name: "Temperature",
		xValueFormatString: "####",
		// dataPoints: 
		dataPoints: <?php echo json_encode($dataPointsupper_lower, JSON_NUMERIC_CHECK); ?>
		 
	}
	]
	});
 
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                              





<!-- <button onclick="myFunction()" class="button button2">Add</button> -->
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
<div id="myDIV" style="display: none;background: #f6f6f6;">
                      <?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Moldsetting'); ?> 
                     <tr>
 

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4" > Model:<br>
  <input type="text" name="model" value=""></div>
    <div class="col-sm-4"> Mold:<br>
  <input type="text" name="mold" value=""></div><!-- 
   
   <button class="button button2" name="save" type="submit" style="margin: 2px 78px 9px 14px;">Save</button>
  </div>
</div> 
                                        </tr>
                                       <!--  <button class="button button2" name="save" type="submit" >Save</button> -->
               <!--  </table> -->
                <?php echo form_close(); ?>

            </div>
	<div class="modal fade" id="myModal" role="dialog" data-target="#exampleModal">
    <div class="modal-dialog">
       <div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Mold identification system</h4>
        </div>
        <div class="modal-body">
         	<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
											<thead>
												<tr>
													<p> Current Mold Data</p>		
											</thead>
											<tbody>
											<tr>
													<td>Mold Name:</td>
													<td>
														<div  id='prod-id'></div>
													</td>
										</tr>	
											<tr>
													<td>Mold id:</td>
													
													<td><!-- <?php foreach($posts as $post){?><?php echo $post->mold_setting;?><?php }?> -->
														<div  id='sell-id'></div>
													</td>
										</tr>	
											<tr>
													<td>Current shots:</td>
													<td><div  id='shot_current-id'></div></td>
										</tr>	
											<tr>
													<td>Maximum shots:</td>
													
													<td><!-- <?php foreach($posts as $post){?><?php echo $post->model;?><?php }?> --><div  id='shot_setting-id'></div></td>
										</tr>	


											<tr>
													<td>Hard chrome shots:</td>
													<td><?php foreach($posts as $post){?><?php echo $post->model;?><?php }?><div  id='prod-id'></div></td>
										</tr>	
											<tr>
													<td>Last Wash date:</td>
													
													<td><?php foreach($posts as $post){?><?php echo $post->model;?><?php }?><div  id='prod-id'></div></td>
										</tr>	
											<tr>
													<td>Last Hard chrome date:</td>
													<td><?php foreach($posts as $post){?><?php echo $post->model;?><?php }?><div  id='prod-id'></div></td>
										</tr>	
											<tr>
													<td>Last block change date :</td>
													
													<td><?php foreach($posts as $post){?><?php echo $post->model;?><?php }?><div  id='prod-id'></div></td>
										</tr>												
											</tbody>
										</table>
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
									</div>
								</section>
								</div>
						</div>				
				</section>
			</div>		
		</section>

		
				<!-- Vendor -->
		<script src="../vendor/jquery/jquery.js"></script>
		<script src="../vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="../vendor/popper/umd/popper.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.js"></script>
		<script src="../vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="../vendor/common/common.js"></script>
		<script src="../vendor/nanoscroller/nanoscroller.js"></script>
		<script src="../vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="../vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Specific Page Vendor -->
		<script src="../vendor/jquery-appear/jquery-appear.js"></script>
		<script src="../vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="../vendor/flot/jquery.flot.js"></script>
		<script src="../vendor/flot.tooltip/flot.tooltip.js"></script>
		<script src="../vendor/flot/jquery.flot.pie.js"></script>
		<script src="../vendor/flot/jquery.flot.categories.js"></script>
		<script src="../vendor/flot/jquery.flot.resize.js"></script>
		<script src="../vendor/jquery-sparkline/jquery-sparkline.js"></script>
		<script src="../vendor/raphael/raphael.js"></script>
		<script src="../vendor/morris/morris.js"></script>
		<script src="../vendor/gauge/gauge.js"></script>
		<script src="../vendor/snap.svg/snap.svg.js"></script>
		<script src="../vendor/liquid-meter/liquid.meter.js"></script>
		<script src="../vendor/chartist/chartist.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="../js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="../js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="../js/theme.init.js"></script>

		<!-- Examples -->
		<style>
			#ChartistCSSAnimation .ct-series.ct-series-a .ct-line {
				fill: none;
				stroke-width: 4px;
				stroke-dasharray: 5px;
				-webkit-animation: dashoffset 1s linear infinite;
				-moz-animation: dashoffset 1s linear infinite;
				animation: dashoffset 1s linear infinite;
			}

			#ChartistCSSAnimation .ct-series.ct-series-b .ct-point {
				-webkit-animation: bouncing-stroke 0.5s ease infinite;
				-moz-animation: bouncing-stroke 0.5s ease infinite;
				animation: bouncing-stroke 0.5s ease infinite;
			}

			#ChartistCSSAnimation .ct-series.ct-series-b .ct-line {
				fill: none;
				stroke-width: 3px;
			}

			#ChartistCSSAnimation .ct-series.ct-series-c .ct-point {
				-webkit-animation: exploding-stroke 1s ease-out infinite;
				-moz-animation: exploding-stroke 1s ease-out infinite;
				animation: exploding-stroke 1s ease-out infinite;
			}

			#ChartistCSSAnimation .ct-series.ct-series-c .ct-line {
				fill: none;
				stroke-width: 2px;
				stroke-dasharray: 40px 3px;
			}

			@-webkit-keyframes dashoffset {
				0% {
					stroke-dashoffset: 0px;
				}

				100% {
					stroke-dashoffset: -20px;
				};
			}

			@-moz-keyframes dashoffset {
				0% {
					stroke-dashoffset: 0px;
				}

				100% {
					stroke-dashoffset: -20px;
				};
			}

			@keyframes dashoffset {
				0% {
					stroke-dashoffset: 0px;
				}

				100% {
					stroke-dashoffset: -20px;
				};
			}

			@-webkit-keyframes bouncing-stroke {
				0% {
					stroke-width: 5px;
				}

				50% {
					stroke-width: 10px;
				}

				100% {
					stroke-width: 5px;
				};
			}

			@-moz-keyframes bouncing-stroke {
				0% {
					stroke-width: 5px;
				}

				50% {
					stroke-width: 10px;
				}

				100% {
					stroke-width: 5px;
				};
			}

			@keyframes bouncing-stroke {
				0% {
					stroke-width: 5px;
				}

				50% {
					stroke-width: 10px;
				}

				100% {
					stroke-width: 5px;
				};
			}

			@-webkit-keyframes exploding-stroke {
				0% {
					stroke-width: 2px;
					opacity: 1;
				}

				100% {
					stroke-width: 20px;
					opacity: 0;
				};
			}

			@-moz-keyframes exploding-stroke {
				0% {
					stroke-width: 2px;
					opacity: 1;
				}

				100% {
					stroke-width: 20px;
					opacity: 0;
				};
			}

			@keyframes exploding-stroke {
				0% {
					stroke-width: 2px;
					opacity: 1;
				}

				100% {
					stroke-width: 20px;
					opacity: 0;
				};
			}
		</style>
		<script src="../js/examples/examples.charts.js"></script>

	</body>
</html>