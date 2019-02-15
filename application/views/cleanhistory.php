
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

					<!-- start: page -->
					<div class="row">
							<div class="col-lg-6">
								<section class="card"   style="margin-right: -443px;"  >
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
						
										<h2 class="card-title"><?php echo  $type;?>  History</h2>
									<!-- 	<p class="card-subtitle">With the categories plugin you can plot categories/textual data easily.</p> -->











<?php $this->load->helper('form');?>
<?php echo form_open('Welcome/cleanhistory'); ?> 								
  <div class="row"> 
       <div class="col-sm-4" style="    margin: 27px 0px -12px 0px;"> Search:<br>
       	<input type="date" name="startdate"  placeholder="Start date">
       	<input type="date" name="enddate"  placeholder="End date"></div>
       	 <div class="col-sm-8" style="    margin: 23px 16px -12px -16px;"> Action:<br>
       	 	 
       	 	<select class="chosen1" name="type">
       	 		<option><?php echo  $type;?></option>
       	 		<option>Clean</option>
       	 		<option>Hard Chrome</option>
       	 		<option>Die Change</option>
       	 	</select>

       	 	<select class="chosen2" name="mold"> 
       	 		<option>Select Mold</option> 
       	 	</select>

 <input class="btn btn-primary  button button2" name="submit" type="submit" value="Submit"/> 
<?php echo form_close(); ?>
 </header> 
<script type="text/javascript">
      $(".chosen1").chosen();
      $(".chosen2").chosen(); 
</script>

									<div class="card-body"> 
										<!-- Flot: Bars -->
<?php
 
$dataPoints = array();
 
    foreach($result  as $row){

        array_push($dataPoints, array("y"=> $row->time, "label"=> $row->temperature));
    } 
	  // print_r($dataPoints); echo "<br>";
// $dataPoints1 = array( 
// 	array("y" => 3373.64, "label" => "Germany" ),
// 	array("y" => 2435.94, "label" => "France" ) 
// );
// 	print_r($dataPoints1); 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "History"
	},
	axisY: {
		title: "Temperature  "
	},
	axisX: {
		title: "Time  "
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## ",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
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




			<div class="chart chart-md" id="flotBars"></div>

<!--  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
       <script type="text/javascript">
      // Load the Visualization API and the line package.
      google.charts.load('current', {'packages':['bar']});
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);
  
    function drawChart() {
  
        $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>index.php/cleanhistorydata',
          
        success: function (data1) {
        // Create our data table out of JSON data loaded from server.
        var data = new google.visualization.DataTable();
  
      data.addColumn('number', 'Year');
      data.addColumn('number', 'Sales');
      // data.addColumn('number', 'Expense');
        
      var jsonData = $.parseJSON(data1);
      
      for (var i = 0; i < jsonData.length; i++) {
            data.addRow([jsonData[i].year, parseInt(jsonData[i].sales) ]);
      }
      var options = {
        chart: {
          title: 'Company Performance',
          subtitle: 'Show Sales and Expense of Company'
        },
        width: 900,
        height: 500,
        axes: {
          x: {
            0: {side: 'top'}
          }
        },
        bar: {groupWidth: "55%"},
        legend: { position: "none" } 
      };
      var chart = new google.charts.Bar(document.getElementById('bar_chart'));
      chart.draw(data, options);
       }
     });
    }
  </script> -->
 <script type='text/javascript'  language='javascript'> 
//  $(document).ready(function(){  
// $.ajax({
//           url: '<?php echo base_url(); ?>index.php/cleanhistorydata',
//           type: 'POST',
//           dataType: 'json',
//           success: function ( data) {
     //          var flotBarsData =	 [
					// 	["Jan", 10],
					// 	["Feb", 10],
					// 	["Mar", 10],
					// 	["Apr", 10],
					// 	["May", 10],
					// 	["Jun", 10],
					// 	["Jul", 10],
					// 	["Aug", 10],
					// 	["Sep", 10],
					// 	["Oct", 10],
					// 	["Sep", 10],
					// 	["Oct", 10],    
					// 	["Nov", 10],
					// 	["Dec", 10]
			 	// ]; 
//                console.log(flotBarsData);
//           },
//           error: function ( data ) {
//               console.log('error');console.log(data);
//           }
//       });
// console.log("flotBarsData");console.log(flotBarsData);  
//  }); 
 </script>
						
									</div>
								</section>
							</div>

 <div id="bar_chart" ></div>


							<div class="col-lg-6">
								<section class="card" style="margin-right: -469px;">
									<!-- <header class="card-header"> -->
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
						
										<!-- <h2 class="card-title">Pie Chart</h2>
										<p class="card-subtitle">Default Pie Chart</p> -->
									</header>
									
								</section>
							</div>
						</div>
						
					<!-- end: page -->
				</section>
			</div>
		</section>
 <!--  <?php
 
$dataPoints1 = array( 
	array("label" => "",  "y" => 50 ),
	array("label" => "", "y" => 28 )
	
);
 
$dataPoints2 = array( 
	array("label" => "",  "y" => 25 ),
	array("label" => "", "y" => 30 )
	
);
 
$dataPoints3 = array( 
	array("label" => "",  "y" => 13 ),
	array("label" => "", "y" => 25 )
	
);
 
$dataPoints4 = array( 
	array("label" => "",  "y" => 12 ),
	array("label" => "", "y" => 17 )

);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		//text: "Social Media Engagement"
	},
	toolTip: {
		shared: true
	},
	axisY: {
		//title: "Percentage of Users",
		suffix: "%"
	},
	data: [{
		type: "stackedBar100",
		name: "More than Once a day",
		yValueFormatString: "#,##0\"%\"",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "stackedBar100",
		yValueFormatString: "#,##0\"%\"",
		name: "Daily",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	},{
		type: "stackedBar100",
		yValueFormatString: "#,##0\"%\"",
		name: "Weekly",
		dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
	},{
		type: "stackedBar100",
		yValueFormatString: "#,##0\"%\"",
		name: "Less Often",
		dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script> -->

<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>  

	 
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

	</body>
</html>