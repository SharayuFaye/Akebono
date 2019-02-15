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
						
										<h2 class="card-title" style="color: black;">Manage Users</h2>
									<!-- 	<div style="text-align: right;margin: -26px 75px 26px -4px;color: #008000;">Green:Running</div>
										<div style="text-align: right;margin: -30px 54px 7px 2px;color: black">Black:Not Running</div> -->
									</header>
 		<div class="card-body"> 
<!-- <style>
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
  height:300px;
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
</style> -->
</head>

<body>
<table  class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
  <thead>  
<tr> 
<th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">ID</th>
<th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Username</th>
<th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Password</th>
<th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Role</th> 
<th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Image</th> 
<th style="width:8%;text-align: center;background-color: #026AB7;   color: white;">Action</th> 
</tr>
  </thead>
  <tbody>
  <?php foreach($users as $user){?>
<tr>
<td style="width:8%;" ><?php echo $user->id;?></td>
<td style="width:8%;" ><?php echo $user->username;?></a></td>
<td style="width:8%;" ><?php echo $user->password;?></td>
<td style="width:8%;" ><?php echo $user->role;?></td>
<td style="width:8%;" >
 <img src="<?php echo base_url(); ?>img/<?php echo $user->image;?>" width="30px"> 
 </td> 
<td  style="width:4%;" >   <a  onclick="edit('<?php echo $user->id;?>',
'<?php echo $user->username;?>',
'<?php echo $user->password;?>',
'<?php echo $user->role;?>',
'<?php echo $user->image;?>' 
)"><i class="fa fa-pencil"></i></a>

<a   data-toggle="modal" class="open-delete"   data-model="<?php echo $user->id;?>"><i class="fa fa-trash"></i></a>                               
 </td>
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
function edit(id,username,password,role,image) {    
  var x = document.getElementById("editDIV");
   if (x.style.display === "none") {
       x.style.display = "block";      
       $('#myDIV').hide(); 
       $('#id').val(id);
       $('#username').val(username);
       $('#password').val(password);
       $('#role').val(role); 
       document.getElementById("image").src="<?php echo base_url();?>/img/"+image;  
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
   <?php echo form_open('Welcome/manage_user'); ?> 
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
   <?php echo form_open_multipart('Welcome/manage_user'); ?> 
                     <tr>
 

<div class="container-fluid">
  <div class="row"> 
      <div class="col-sm-12" > Username:  &nbsp;&nbsp; 
        <input type="text" name="username_add"   >  </div>
    </div>
    <br>
    <div class="row"> 
      <div class="col-sm-12" > Password:  &nbsp;&nbsp; 
        <input type="text" name="password_add"   >  </div>
    </div>
    <br>
    <div class="row"> 
  <div class="col-sm-12" > Role:  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
      <input type="text" readonly  name="role_add"   value="User"  > 
  </div>
   </div>
    <br>
   <div class="row"> 
    <div class="col-sm-12" > Image:  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  
  <img   width="30px"> 
  <br>
  <input type="file" name="file_add" style="padding-left: 77px;">
</div> 
   <input id="noEnterSubmit" class="btn btn-primary  button button2" name="save" type="button" style="margin: 2px 78px 9px 14px;" onclick="submit()" value="Save"> 
  </div>
                <?php echo form_close(); ?>

       </div></div>     </div>



<div id="editDIV" style="display: none;background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo form_open_multipart('Welcome/manage_user'); ?> 
                     <tr>
 

<div class="container-fluid">
  <div class="row"> 
      <div class="col-sm-12" > Username:  &nbsp;&nbsp; 
        <input type="hidden" name="id_edit" id="id" >
        <input type="text" name="username_edit" id="username" >  </div>
    </div>
    <br>
    <div class="row"> 
      <div class="col-sm-12" > Password:  &nbsp;&nbsp; 
        <input type="text" name="password_edit" id="password" >  </div>
    </div>
    <br>
    <div class="row"> 
  <div class="col-sm-12" > Role:  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
      <input type="text" readonly  name="role_edit" id="role" value="User"  > 
  </div>
   </div>
    <br>
   <div class="row"> 
    <div class="col-sm-12" > Image:  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  
  <img   width="30px"> 
  <br>
  <input type="file" name="file_edit" id="file" style="padding-left: 77px;">
   <img id="image" width="30px"> 
</div> 
   <input id="noEnterSubmit" class="btn btn-primary  button button2" name="save" type="button" style="margin: 2px 78px 9px 14px;" onclick="submit()" value="Save"> 
  </div>
                <?php echo form_close(); ?>
            </div>



 
      
    </div></div>
									</div>
								</section>
								</div>
						</div>				
				</section>
			</div>		
		</section>

		
		