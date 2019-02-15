<style>
.dot {
    height:15px;
    width: 15px;
    background-color: green;
    border-radius: 50%;
    display: inline-block;
}
</style>

			<div class="inner-wrapper">
			

				<section role="main" class="content-body">
					<header class="page-header">
						<!-- <h2>Responsive Tables</h2> -->
					
						<!-- <div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
								<li><span>Responsive</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div> -->
					</header>

					<!-- start: page -->
						<!-- <div class="alert alert-info">
							Resize the browser to see the responsiveness in action.
						</div> -->
						
						<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
						
										<h2 class="card-title" >Status History Display</h2>
										<!-- <div style="text-align: right;margin: -26px 75px 26px -4px;">Green:Running</div>
										<div style="text-align: right;margin: -30px 54px 7px 2px;">Black:Not Running</div> -->
									</header>

									<div class="card-body">
										<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
											<thead>
												<!-- <tr>
													<th colspan="7" style="text-align: center;">Mold History Item</th> -->
													<!-- <th rowspan="3">Stutus Running</th>
													<th rowspan="3">M/C</th> -->
											<!-- 	</tr> -->
                                                 <tr> 
													<th rowspan="2" style="text-align: center;">Date</th>
													
													<th colspan="3" style="text-align: center;" >Cleaner</th>
													<th colspan="3" style="text-align: center;">Hard Chrome</th>
													<th colspan="3" style="text-align: center;">Change boxes</th>
												</tr>
												<tr> 
													<th >Shot</th>
													<th >Setting</th>
													<th >Status</th>
													<th >Shot</th>
													<th >Setting</th>
													<th >Status</th>
													<th >Shot</th>
													<th >Setting</th>
													<th >Status</th>
												</tr>
													
											</thead>
											<tbody>
											 <?php foreach($Statushistory1 as $Statushistory1){?>
												<tr>
													<td>27/08/2017</td>
													<td><?php echo $Statushistory1->mold_setting;?></td>
													<td>dfgdg</td>
													<td><?php if ($Statushistory1->status_running == 1){	echo'&#10004;';
													  }else{echo'
														';
														}?><br></td>
													<td >-0.01</td>
													<td >-0.01</td>
													<td ><?php if ($Statushistory1->status_running == 1){	echo'&#10004;';
													  }else{echo'
														';
														}?><br></td>
													<td >$1.39</td>
													<td >$1.39</td>
													<td ><?php if ($Statushistory1->status_running == 1){	echo'&#10004;';
													  }else{echo'
														';
														}?><br></td>
													<?php }?> 										
												</tr>
												<!-- <tr>
													<td>27/08/2017</td>
													<td>AAC</td>
													<td>dfgdg</td>
													<td><span class="dot"><br></td>
													<td >-0.01</td>
													<td >-0.01</td>
													<td ><span class="dot"><br></td>
													<td >$1.39</td>
													<td >$1.39</td>
													<td ><span class="dot"><br></td>
																							
												</tr>
												<tr>
													<td>27/08/2017</td>
													<td>AAC</td>
													<td>dfgdg</td>
													<td><span class="dot"><br></td>
													<td >-0.01</td>
													<td >-0.01</td>
													<td ><span class="dot"><br></td>
													<td >$1.39</td>
													<td >$1.39</td>
													<td ><span class="dot"><br></td>
																							
												</tr>
												<tr>
													<td>27/08/2017</td>
													<td>AAC</td>
													<td>dfgdg</td>
													<td><span class="dot"><br></td>
													<td >-0.01</td>
													<td >-0.01</td>
													<td ><span class="dot"><br></td>
													<td >$1.39</td>
													<td >$1.39</td>
													<td ><span class="dot"><br></td>
																							
												</tr>
												<tr>
													<td>27/08/2017</td>
													<td>AAC</td>
													<td>dfgdg</td>
													<td><span class="dot"><br></td>
													<td >-0.01</td>
													<td >-0.01</td>
													<td ><span class="dot"><br></td>
													<td >$1.39</td>
													<td >$1.39</td>
													<td ><span class="dot"><br></td>
																							
												</tr> -->
												
											</tbody>
										</table>
									</div>
								</section>
							</div>
						</div>
						
					
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close d-md-none">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark"></div>
			
								<ul>
									<li>
										<time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		</section>

		<!-- Vendor -->
		<script src="vendor/jquery/jquery.js"></script>
		<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="vendor/popper/umd/popper.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.js"></script>
		<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="vendor/common/common.js"></script>
		<script src="vendor/nanoscroller/nanoscroller.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>

	</body>
</html>