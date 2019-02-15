

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
				    <div class="sidebar-header">
				        <div class="sidebar-title" style="color: #e60018">
				            Navigation
				        </div>
				        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
				            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
				        </div>
				    </div>
				
				</aside>
				
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<!-- <h2>Ajax Tables</h2> -->
					
						<div class="right-wrapper text-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Tables</span></li>
								<li><span>Ajax</span></li>
							</ol>
						</div>
					</header>

					<!-- start: page -->
						<section class="card">
							<header class="card-header">
								<div class="card-actions">
									<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
									<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
								</div>
						
								<h2 class="card-title">Report Status Warning Display</h2>
							</header>
							<div class="card-body">
								<!-- <table class="table table-bordered table-striped" id="datatable-ajax" data-url="ajax/ajax-datatables-sample.json"> -->
									<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
									<thead>
                                       <tr>
										<th colspan="4" style="text-align: center;background-color: #026AB7;
    color: white;">Mold ID Status Display</th>
    </tr>
										<tr>
											<th width="20%">Mold</th>
											<th width="25%">Model</th>
											<th width="25%">Details</th>
											<th width="15%">Date</th>
											<!-- <th width="15%">CSS grade</th> -->
										</tr>
									</thead>
									<tbody>
                                               <?php foreach($tables as $table){

$mold_count =  str_replace('HP-','',$table->mold) ;                                                	
$shot_current = $this->db->query("SELECT mold,time FROM status_mold where  mold_setting_id = '".$mold_count."' and shot_current = '1'   "); 
$shot_current_count = $shot_current->num_rows() ;	
//print_r("SELECT mold FROM status_mold where  mold = '".$mold_count."' and shot_current = '1' ");
// print_r($shot_current_count);
$shot_current1  = $shot_current->result();

$hard_current = $this->db->query("SELECT mold,time FROM status_mold where  mold_setting_id = '".$mold_count."' and hard_current = '1'  "); 
$hard_current_count = $hard_current->num_rows() ;	
// print_r($hard_current_count);
$hard_current1  = $hard_current->result();

$change_current = $this->db->query("SELECT mold,time FROM status_mold where  mold_setting_id = '".$mold_count."' and change_current = '1'  "); 
$change_current_count = $change_current->num_rows() ;
$change_current1  = $change_current->result();

if(($shot_current_count > $table->clean_set) ||   ($hard_current_count > $table->hard_chrom_set)  ||  ($change_current_count > $table->die_change_set) ){
                                               	?>
												<tr>
													<td><?php echo $table->mold;?></td>
													<td><?php echo $table->model;?></td>
													<td style="color:red">
													 <?php   
													 if($shot_current_count > $table->clean_set){  ?>  Request Clean Alert <br>
													   <?php }
													  if($hard_current_count > $table->hard_chrom_set){ ?>  Request Hard Chrome Alert  <br>
													   <?php }
													  if($change_current_count > $table->die_change_set){ ?>  Request Die Change Alert
													   <?php } ?>
													</td>
													<td><?php if($shot_current_count > $table->clean_set){
													foreach($shot_current1 as $shot){ } 	
													echo $shot->time; }?><br>
													<?php  if($hard_current_count > $table->hard_chrom_set){ 
													foreach($hard_current1 as $hard){ } 
													echo $hard->time; } ?>
													<br>
													<?php   if($change_current_count > $table->die_change_set){
													foreach($change_current1 as $change){ } 
													echo $change->time; }?></td>
													
													<?php }?> 
												</tr>
												
												<?php }?> 
											</tbody>
									<tbody>
									</tbody>
								</table>
							</div>
						</section>
					<!-- end: page -->
				</section>
			</div>

			
		</section>

		