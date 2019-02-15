<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

 
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
						
										<h2 class="card-title" style="color: black;">Mold Setting</h2>
									<!-- 	<div style="text-align: right;margin: -26px 75px 26px -4px;color: #008000;">Green:Running</div>
										<div style="text-align: right;margin: -30px 54px 7px 2px;color: black">Black:Not Running</div> -->
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
  height:559px;
  overflow:auto;
  overflow-x:hidden;
  display:block;
  width:100%;
}
tbody tr {
  display:table;
  width:100%;
  table-layout:fixed;
}
</style>
</head>

<body>
<table  class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
  <thead>
      <tr>
<th colspan="14" style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Mold Setting</th>

</tr>
<tr> 
<th  rowspan="2"  style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Model</th>
<th  rowspan="2"  style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Mold</th>
<th   rowspan="2" style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Cavity</th>
<th  rowspan="2" style="width:8%;text-align: center;background-color: #026AB7;   color: white;">M/C display</th>
<th  rowspan="2"  rowspan="2"  style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Clean setting</th>
<th  rowspan="2"  style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Hard chrome setting</th>
<th  rowspan="2"  style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Die change setting</th>

<th colspan="3" style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Quality</th>

<th colspan="2" style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Price</th>
<th rowspan="3" style="width:7%;text-align: center;background-color: #026AB7;   color: white;">Action</th>
</tr>
<tr> 
  <th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Quality Attact</th>
<th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Request hard chrome</th>
<th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Die change</th>
<th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Hard Chrome</th>
<th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Die change</th>
                        </tr>
  </thead>
  <tbody>
  <?php foreach($Moldsetting as $Moldsetting){?>
                                            <tr>
                                     <td style="width:8%;" ><?php echo $Moldsetting->model;?></td>
                                    <td style="width:8%;" ><?php echo $Moldsetting->mold;?></a></td>
                                    <td style="width:8%;" ><?php echo $Moldsetting->cavity;?></td>
                                        <td style="width:8%;" ><?php echo $Moldsetting->m_c;?></td>
                                    <td  style="width:8%;" ><?php echo $Moldsetting->clean_set;?></td>
                                    <td  style="width:8%;" ><?php echo $Moldsetting->hard_chrom_set;?></td>
                                    <td  style="width:8%;" ><?php echo $Moldsetting->die_change_set;?></td>
                                    <td  style="width:8%;" ><?php echo $Moldsetting->qua_att;?></td>
                                    <td  style="width:8%;" ><?php echo $Moldsetting->req_chorm;?></td>
                                    <td  style="width:8%;" ><?php echo $Moldsetting->die_change;?></td>
                                     <td  style="width:8%;" > <?php echo $Moldsetting->price_hard_chrom;?></td>
                                    <td  style="width:8%;" ><?php echo $Moldsetting->price_die_change;?></td>
                                    <td  style="width:4%;" >   <a  onclick="edit('<?php echo $Moldsetting->mold_setting_id;?>',
                                      '<?php echo $Moldsetting->model;?>',
                                    '<?php echo $Moldsetting->mold;?>',
                                    '<?php echo $Moldsetting->cavity;?>',
                                    '<?php echo $Moldsetting->m_c;?>',
                                    '<?php echo $Moldsetting->clean_set;?>',
                                    '<?php echo $Moldsetting->hard_chrom_set;?>',
                                    '<?php echo $Moldsetting->die_change_set;?>',
                                    '<?php echo $Moldsetting->qua_att;?>',
                                    '<?php echo $Moldsetting->req_chorm;?>',
                                    '<?php echo $Moldsetting->die_change;?>',
                                    '<?php echo $Moldsetting->price_hard_chrom;?>',
                                    '<?php echo $Moldsetting->price_die_change;?>'
                                        )"><i class="fa fa-pencil"></i></a>
                                   
                                    <a   data-toggle="modal" class="open-delete"   data-model="<?php echo $Moldsetting->mold_setting_id;?>"><i class="fa fa-trash"></i></a>                                </td>
                                                <?php }?>
                                            </a>    </tr>  
  </tbody> 
</table>



<button onclick="myFunction()" class="btn btn-primary  button button2">Add</button>
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    $('#editDIV').hide();
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function edit(mold_setting_id,model,mold,cavity,m_c,clean_set,hard_chrom_set,die_change_set,qua_att,req_chorm,die_change,price_hard_chrom,price_die_change) {    var x = document.getElementById("editDIV");
   if (x.style.display === "none") {
       x.style.display = "block";      
       $('#myDIV').hide();
       
       $('#mold_setting_id').val(mold_setting_id);
         $('#model').val(model);
       $('#mold').val(mold);
       $('#cavity').val(cavity);
       $('#m_c').val(m_c);
       $('#clean_set').val(clean_set);
       $('#hard_chrom_set').val(hard_chrom_set);
       $('#die_change_set').val(die_change_set);
       $('#qua_att').val(qua_att);
       $('#req_chorm').val(req_chorm);
       $('#die_change').val(die_change);
       $('#price_hard_chrom').val(price_hard_chrom);
       $('#price_die_change').val(price_die_change);
   } else {
       x.style.display = "none";
   }
}
</script>


<script type="text/javascript">
    $(document).ready(function () {             
    $('.open-delete').click(function(){ 
        $('#modeldel').val($(this).data('model')); 
        $('#deleteDiv').modal('show');
    });
});
</script>

 <div class="modal fade" id="deleteDiv" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 105%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style=" background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Moldsetting'); ?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
      <h4 class="modal-title" style="color:black;">Do you really want to delete this model?</h4>
  <input type="hidden" name="modeldel" id="modeldel"  >  
   
  </div>
</div> 
 
</div>
        </div>
         <div class="row">
    
         </div>
    
        <div class="modal-footer">
          <input class="btn btn-default" name="ok" type="submit" value="OK"> 
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
      <?php echo form_close(); ?>
      </div></div>                                          
</div>



<div id="myDIV" style="display: none;background: #f6f6f6;">
                      <?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Moldsetting'); ?> 
                     <tr>
 

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4" > Model:<br>
      <input type="text" name="model">
     <!--  <select name="model" style="width: 190px;" > 
        <?php foreach($status_mold as $status_mold1){ ?>
        <option><?php echo $status_mold1->model ; ?></option>
      <?php } ?>
      </select> -->
  </div>
    <div class="col-sm-4"> Mold:<br>
       <input type="text" name="mold">
      <!-- <select name="mold" style="width: 190px;">
      <?php foreach($status_mold as $status_mold2){ ?>
        <option><?php echo $status_mold2->mold ; ?></option>
      <?php } ?>
    </select> -->
  </div>
   
    <div class="col-sm-4" > Cavity:<br>
  <input type="text" name="cavity" value=""></div>
    <div class="col-sm-4"> M/C Display:<br>
  <input type="text" name="m_c" value=""></div>
  <div class="col-sm-4"> Clean setting:<br>
  <input type="text" name="clean_set" value=""></div>
  <div class="col-sm-4"> Hard chrome setting:<br>
  <input type="text" name="hard_chrom_set" value=""></div>
  <div class="col-sm-4"> Die chnage setting:<br>
  <input type="text" name="die_change_set" value=""></div> 
  <div class="col-sm-4"> Quality Attact:<br>
  <input type="text" name="qua_att" value=""></div>
  <div class="col-sm-4"> Requesthard chorm:<br>
  <input type="text" name="req_chorm" value=""></div>
  <div class="col-sm-4">Quality Die change:<br>
  <input type="text" name="die_change" value=""></div>
  <div class="col-sm-4">Price Hard Chorme:<br>
  <input type="text" name="price_hard_chrom" value=""></div>
  <div class="col-sm-4"> Price Die change:<br>
  <input type="text" name="price_die_change" value=""></div>  
   <input id="noEnterSubmit" class="btn btn-primary  button button2" name="save" type="button" style="margin: 2px 78px 9px 14px;" onclick="submit()" value="Save"> 
  </div>
</div> 
                                        </tr>
                                       <!--  <button class="button button2" name="save" type="submit" >Save</button> -->
               <!--  </table> -->
                <?php echo form_close(); ?>

            </div>



<div id="editDIV" style="display: none;background: #f6f6f6;">
                      <?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Moldsetting'); ?> 
                     <tr>
 

<div class="container-fluid">
  <div class="row">
      <input type="hidden" name="mold_setting_id"   id="mold_setting_id" value="">
    <div class="col-sm-4" > Model:<br>
  <input type="text" name="modelupdate"   id="model" value=""></div>
    <div class="col-sm-4"> Mold:<br>
  <input type="text" name="mold" id="mold"   value=""></div>
    <div class="col-sm-4" > Cavity:<br>
  <input type="text" name="cavity" id="cavity" value=""></div>
    <div class="col-sm-4"> M/C Display:<br>
  <input type="text" name="m_c" id="m_c" value=""></div>
  <div class="col-sm-4"> Clean setting:<br>
  <input type="text" name="clean_set" id="clean_set" value=""></div>
  <div class="col-sm-4"> Hard chrome setting:<br>
  <input type="text" name="hard_chrom_set" id="hard_chrom_set" value=""></div>
  <div class="col-sm-4"> Die chnage setting:<br>
  <input type="text" name="die_change_set" id="die_change_set" value=""></div> 
  <div class="col-sm-4"> Quality Attact:<br>
  <input type="text" name="qua_att" id="qua_att" value=""></div>
  <div class="col-sm-4"> Requesthard chorm:<br>
  <input type="text" name="req_chorm" id="req_chorm" value=""></div>
  <div class="col-sm-4">Quality Die change:<br>
  <input type="text" name="die_change" id="die_change" value=""></div>
  <div class="col-sm-4">Price Hard Chorme:<br>
  <input type="text" name="price_hard_chrom" id="price_hard_chrom" value=""></div>
  <div class="col-sm-4"> Price Die change:<br>
  <input type="text" name="price_die_change" id="price_die_change" value=""></div>
   <input class="btn btn-primary  button button2" name="update" type="button" style="margin: 2px 78px 9px 14px;" value="Update" onclick="submit()" >
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

		
		