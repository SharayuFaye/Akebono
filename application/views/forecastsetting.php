<?php error_reporting(0);?> 


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
                       <!--  <h2>Responsive Tables</h2>  -->
                    
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
                        
                                        <h2 class="card-title" style="color: black;">Forecast Setting</h2>
                                      <!--   <div style="text-align: right;margin: -26px 75px 26px -4px;color: #008000;">Green:Running</div>
                                        <div style="text-align: right;margin: -30px 54px 7px 2px;color: black">Black:Not Running</div>  -->

 <?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Forecastsetting'); ?>                      
  <div class="row"> 
       <div class="col-sm-4" style="    margin: 31px -276px -12px 3px;">   
        <select name="year" class="chosen" style="width: 90px;height: 36px;">
          <option>Select Year</option>
          <option>2019</option>
          <option>2018</option>
          <option>2017</option>
          <option>2016</option>
          <option>2015</option>
          <option>2014</option>
          <option>2013</option>
          <option>2012</option>
          <option>2011</option>
          <option>2010</option>
          <option>2009</option>
          <option>2008</option>
          <option>2007</option>
          <option>2006</option>
          <option>2005</option>
          <option>2004</option>
          <option>2003</option>
          <option>2002</option>
          <option>2001</option>
          <option>2000</option>
        </select>
      </div>

 <script type="text/javascript">
      $(".chosen").chosen();
</script>

         <div class="col-sm-8" style="    margin: 23px 16px -12px -16px;">   
             <input class="btn btn-primary  button button2" name="searchdisplay" type="submit" value="Search & Display"/>
              <input class="btn btn-primary  button button2" name="removeall" type="submit" value="Remove All"/>

 <?php echo form_close(); ?>                                                              
                                    </header>

                                    <div class="card-body">

                                          <!--  <button onclick="TargetFunction()" class="button button2">Add Target</button>
 <div id="TargetDIV" style="display: none;background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Forecastsetting'); ?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-4" >X : 
  <input type="number" name="x" value="<?php echo $targets['x'];?>"></div>
    <div class="col-sm-4"> Y : 
  <input type="number" name="y" value="<?php echo $targets['y'];?>"></div> 
   <button class="button button2" name="save" type="submit" >Save</button>
  </div>
</div> 
 <?php echo form_close(); ?>
</div> -->

 

<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0">
    <thead>
        <tr>
            <th  style="text-align: center;background-color: #026AB7; color: white;">Model</th>
           <th  style="text-align: center;background-color: #026AB7; color: white;">Mold</th>
            <th  style="text-align: center;background-color: #026AB7; color: white;">Year</th>
             
            <th  style="text-align: center;background-color: #026AB7; color: white;">Jan</th>
            <th style="text-align: center;background-color: #026AB7; color: white;">Feb</th>
            <th style="text-align: center;background-color: #026AB7; color: white;">Mar</th>

            <th  style="text-align: center;background-color: #026AB7; color: white;">Apr</th>
            <th style="text-align: center;background-color: #026AB7; color: white;">May</th>
            <th style="text-align: center;background-color: #026AB7; color: white;">Jun</th>

            <th  style="text-align: center;background-color: #026AB7; color: white;">Jul</th>
            <th style="text-align: center;background-color: #026AB7; color: white;">Aug</th>
            <th style="text-align: center;background-color: #026AB7;color: white;">Sep</th>

            <th  style="text-align: center;background-color: #026AB7;color: white;">Oct</th>
            <th style="text-align: center;background-color: #026AB7;color: white;">Nov</th>
            <th style="text-align: center;background-color: #026AB7;color: white;">Dec</th>
            
        </tr>
            
    </thead>
    <tbody> 
               <?php $i=1; 
               $tot_die=0;
               $tot_hard=0;
               foreach($Forecastsettings as $Forecastsetting){?>   
                          <tr> 
                                <td><?php echo $Forecastsetting->mold_item;?></td>
                                <td><?php echo $Forecastsetting->mold ;?></td>
                                <!-- <td>2018 </a></td>
                                <td>Forecast</td> -->
                
                 <td ><?php echo $Forecastsetting->year;?> </td>
                                <td ><?php echo $a1=$Forecastsetting->jan;?> </td>
                                <td ><?php echo $a2=$Forecastsetting->feb;?> </td>
                                <td ><?php echo $a3=$Forecastsetting->mar;?> </td>
                                <td ><?php echo $a4=$Forecastsetting->apr;?> </td>
                                <td ><?php echo $a5=$Forecastsetting->may;?> </td>
                                <td ><?php echo $a6=$Forecastsetting->jun;?> </span></td>
                                <td ><?php echo $a7=$Forecastsetting->jul;?> </span></td> 
                                <td ><?php echo $a8=$Forecastsetting->aug;?> </span></td>
                                <td ><?php echo $a9=$Forecastsetting->sep;?> </span></td>
                                <td ><?php echo $a10=$Forecastsetting->oct;?> </span></td>
                                <td ><?php echo $a11=$Forecastsetting->nov;?> </span></td>
                                <td ><?php echo $a12=$Forecastsetting->dec;?> </span></td>
                                <!-- <td ><?php echo  $Forecastsetting->sum;?> </span></td>
                                <td ><?php echo  $Forecastsetting->cost;?> </span></td>
                                <td ><?php echo  $Forecastsetting->cost1;?> </span></td>  -->
                                
                          </a>    </tr> 
                 <!-- <?php   foreach($status_mold as $status_mold){
                  $b1='0';$b2='0'; $b3='0';$b4='0';$b5='0';$b6='0'; $b7='0';$b8='0';
                      $b9='0'; $b10='0';$b11='0';$b12='0';
   
                
                  if($status_mold->model == $Forecastsetting->mold_item){  

                      $month = date('F', strtotime($status_mold->time)); 
                     
                      if($month == 'January'){     $b1=$status_mold->hard_current; }  
                       
                      if($month == 'February'){   $b2=$status_mold->hard_current; }  
                       
                      if($month == 'March'){   $b3=$status_mold->hard_current; }  
                       
                      if($month == 'April'){   $b4=$status_mold->hard_current; }  
                       
                      if($month == 'May'){   $b5=$status_mold->hard_current; }  
                       
                      if($month == 'June'){   $b6=$status_mold->hard_current; }   
                        
                      if($month == 'July'){   $b7=$status_mold->hard_current; }  
                        
                      if($month == 'August'){   $b8=$status_mold->hard_current;   }   
                      
                      if($month == 'September'){   $b9=$status_mold->hard_current; }  
                        
                      if($month == 'Octomber'){   $b10=$status_mold->hard_current; }   
                      
                      if($month == 'November'){   $b11=$status_mold->hard_current; }  
                      if($month == 'December'){   $b12=$status_mold->hard_current; }   
                      }                                                                                                                                                                             
                      }  
             
                  ?>                               
                                            <tr> 
                                              <td> </td>
                                              <td> </a></td>
                                              <td>Actual</td>
                                              <td > <?php  echo $b1;?>  </td>
                                              <td >  <?php echo $b2;?> </td>
                                              <td > <?php  echo $b3;?> </td>
                                              <td > <?php echo $b4;?>  </td>
                                              <td >  <?php echo $b5;?>  </td>
                                              <td > <?php   echo $b6;?>  </td>
                                              <td > <?php echo $b7;?>  </td> 
                                              <td > <?php echo $b8;?>  </td>
                                              <td > <?php echo $b9;?> </td>
                                              <td > <?php echo $b10;?>  </td>
                                              <td > <?php echo $b11;?>  </td>
                                              <td > <?php echo $b12;?> </td>
                                              <td ><?php echo $Forecastsetting->sum;?> </span></td>
                                              <td ><?php echo $Forecastsetting->cost;?> </span></td>
                                              <td ><?php echo $Forecastsetting->cost1;?> </span></td> 
                                              
                                      </a>    </tr>          
                                             <tr>
                                                   <td>HP - <?php echo $i;?></td>
                                                    <td>Hard Chrome Set</td>
                                                    <td><?php if($Forecastsetting->x==''){ echo $x=0; }
                                                      else{ echo $x=$Forecastsetting->x; }
                                                      if($Forecastsetting->y==''){   $y=0; }
                                                      else{   $y=$Forecastsetting->y; }?>   
                                                    &nbsp;&nbsp;&nbsp;
                                                    <a data-toggle="modal" class="open-targetx"   data-mold-item="<?php echo $Forecastsetting->mold_item;?>"  data-x="<?php echo $x;?>"   data-y="<?php echo $y;?>"  ><i class="fa fa-pencil"></i></a>
                                                     </td>
                                                    <td >
                                                      <?php  
                                                        if($Forecastsetting->x=='0'){ $c1=0+$b1; }
                                                        else { $c1=$Forecastsetting->x+$b1;  }  
                                                        echo $c1;    ?> 
                                                   </td>
                                                    <td > <?php $c2=$c1+$b2; echo $c2;?></td>
                                                    <td ><?php $c3=$c2+$b3; echo $c3;?></td>
                                                    <td ><?php $c4=$c3+$b4; echo $c4;?></td>
                                                    <td > <?php $c5=$c4+$b5; echo $c5;?></td>
                                                    <td > <?php $c6=$c5+$b6; echo $c6;?></td>
                                                    <td > <?php $c7=$c6+$b7; echo $c7;?></td>
                                                    <td > <?php $c8=$c7+$b8; echo $c8;?></td>
                                                    <td > <?php $c9=$c8+$b9; echo $c9;?></td>
                                                    <td ><?php $c10=$c9+$b10; echo $c10;?></td>
                                                    <td > <?php $c11=$c10+$b11; echo $c11;?></td> 
                                                    <td > <?php $c12=$c11+$b12; echo $c12;?></td>
                                                    <td ><?php  echo $Forecastsetting->countx;?> </td>
                                                    <td ><?php   echo $tot_price_hard_chrom  =  $Forecastsetting->price_hard_chrom*$Forecastsetting->countx  ;  ?></td>
                                                    <td > </td>  
                                            </tr>  

                                             <tr>
                                                   <td> </td>
                                                    <td>Change Box Set</td>
                                                     <td><?php   echo $y;  ?> &nbsp;&nbsp;&nbsp;
                                                    <a data-toggle="modal" class="open-targety"   data-mold-item="<?php echo $Forecastsetting->mold_item;?>"  data-x="<?php echo $x;?>"   data-y="<?php echo $y;?>"  ><i class="fa fa-pencil"></i></a>  </td>
                                                    <td >
                                                    <?php if($Forecastsetting->y=='0'){ $d1=0+$b1; }
                                                        else { $d1=$Forecastsetting->y+$b1;  } 
                                                        echo $d1;    ?>
                                                      </td>
                                                    <td >   <?php   $d2=$d1+$b2; echo $d2;    ?> </td>
                                                    <td ><?php $d3=$d2+$b3; echo $d3;?></td>
                                                    <td ><?php $d4=$d3+$b4; echo $d4;?></td>
                                                    <td > <?php $d5=$d4+$b5; echo $d5;?></td>
                                                    <td > <?php $d6=$d5+$b6; echo $d6;?></td>
                                                    <td > <?php $d7=$d6+$b7; echo $d7;?></td>
                                                    <td > <?php $d8=$d7+$b8; echo $d8;?></td>
                                                    <td > <?php $d9=$d8+$b9; echo $d9;?></td>
                                                    <td ><?php $d10=$d9+$b10; echo $d10;?></td>
                                                    <td > <?php $d11=$d10+$b11; echo $d11;?></td> 
                                                    <td > <?php $d12=$d11+$b12; echo $d12;?></td>
                                                    <td > <?php echo $Forecastsetting->county;?></td>
                                                    <td > </td>
                                                    <td > <?php   echo $tot_price_die_chrom  = $Forecastsetting->price_die_change*$Forecastsetting->county  ;  ?></td>  
                                            </tr>      --> 
<?php $i++; 
$tot_hard =$tot_price_hard_chrom + $tot_hard; 
$tot_die =$tot_price_die_chrom + $tot_die; 
}?>  




                                           <!-- <tr>
                                                   <td align="right" colspan="16">Sum:  </td>
                                                    <td >Hard Chrom <br><?php echo $tot_hard ; ?> </td>
                                                    <td >Change BOx<br><?php echo $tot_die ; ?> </td>  
                                            </tr>       -->
                                            </tbody>
                                        </table>
                                         <button onclick="myFunction()" class="btn btn-primary  button button2">Add</button>

<script type="text/javascript">
    $(document).ready(function () {             
    $('.open-my-modal').click(function(){
        $('#order-id').html($(this).data('id'));
        $('#prod-id').html($(this).data('prod-id'));
        $('#sell-id').html($(this).data('sell-id'));
        $('#shot_current-id').html($(this).data('shot_current-id'));
        $('#shot_setting-id').html($(this).data('shot_setting-id'));
        $('#hard_current-id').html($(this).data('hard_current-id'));

         // show Modal
         $('#myModal').modal('show');
    });
});
</script>
<script>
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}


function TargetFunction() {
    var x = document.getElementById("TargetDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

</script>
    <div id="myDIV" style="display: none;background: #f6f6f6;">
        <?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Forecastsetting'); ?> 
                                <table > 
                     <tr>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-4" > Model:<br>
   
     <select name="mold_item" style="width: 180px;" > 
        <?php foreach($mold as $status_mold1){ 
    $data = explode(",",$status_mold1->model);    
   
    foreach($data as $data1){    ?>
        <option value="<?php echo $status_mold1->mold_setting_id ; ?>,<?php echo $data1 ; ?>"><?php echo $data1 ; ?> -> <?php echo $status_mold1->mold ; ?></option>
    <?php }} ?>
      </select>  
<!--   <input type="text" name="mold_item" value=""> --></div> 
  <input type="hidden" name="forecast" value="forecast"> 
  
  <div class="col-sm-4" > Year:<br>
  <input type="text" name="year" value=""></div> 
  
  
    <div class="col-sm-4" > Jan:<br>
  <input type="text" name="jan" value=""></div>
    <div class="col-sm-4"> Feb:<br>
  <input type="text" name="feb" value=""></div>
  <div class="col-sm-4"> Mar:<br>
  <input type="text" name="mar" value=""></div>
  <div class="col-sm-4"> Apr:<br>
  <input type="text" name="apr" value=""></div>
  <div class="col-sm-4"> May:<br>
  <input type="text" name="may" value=""></div>
  <div class="col-sm-4"> Jun:<br>
  <input type="text" name="jun" value=""></div>
  <div class="col-sm-4"> Jul:<br>
  <input type="text" name="jul" value=""></div>
  <div class="col-sm-4"> Aug:<br>
  <input type="text" name="aug" value=""></div>
  <div class="col-sm-4"> Sep:<br>
  <input type="text" name="sep" value=""></div>
  <div class="col-sm-4"> Oct:<br>
  <input type="text" name="oct" value=""></div>
  <div class="col-sm-4"> Nov:<br>
  <input type="text" name="nov" value=""></div>
  <div class="col-sm-4"> Dec:<br>
  <input type="text" name="dec" value=""></div>
   <input class="btn btn-primary  button button2" name="savedata" type="submit" value="Save"/>
  </div>
</div> 
                                        </tr>
                       
                </table> 
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





<script type="text/javascript">
    $(document).ready(function () {             
    $('.open-targetx').click(function(){ 
        $('#mold-item').val($(this).data('mold-item'));
        $('#x').val($(this).data('x'));  
        $('#y').val($(this).data('y'));  
         $('#TargetX').modal('show');
    });
});
</script>
  <div class="modal fade" id="TargetX" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 105%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Target Hard Chrome Set</h4>
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style=" background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Forecastsetting'); ?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
      X : 
  <input type="text" name="x" id="x"  > 
  <input type="hidden" name="mold_item" id="mold-item"  > 
 <input type="hidden" name="y" id="y"  > 
   <input class="button button2" name="saveX" type="submit" value="Save">
  </div>
</div> 
 <?php echo form_close(); ?>
</div>
        </div>
         <div class="row">
    
         </div>
    
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
      </div></div>                                          
</div>



<script type="text/javascript">
    $(document).ready(function () {             
    $('.open-targety').click(function(){ 
        $('#mold-item1').val($(this).data('mold-item'));
        $('#x1').val($(this).data('x'));  
        $('#y1').val($(this).data('y'));  
         $('#Targety').modal('show');
    });
});
</script>
  <div class="modal fade" id="Targety" role="dialog"  >
    <div class="modal-dialog">
       <div class="modal-content" style="width: 105%;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">&times;</button>
          <h4 class="modal-title" style="margin-right: 263px;">Target Change Box Set</h4>
        </div>
        <div class="modal-body">
          <div id="TargetDIV" style=" background: #f6f6f6;">
<?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/Forecastsetting'); ?> 
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" >
      Y : 
  <input type="hidden" name="x" id="x1"  > 
  <input type="hidden" name="mold_item" id="mold-item1"  > 
 <input type="text" name="y" id="y1"  > 
   <input class="button button2" name="saveY" type="submit" value="Save">
  </div>
</div> 
 <?php echo form_close(); ?>
</div>
        </div>
         <div class="row">
    
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

        
        