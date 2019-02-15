<!doctype html>
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
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/animate/animate.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url(); ?>vendor/modernizr/modernizr.js"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>




	</head>




	
	<style>
.chosen-container{
	width: 140px !important;
}	
.dot {
    height: 15px;
    width: 15px;
    background-color: #5cb85c;
    border-radius: 50%;
    display: inline-block;
    color:blue;
    margin: 0px 0px 0px 24px;
}
.dot1 {
    height: 15px;
    width: 15px;
    background-color: black;
    border-radius: 50%;
    display: inline-block;
    color:blue;
    margin: 0px 0px 0px 24px;
}
.table-bordered td {
    border: 1px solid #a0bfde !important;
}
</style>
	<body>
		<section class="body">

			<!-- start: header -->
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
								<ul class="nav nav-pills" id="mainNav" style=" margin: 0px 251px 3px 2px;">
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
									               Maintenance Control Mold 
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
								<img src="<?php echo base_url(); ?>img/<?php echo $this->session->userdata['image']; ?>" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/<?php echo $this->session->userdata['image']; ?>" />
 
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
			<!-- end: header -->