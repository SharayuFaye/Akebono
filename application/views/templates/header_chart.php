<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<style>
.dot {
    height:15px;
    width: 15px;
    background-color: blue;
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
    background-color:#026AB7; /* Green */
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
 <script type="text/javascript"> 
 $(document).ready(function(){ 
  var s1 = [2, 6, 7, 10];
  var s2 = [7, 5, 3, 4];
  var s3 = [14, 9, 3, 8];
  plot3 = $.jqplot('chart3', [s1, s2, s3], {
    // Tell the plot to stack the bars.
    stackSeries: true,
    captureRightClick: true,
    seriesDefaults:{
      renderer:$.jqplot.BarRenderer,
      rendererOptions: {
          // Put a 30 pixel margin between bars.
          barMargin: 30,
          // Highlight bars when mouse button pressed.
          // Disables default highlighting on mouse over.
          highlightMouseDown: true   
      },
      pointLabels: {show: true}
    },
    axes: {
      xaxis: {
          renderer: $.jqplot.CategoryAxisRenderer
      },
      yaxis: {
        // Don't pad out the bottom of the data range.  By default,
        // axes scaled as if data extended 10% above and below the
        // actual range to prevent data points right on grid boundaries.
        // Don't want to do that here.
        padMin: 0
      }
    },
    legend: {
      show: true,
      location: 'e',
      placement: 'outside'
    }      
  });
  // Bind a listener to the "jqplotDataClick" event.  Here, simply change
  // the text of the info3 element to show what series and ponit were
  // clicked along with the data for that point.
  $('#chart3').bind('jqplotDataClick', 
    function (ev, seriesIndex, pointIndex, data) {
      $('#info3').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
    }
  ); 
});

</script> 
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Akebono</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>vendor/animate/animate.css">

		<link rel="stylesheet" href="<?php echo base_url();?>vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>vendor/morris/morris.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>vendor/chartist/chartist.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url();?>vendor/modernizr/modernizr.js"></script>

  

<script type="text/javascript" src="<?php echo base_url();?>src/jquery.jqplot.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>src/plugins/jqplot.barRenderer.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>src/plugins/jqplot.categoryAxisRenderer.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>src/plugins/jqplot.pointLabels.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>src/jquery.jqplot.css" />




	</head>
	<body>
		<section class="body">
	<header class="header">
				<div class="logo-container">
					<a href="<?php echo base_url();?>" class="logo">
						<img src="<?php echo base_url(); ?>img/logoA.png" width="200" height="45" alt="Porto Admin" />
					</a>
					<div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					
						<div class="header-nav collapse">
						<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
						 <nav>
								<ul class="nav nav-pills" id="mainNav" style=" margin: 0px 266px 3px 2px;">
										<li class="dropdown">
									    <a class="nav-link dropdown-toggle" href="#">
									       Report Display
									    </a>
									    <ul class="dropdown-menu">
									        <li>
									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/welcome_message">
									               Status Mold Display
									            </a>
									        </li>
									        <li>

									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/tableajax">

                                                   Report Status Warning Display
									                
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Statushistory">
									                Status History Display
									            </a>
									        </li>
											  <li>

									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Temp">

                              Temperature & Pressure     
									            </a>
									        </li>
											<li>
									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Machinecontrol">
									               Machine Control Mold 
									            </a>
									        </li>
									        <li>
									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/production">
									               Production Data Logger
									            </a>
									        </li>
									      
									         <li>

									      <a class="nav-link" href="<?php echo base_url(); ?>index.php/Cleanhistory">
                                                    Cleaning History
									            </a>
									        </li> 

									         <li>

									        <a class="nav-link" href="<?php echo base_url(); ?>index.php/Machinerunning">
                                                   Machine Running Chart
									            </a>
									        </li> 
											
									       <!--  <li>
									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Statushistory1">
									                Status History Display1
									            </a>
									        </li> -->
									      <!--   <li>
									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Shortcounterhistory">
									                Report History Shot Counter
									            </a>
									        </li> -->
									    </ul>
									</li>
									<li class=" dropdown">
									    <a class="nav-link dropdown-toggle"  href="#">
									         Mold Setting
									    </a>
									     <ul class="dropdown-menu">
									       
									        <li>

									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Moldsetting">

                               Mold  Setting
									            </a>
									        </li> 
									         <li>

									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/forecastsetting">

                               Forecast Setting  
									            </a>
									        </li>
									         <li>

									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/forecast">

                               Forecast   
									            </a>
									        </li>
									     
									        <!--  <li>

									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/production">

                               Production data logger 
									            </a>
									        </li> -->
									       
									    </ul>									    
									</li>
								<li class=" dropdown">
									   <a class="nav-link dropdown-toggle" href="#">
	                       Mold  Document
									    </a>
									     <ul class="dropdown-menu">
									     	 <li>

									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Mold">

                               Mold Document History
									            </a>
									        </li>
									         <li>

									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Inspection_Result_Sheet">

                               Inspection Result Sheet
									            </a>
									        </li> 
									         <li>

									            <a class="nav-link" href="<?php echo base_url(); ?>index.php/Mold_Die_History_Record">

                               Mold & Die History Record
									            </a>
									        </li> 
									    </ul>
							<li class=" dropdown">
									    <a class="nav-link dropdown-toggle" href="<?php echo base_url(); ?>index.php/operate_mold">
									      Operate  Mold 
									    </a>

									     

							</li>
							<li class=" dropdown">
									    <a class="nav-link  " href="<?php echo base_url(); ?>index.php/about_us">
									     About Us
									    </a> 
							</li>			
								</li>
							</ul>
							</nav>
						</div>
					</div>
				
				 


				<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?php echo base_url(); ?>img/<?php echo $this->session->userdata['image']; ?>" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">
									<?php echo $this->session->userdata['username']; ?>
								</span>
								<span class="role">Administrator</span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled mb-2">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>index.php/profile"><i class="fa fa-user"></i> My Profile</a>
								</li>
								 <?php if($this->session->userdata['role'] == 'Superadmin' ){ ?>
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>index.php/manage_user"><i class="fa fa-user"></i>Manage Users</a>
								</li>
								<?php } ?>	 
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url(); ?>index.php/logout"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>