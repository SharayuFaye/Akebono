 
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
    padding: 7px 18px 9px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 7px 0px 7px 0px;
    cursor: pointer;
    
}
h4 {
    margin-top: 0;
    margin-bottom: 5px;
}
</style>
            <div class="inner-wrapper">
                
                <section role="main" class="content-body">
                    <header class="page-header" style="background-color: #e60018;">
                      <!--   <h2>Responsive Tables</h2>  -->
                    
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
            
                    <h2 class="card-title" style="color: black;">Profile</h2>
                  <!--  <div style="text-align: right;margin: -26px 75px 26px -4px;color: #008000;">Green:Running</div>
                    <div style="text-align: right;margin: -30px 54px 7px 2px;color: black">Black:Not Running</div> -->
                  </header>

        <div class="card-body"> 
          <body>
<div class="container-fluid">
  <?php $this->load->helper('form');?>
   <?php echo form_open_multipart('Welcome/profile'); ?> 
  <div class="row"> 
      <div class="col-sm-12" > Username:  &nbsp;&nbsp; 
        <input type="text" name="username" value="<?php echo $this->session->userdata['username']; ?>">  </div>
    </div>
    <br>
    <div class="row"> 
  <div class="col-sm-12" > Role:  &nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
      <input type="text" readonly name="role" value="<?php echo $this->session->userdata['role']; ?>"> 
  </div>
   </div>
    <br>
   <div class="row"> 
    <div class="col-sm-12" > Image:  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;  
  <img src="<?php echo base_url(); ?>img/<?php echo $this->session->userdata['image']; ?>" width="30px"> 
  <br>
  <input type="file" name="file" style="padding-left: 77px;">
</div> 
   <input id="noEnterSubmit" class="btn btn-primary  button button2" name="save" type="button" style="margin: 2px 78px 9px 14px;" onclick="submit()" value="Save"> 
  </div>

     <?php echo form_close(); ?>
</div>
 








                                </section>
                                </div>
                        </div>              
                </section>
            </div>      
        </section>

        
        