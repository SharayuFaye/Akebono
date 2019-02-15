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
</style>
            <div class="inner-wrapper">
                
                <section role="main" class="content-body">
                    <header class="page-header" style="background-color: #e60018;">
                        <!-- <h2>Responsive Tables</h2> -->
                    
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
                        
                                        <h2 class="card-title" style="color: black;">Mold Document History</h2>
                                        <!-- <div style="text-align: right;margin: -26px 75px 26px -4px;color: #008000;">Green:Running</div>
                                        <div style="text-align: right;margin: -30px 54px 7px 2px;color: black">Black:Not Running</div> -->
                                    </header> 
    <div class="card-body">

      <?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Mold'); ?>                      
  <div  id="mysearch"  class="row"  style="display: block;"> 
       <div class="col-sm-6" > Search:<br>
        <input type="text" name="quotation"  placeholder="Quotation No.">
        <input type="text" name="qad"  placeholder="QAD">
        <input type="date" name="date" >
       </div>
         <div class="col-sm-6" style="    margin:-55px 8px 0px 550px;"> Action:<br>
           <!-- <button onclick="myFunction()" class="button button2">Search & display</button>
            <button onclick="myFunction()" class="button button2">Remove All</button>
 -->
             <input class="btn btn-primary  button button2" name="searchdisplay" type="submit" value="Search & display"/>
              <input class="btn btn-primary  button button2" name="removeall" type="submit" value="Remove All"/>
         </div>  
  </div>          
 <?php echo form_close(); ?> 

 
        <table  id="mytable"  class="table table-responsive-lg table-bordered table-striped table-sm mb-0" style="display: block;
        overflow-x: auto;
        /*white-space: nowrap;*/">
            <thead>
                <tr>
<th  style="text-align: center;background-color: #026AB7;color: white;">Req Nbr</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Quotation No.</th>
<th style="text-align: center;background-color: #026AB7;color: white;">RFQ NO.</th>


<th  style="text-align: center;background-color: #026AB7;color: white;">วันที่ออก PR</th>
<th style="text-align: center;background-color: #026AB7;color: white;"> No.</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Part No. (QAD)</th>

<th  style="text-align: center;background-color: #026AB7;color: white;">Description</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Q'TY</th>
<th style="text-align: center;background-color: #026AB7;color: white;">UNIT</th>

<th style="text-align: center;background-color: #026AB7;color: white;">Unit Cost</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Discount</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Amount</th>

<th style="text-align: center;background-color: #026AB7;color: white;">Required By</th> <th style="text-align: center;background-color: #026AB7;color: white;">Objective</th>
<th style="text-align: center;background-color: #026AB7;color: white;">MP No.</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Due Date</th>
<th style="text-align: center;background-color: #026AB7;color: white;width:20px;">No. PO</th>
<th style="text-align: center;background-color: #026AB7;color: white;">TAX Invoice </th>
<th style="text-align: center;background-color: #026AB7;color: white;">Receive </th>
<th style="text-align: center;background-color: #026AB7;color: white;">New / Hard Chrome</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Data Inspection ( Scan )</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Action</th>
                </tr>
                    
            </thead>          
<tbody> 
 <?php  foreach($Molds as $Mold){?>   
 <tr> 
    <td><?php echo $Mold->req_num;?></td>  
    <td><u><a href="" data-toggle="modal" class="open-quatation"   data-req_num_data="<?php echo $Mold->req_num;?>" data-fileupload="<?php echo $Mold->fileupload;?> "  >
        <?php echo $Mold->quatation_no;?></a></u> 
    </td> 
    <td><?php echo $Mold->rfq_no;?></td> 
    <td><?php echo $Mold->pr;?></td> 
    <td><?php echo $Mold->no;?></td> 
    <td><?php echo $Mold->part_no;?></td> 
    <td><?php echo $Mold->description;?></td> 
    <td><?php echo $Mold->quantity;?></td> 
    <td><?php echo $Mold->unit;?></td> 
    <td><?php echo $Mold->unit_cost;?></td> 
    <td><?php echo $Mold->discount;?></td> 
    <td><?php echo $Mold->amount;?></td> 
    <td><?php echo $Mold->required_by;?></td> 
    <td><?php echo $Mold->objective;?></td> 
    <td><?php echo $Mold->mp_no;?></td> 
    <td><?php echo $Mold->due_date;?></td> 
    <td>
      <u><a href="" data-toggle="modal" class="open-no_podiv"   data-req_num_data="<?php echo $Mold->req_num;?>"   data-fileupload_no_po="<?php echo $Mold->fileupload_no_po;?> "  >
         <?php echo $Mold->no_po;?></a></u> 
     </td> 
    <td><?php echo $Mold->tax_invoice;?></td> 
    <td><?php echo $Mold->receive_date;?></td> 
    <td><?php echo $Mold->new_hard_chrome;?></td> 
    <td>  <?php echo $Mold->data_inspection;?>
        <br>
        <u><a href="" data-toggle="modal" class="open-data_inspection"   data-req_num_data="<?php echo $Mold->req_num;?>"   data-fileupload_data_inspection="<?php echo $Mold->fileupload_data_inspection;?> "  >
         Upload</a></u>
    </td>  
    <td>  <a  onclick="edit('<?php echo  $Mold->req_num;?>',
                                    '<?php echo $Mold->quatation_no;?>',
                                    '<?php echo $Mold->rfq_no;?>',
                                    '<?php echo $Mold->pr;?>',
                                    '<?php echo $Mold->no;?>',
                                    '<?php echo $Mold->part_no;?>',
                                    '<?php echo $Mold->description;?>',
                                    '<?php echo $Mold->quantity;?>',
                                    '<?php echo $Mold->unit;?>',
                                    '<?php echo $Mold->unit_cost;?>',
                                    '<?php echo $Mold->discount;?>',
                                    '<?php echo $Mold->amount;?>',
                                    '<?php echo $Mold->required_by;?>',
                                    '<?php echo $Mold->objective;?>',
                                    '<?php echo $Mold->mp_no;?>',
                                    '<?php echo $Mold->due_date;?>',
                                    '<?php echo $Mold->no_po;?>',
                                    '<?php echo $Mold->tax_invoice;?>',
                                    '<?php echo $Mold->receive_date;?>',
                                    '<?php echo $Mold->new_hard_chrome;?>',
                                    '<?php echo $Mold->data_inspection;?>'
                                        )"><i class="fa fa-pencil"></i></a>
      </td>    
 </tr>  <?php } ?> </table> 
 <script type="text/javascript">
function edit(req_num,quatation_no,rfq_no,pr,no,part_no,description,quantity,unit,unit_cost,discount,amount,required_by,objective,mp_no,due_date,no_po,tax_invoice,receive_date,new_hard_chrome,data_inspection,fileupload,fileupload_no_po,fileupload_data_inspection) {    
  var x = document.getElementById("myDIV"); 
       x.style.display = "block";         
       $('#req_num').val(req_num);
       $('#quatation_no').val(quatation_no);
       $('#rfq_no').val(rfq_no);
       $('#pr').val(pr);
       $('#no').val(no);
       $('#part_no').val(part_no);
       $('#description').val(description);
       $('#quantity').val(quantity);
       $('#unit').val(unit);
       $('#unit_cost').val(unit_cost);
       $('#discount').val(discount);
       $('#amount').val(amount);
       $('#required_by').val(required_by);
       $('#objective').val(objective);
       $('#mp_no').val(mp_no);
       $('#due_date').val(due_date);
       $('#no_po').val(no_po);
       $('#tax_invoice').val(tax_invoice);
       $('#receive_date').val(receive_date);
       $('#new_hard_chrome').val(new_hard_chrome);
       $('#data_inspection').val(data_inspection); 
      document.getElementById("req_num").readOnly = true;
     
}


    $(document).ready(function () {        
    $('#printtable').hide();     
    $('.open-quatation').click(function(){ 
        $('#req_num_data').val($(this).data('req_num_data')); 
        $('#fileupload').html($(this).data('fileupload')); 
        var S = "<?php echo base_url();?>/uploads/"+$(this).data('fileupload');  
        if (S.includes("png") || S.includes("jpg")) { 
             document.getElementById("imageid").src="<?php echo base_url();?>/uploads/"+$(this).data('fileupload');  
        }else{
            $('#imageid').hide();   
        }
        if (S.includes("pdf")) { 
          document.getElementById("pdfid").src="<?php echo base_url();?>/uploads/"+$(this).data('fileupload');
        }else{
            $('#pdfid').hide();   
        }
        $('#quotation').modal('show');


    });
    $('.open-no_podiv').click(function(){ 
        $('#req_num_no_po').val($(this).data('req_num_data')); 
        $('#fileupload_no_po').html($(this).data('fileupload_no_po')); 

        var S = "<?php echo base_url();?>/uploads/"+$(this).data('fileupload_no_po');  
        if (S.includes("png")) { 
             document.getElementById("imageid2").src="<?php echo base_url();?>/uploads/"+$(this).data('fileupload_no_po');  
        }else{
            $('#imageid2').hide();   
        }
        if (S.includes("pdf")) { 
          document.getElementById("pdfid2").src="<?php echo base_url();?>/uploads/"+$(this).data('fileupload_no_po');
        }else{
            $('#pdfid2').hide();   
        }


         $('#no_podiv').modal('show');
    });
    $('.open-data_inspection').click(function(){ 
        $('#req_num_data_inspection').val($(this).data('req_num_data')); 
        $('#fileupload_data_inspection').html($(this).data('fileupload_data_inspection')); 

        var S = "<?php echo base_url();?>/uploads/"+$(this).data('fileupload_data_inspection');  
        if (S.includes("png")) { 
             document.getElementById("imageid3").src="<?php echo base_url();?>/uploads/"+$(this).data('fileupload_data_inspection');  
        }else{
            $('#imageid3').hide();   
        }
        if (S.includes("pdf")) { 
          document.getElementById("pdfid3").src="<?php echo base_url();?>/uploads/"+$(this).data('fileupload_data_inspection');
        }else{
            $('#pdfid3').hide();   
        }


         $('#data_inspection').modal('show');
    });
});
</script>
    
<div class="modal fade" id="quotation" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 105%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Quotation File Upload</h4>
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style=" color:black;background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo    form_open_multipart('Welcome/Mold');?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
     <h4  >File : <span id="fileupload"></span> </h4>

     <img height="62px" id="imageid">
     <embed  type="application/pdf" width="100%" height="300px" id="pdfid" />
     <br>

     Select New File To Upload : 
   <input type="hidden" name="req_num_data" id="req_num_data"   >
        <input type="file" name="file" > 
  </div>
</div> 
</div>
        </div>
         <div class="row">
    
         </div>
    
        <div class="modal-footer">
             <input class="btn btn-primary  button button2" type="submit" name="upload" value="Update">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

 <?php echo form_close(); ?>
      </div> 
      </div></div>                                          
</div>


<div class="modal fade" id="no_podiv" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 105%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">No. PO File Upload</h4>
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style="color:black; background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo    form_open_multipart('Welcome/Mold');?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
        <h4  >File : <span id="fileupload_no_po"></span> </h4>

        <img height="62px" id="imageid2">
     <embed  type="application/pdf" width="100%" height="300px" id="pdfid2" />
     <br>
     Select New File To Upload : 
   <input type="hidden" name="req_num_no_po" id="req_num_no_po"   >
        <input type="file" name="fileno_po" >
         
  </div>
</div> 
</div>
        </div>
         <div class="row">
    
         </div>
    
        <div class="modal-footer">
             <input class="btn btn-primary  button button2" type="submit" name="uploadno_po" value="Update">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

 <?php echo form_close(); ?>
      </div> 
      </div></div>                                          
</div>



<div class="modal fade" id="data_inspection" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 105%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Data Inspection File Upload</h4>
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style="color:black; background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo    form_open_multipart('Welcome/Mold');?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
        <h4  >File : <span id="fileupload_data_inspection"></span> </h4>

        <img height="62px" id="imageid3">
     <embed  type="application/pdf" width="100%" height="300px" id="pdfid3" />
     <br>
     Select New File To Upload : 
   <input type="hidden" name="req_num_data_inspection" id="req_num_data_inspection"   >
        <input type="file" name="filedata_inspection" >
         
  </div>
</div> 
</div>
        </div>
         <div class="row">
    
         </div>
    
        <div class="modal-footer">
             <input class="btn btn-primary  button button2" type="submit" name="uploaddata_inspection" value="Update">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

 <?php echo form_close(); ?>
      </div> 
      </div></div>                                          
</div>








<?php $this->load->helper('form');?>
 <?php echo form_open('Welcome/Mold'); ?>                                          
 <button onclick="myFunction()" type="button" class="btn btn-primary  button button2">Add</button>

 <input type="submit" name="ExportType"  class="btn btn-primary  button button2" value="Save" > 

 <button onclick="myPrint()" type="button" class="btn btn-primary  button button2">Print</button>

  <?php echo form_close(); ?>
<script>

function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
       $('#req_num').val('');
       $('#quatation_no').val('');
       $('#rfq_no').val('');
       $('#pr').val('');
       $('#no').val('');
       $('#part_no').val('');
       $('#description').val('');
       $('#quantity').val('');
       $('#unit').val('');
       $('#unit_cost').val('');
       $('#discount').val('');
       $('#amount').val('');
       $('#required_by').val('');
       $('#objective').val('');
       $('#mp_no').val('');
       $('#due_date').val('');
       $('#no_po').val('');
       $('#tax_invoice').val('');
       $('#receive_date').val('');
       $('#new_hard_chrome').val('');
       $('#data_inspection').val(''); 
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function myPrint() {
  var x = document.getElementById("myDIV");
   x.style.display = "none";
    $('#printtable').show();
    $('.header').hide();
    $('#mytable').hide();
     $('#mysearch').hide();

  window.print();
  $('.header').show();
  $('#mytable').show();
      $('#mysearch').show();
  $('#printtable').hide();

}


</script>



<!-- for print table -->
<div style="padding-left: 20px;">
<table id="printtable" border="1px solid" align="right"  >
<thead>
    <tr>
<th  style="text-align: center;background-color: #026AB7;color: white;">Req Nbr</th><!-- 
<th style="text-align: center;background-color: #026AB7;color: white;">Quotation<br> No.</th> -->
<th style="text-align: center;background-color: #026AB7;color: white;">RFQ NO.</th>


<th  style="text-align: center;background-color: #026AB7;color: white;">วันที่ออก<br> PR</th>
<th style="text-align: center;background-color: #026AB7;color: white;"> No.</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Part No.<br> (QAD)</th>
<!-- 
<th  style="text-align: center;background-color: #026AB7;color: white;">Description</th> -->
<th style="text-align: center;background-color: #026AB7;color: white;">Q'TY</th>
<th style="text-align: center;background-color: #026AB7;color: white;">UNIT</th>

<th style="text-align: center;background-color: #026AB7;color: white;">Unit<br> Cost</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Discount</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Amount</th>

<th style="text-align: center;background-color: #026AB7;color: white;">Required By</th>
 <!-- <th style="text-align: center;background-color: #026AB7;color: white;">Objective</th> -->
<th style="text-align: center;background-color: #026AB7;color: white;">MP No.</th>
<th style="text-align: center;background-color: #026AB7;color: white;">Due <br>Date</th><!-- 
<th style="text-align: center;background-color: #026AB7;color: white;width:20px;">No. PO</th> --><!-- 
<th style="text-align: center;background-color: #026AB7;color: white;">TAX Invoice </th> -->
<th style="text-align: center;background-color: #026AB7;color: white;">Receive </th>
<th style="text-align: center;background-color: #026AB7;color: white;">New /<br> Hard <br>Chrome</th><!-- 
<th style="text-align: center;background-color: #026AB7;color: white;">Data Inspection</th> -->
</tr>
    
</thead>          
<tbody> 
 <?php  foreach($Molds as $Mold){?>   
 <tr> 
    <td><?php echo $Mold->req_num;?></td>  
    <td><u><a href="" data-toggle="modal" class="open-quatation"   data-req_num_data="<?php echo $Mold->req_num;?>" data-fileupload="<?php echo $Mold->fileupload;?> "  >
        <?php echo $Mold->quatation_no;?></a></u><!-- 
        <br><br>
        File : <?php echo $Mold->fileupload;?>  -->
    </td> 
    <td><?php echo $Mold->rfq_no;?></td> 
    <td><?php echo $Mold->pr;?></td> <!-- 
    <td><?php echo $Mold->no;?></td>  -->
    <td><?php echo $Mold->part_no;?></td> 
<!--     <td><?php echo $Mold->description;?></td>  -->
    <td><?php echo $Mold->quantity;?></td> 
    <td><?php echo $Mold->unit;?></td> 
    <td><?php echo $Mold->unit_cost;?></td> 
    <td><?php echo $Mold->discount;?></td> 
    <td><?php echo $Mold->amount;?></td> 
    <td><?php echo $Mold->required_by;?></td> 
<!--     <td><?php echo $Mold->objective;?></td>  -->
    <td><?php echo $Mold->mp_no;?></td> 
    <td><?php echo $Mold->due_date;?></td> 
    <!-- <td>
      <u><a href="" data-toggle="modal" class="open-no_po"   data-req_num_data="<?php echo $Mold->req_num;?>"   data-fileupload_no_po="<?php echo $Mold->fileupload_no_po;?> "  >
         <?php echo $Mold->no_po;?></a></u>
      <br><br>
        File : <?php echo $Mold->fileupload_no_po;?>  -->
   <!--   </td> -->   
<!--     <td><?php echo $Mold->tax_invoice;?></td>  -->
    <td><?php echo $Mold->receive_date;?></td> 
    <td><?php echo $Mold->new_hard_chrome;?></td> 
    <!-- <td>  <?php echo $Mold->data_inspection;?>
        <br>
        <u><a href="" data-toggle="modal" class="open-data_inspection"   data-req_num_data="<?php echo $Mold->req_num;?>"   data-fileupload_data_inspection="<?php echo $Mold->fileupload_data_inspection;?> "  >
         Upload</a></u>
    </td>  --> 
 </tr> 
 <?php } ?>
 </table>
</div>
<!-- for print table -->



<div id="myDIV" style="display: none;background: #f6f6f6;">
        <?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Mold'); ?> 
                                <table > 
                     <tr>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4" > Req No:<br>
  <input type="text" id="req_num" name="req_num" value=""></div>  
    <div class="col-sm-4" > Quotation No.:<br>
  <input type="text" id="quatation_no" name="quatation_no" value=""></div>
    <div class="col-sm-4"> RFQ NO.:<br>
  <input type="text" id="rfq_no"  name="rfq_no" value=""></div>
  <div class="col-sm-4"> วันที่ออก PR   :<br>
  <input type="date" id="pr" name="pr"  value=""></div>
  <div class="col-sm-4"> No.:<br>
  <input type="text" id="no" name="no" value=""></div>
  <div class="col-sm-4"> Part No. (QAD):<br>
  <input type="text" id="part_no" name="part_no" value=""></div>
  <div class="col-sm-4"> Description:<br>
  <textarea id="description" name="description" ></textarea></div>
  <div class="col-sm-4"> Q'TY   :<br>
  <input type="text" id="quantity" name="quantity" value=""></div>
  <div class="col-sm-4"> UNIT:<br>
  <input type="text" id="unit" name="unit" value=""></div>
  <div class="col-sm-4"> Unit Cost:<br>
  <input type="text" id="unit_cost" name="unit_cost" value=""></div>
  <div class="col-sm-4"> Discount:<br>
  <input type="text" id="discount" name="discount" value=""></div>
  <div class="col-sm-4"> Amount:<br>
  <input type="text" id="amount" name="amount" value=""></div>
  <div class="col-sm-4"> Required By:<br>
  <input type="text" id="required_by" name="required_by" value=""></div>
  <div class="col-sm-4"> Objective:<br>
  <input type="text" id="objective" name="objective" value=""></div>
  <div class="col-sm-4"> MP No.:<br>
  <input type="text" id="mp_no" name="mp_no" value=""></div>
  <div class="col-sm-4"> Due Date:<br>
  <input type="date" id="due_date" name="due_date" value=""></div>
  <div class="col-sm-4"> No. PO:<br>
  <input type="text" id="no_po" name="no_po"  value=""></div>
  <div class="col-sm-4"> TAX Invoice:<br>
  <input type="text" id="tax_invoice"  name="tax_invoice" value=""></div>
   <div class="col-sm-4"> Receive:<br>
  <input type="date" id="receive_date"  name="receive_date" value=""></div>
  <div class="col-sm-4"> New / Hard Chrome:<br>
  
  <select  id="new_hard_chrome"  name="new_hard_chrome" >
      <option>New</option>
      <option>Hard Chrome</option>
      <option>Repair</option>
  </select>
</div>
  <div class="col-sm-4"> Data Inspection ( Scan ):<br>
  <input type="text" id="data_inspection"  name="data_inspection" value=""></div> 
   <input class="btn btn-primary  button button2" name="savedata" type="button" onclick="submit()" value="Save"/>
  </div>
</div> 
       
</table> 
<?php echo form_close(); ?>
</div>

<!-- <script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script> -->

    <div class="modal fade" id="myModal" role="dialog" data-target="#exampleModal">
    <div class="modal-dialog">
       <div class="modal-content" style="width: 155%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Mold identification system</h4>
        </div>
        <div class="modal-body">
         
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
                                <!-- <div style="margin: 5px 0px 0px -23px;">
                                <span class="dot"></span><div style="margin: -23px 0px 0px 51px;">Mold running in machine</div>
                                        <span class="dot1"></span><div style="margin: -23px 0px 0px 51px;">Mold standby</div>
                                        </div> -->
                                    </div>
                                </section>
                                </div>
                        </div>              
                </section>
            </div>      
        </section>

        
        