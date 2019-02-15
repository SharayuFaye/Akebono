  
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

						<h2 style="color:black" class="card-title">Machine Running Chart</h2>


<?php $this->load->helper('form');?>
<?php echo form_open('Welcome/Machinerunning'); ?> 											
<div class="row"> 
<div class="col-sm-6" style="margin: 27px 16px 1px 3px;"> Search:<br>
<input type="datetime-local" name="startdate"  placeholder="Start date">
<input type="datetime-local" name="enddate"  placeholder="End date">
<!-- <input type="text" name="moldid"  placeholder="Enter Mold ID "> -->

 

</div>
<div class="col-sm-6" style="    margin: -62px 0 0px 426px;"> Action:<br> 
<input class="btn btn-primary  button button2" name="searchdisplay" type="submit" value="Search & display"/>
<input class="btn btn-primary  button button2" name="removeall" type="submit" value="Remove All"/>

 <?php echo form_close(); ?>  





					</header>

 
</head>
<body>







<div id="chartContainer" style="height: 370px; width: 100%; 
    margin:241px 0px 0px 2px;">
							
<?php
$test = array(
	array("label"=> "Product 1043 Pcs", "y"=> 11),
	array("label"=> "Product 1505 Pcs", "y"=> 8) 
);
 
$odi = array(
	array("label"=> "Product 1043 Pcs", "y"=> 2),
	array("label"=> "Product 1505 Pcs", "y"=> 5) 
);
 
$t20 = array(
	array("label"=> "Product 1043 Pcs", "y"=> 1),
	array("label"=> "Product 1505 Pcs", "y"=> 6) 
);
 
?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2" 
	axisX:{
		reversed: true
	},
	toolTip:{
		shared: true
	},
	data: [{
		type: "stackedBar",
		color: "red",
		name: "Machine Stop",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	},{
		type: "stackedBar",
		color: "green",
		name: "Machine Running",
		dataPoints: <?php echo json_encode($odi, JSON_NUMERIC_CHECK); ?>
	},{
		type: "stackedBar",
		color: "red",
		name: "Machine Stop",
		indexLabel: "#total",
		indexLabelPlacement: "outside",
		indexLabelFontSize: 15,
		indexLabelFontWeight: "bold",
		dataPoints: <?php echo json_encode($t20, JSON_NUMERIC_CHECK); ?>
	}]
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