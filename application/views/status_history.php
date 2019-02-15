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




			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						<!-- <h2>Responsive Tables</h2> -->
					
						<div class="right-wrapper text-right">
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
						</div>
					</header>		
						<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
						
										<h2 class="card-title" >Status History Display</h2>
										<div class="container-fluid">

<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Statushistory'); ?> 											
  <div class="row"> 
       <div class="col-sm-6" style="    margin: 27px 16px -12px -16px;"> Search:<br>
       	<input type="date" name="startdate"  placeholder="Start date">
       	<input type="date" name="enddate"  placeholder="End date">
        <!-- <input type="text" name="moldid"  placeholder="Enter Mold ID "> --> 
        <select name="moldid"  class="chosen"  style="height: 31px;width: 128px;">
        <option value="0">Select Mold</option> 
        <?php foreach($Statushistory1 as $Temp){?> 
            <option><?php echo $Temp->mold;?></option>
        <?php }?> 
		</select>

       </div>
       	 <div class="col-sm-6" style="    margin: 23px 16px -12px -16px;"> Action:<br>
       	 	 <!-- <button onclick="myFunction()" class="button button2">Search & display</button>
       	 	  <button onclick="myFunction()" class="button button2">Remove All</button>
 -->
       	 	   <input class="btn btn-primary  button button2" name="searchdisplay" type="submit" value="Search & display"/>
       	 	    <input class="btn btn-primary  button button2" name="removeall" type="submit" value="Remove All"/>

 <?php echo form_close(); ?>       	 	  
   <!--  <select name="Search" style="margin: 0px 0px 1px -30px;
    padding: 3px 4px 5px 5px;">
    <option value="Search&display">Search & display</option>
    <option value="Remove">Remove All</option>
    </div>
    </div> 
  </select> -->
					

<script type="text/javascript">
      $(".chosen").chosen();
</script>
									</header>

									<div class="card-body">
										<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
											<thead>
												<tr>
													<th colspan="7" style="text-align: center;">Mold History Item : 
													<?php echo $mold ;?>
												</th>
													<!-- <th rowspan="3">Stutus Running</th>
													<th rowspan="3">M/C</th> -->
												</tr>
                                                 <tr> 
													<th rowspan="2" style="text-align: center;">DateTime</th>
													
													<th colspan="2" style="text-align: center;" >Shot Counter</th>
													<th colspan="2" style="text-align: center;">Hard Chrome</th>
													<th colspan="2" style="text-align: center;">Die Change </th>
												</tr>
												<tr> 
													<th >History Count</th>
													<th >status</th>
													<th >History Count</th>
													<th >status</th>
													<th >History Count</th>
													<th >status</th>
												</tr>
													
											</thead>
											<tbody>
												<?php
												if($Statushistorys){

											foreach($Statushistorys as $Statushistory){?>
												<tr>
													
													
													<td><?php echo $Statushistory->date;?></td>
													<td><?php echo $Statushistory->current_shot;?></td>
													<td><?php if ($Statushistory->type == 'currentshots'){	echo'<span class="dot"></span>';
													  }else{echo'
														<span class="dot11"></span>';
														}?><br></td>
													<td ><?php echo $Statushistory->hard_chrome_shot;?></td>
													<td><?php if ($Statushistory->type == 'hardchromeshots'){	echo'<span class="dot"></span>';
													  }else{echo'
														<span class="dot11"></span>';
														}?><br></td>
													<td ><?php echo $Statushistory->maximum_shot;?></td>
													<td ><?php if ($Statushistory->type == 'diechange'){	echo'<span class="dot"></span>';
													  }else{ echo'<span class="dot11"></span>';}?><br></td>
													<?php }?> 													
												</tr>
											<?php }?> 	 
											</tbody>
										</table>
										<div style="margin: 5px 0px 0px -23px;">
								<span class="dot"></span><div style="margin: -23px 0px 0px 51px;">Work status on time</div>
										
										</div>
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

	