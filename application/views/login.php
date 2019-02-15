<!doctype html>
<html class="fixed">
  <head>

    <!-- Basic -->
    <meta charset="UTF-8">

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

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">

    <!-- Head Libs -->
    <script src="<?php echo base_url();?>vendor/modernizr/modernizr.js"></script>

  </head>
  <body>
    <!-- start: page -->
    <section class="body-sign">
      <div class="center-sign">
        <a href="<?php echo base_url();?>" class="logo">
            <img src="<?php echo base_url(); ?>img/logoA.png" width="200" height="45" alt="Porto Admin" />
          </a>

        <div class="panel card-sign">
          <div class="card-title-sign mt-3 text-right">
            <h2 class="title text-uppercase font-weight-bold m-0"><i class="fa fa-user mr-1"></i> Sign In</h2>
          </div>
          <div class="card-body">
         <?php $this->load->helper('form');?>
   <?php echo form_open('Welcome/login'); ?> 
              <div class="form-group mb-3">
                <label>Username</label>
                <div class="input-group input-group-icon">
                  <input name="username" type="text" class="form-control form-control-lg" />
                  <span class="input-group-addon">
                    <span class="icon icon-lg">
                      <i class="fa fa-user"></i>
                    </span>
                  </span>
                </div>
              </div>

              <div class="form-group mb-3">
                <div class="clearfix">
                  <label class="float-left">Password</label>
                  <!-- <a href="pages-recover-password.html" class="float-right">Lost Password?</a> -->
                </div>
                <div class="input-group input-group-icon">
                  <input name="password" type="password" class="form-control form-control-lg" />
                  <span class="input-group-addon">
                    <span class="icon icon-lg">
                      <i class="fa fa-lock"></i>
                    </span>
                  </span>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-8">
                  <!-- <div class="checkbox-custom checkbox-default">
                    <input id="RememberMe" name="rememberme" type="checkbox"/>
                    <label for="RememberMe">Remember Me</label>
                  </div>
                </div> -->
                <div class="col-sm-4 text-right">
                  <button type="submit" class="btn btn-primary mt-2">Sign In</button>
                </div>
              </div>

              

              <!-- <div class="mb-1 text-center">
                <a class="btn btn-facebook mb-3 ml-1 mr-1" href="#">Connect with <i class="fa fa-facebook"></i></a>
                <a class="btn btn-twitter mb-3 ml-1 mr-1" href="#">Connect with <i class="fa fa-twitter"></i></a>
              </div> -->

              <!-- <p class="text-center">Don't have an account yet? <a href="pages-signup.html">Sign Up!</a></p>
 -->
              <?php echo form_close(); ?>



              <div style="color: orange;padding: 1%;font-size: 2vw;">
    <?php
        echo "<div class='error_msg'>";
      if (isset($error_message)) {
        echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
    ?>
    <?php
    if (isset($message_display)) {
    echo "<div class='message'>";
    echo $message_display;
    echo "</div>";
  }
  ?>
 
    </div>


          </div>
        </div>

        <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2017. All Rights Reserved.</p>
      </div>
    </section>
    <!-- end: page -->

    <!-- Vendor -->
    <script src="<?php echo base_url();?>vendor/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="<?php echo base_url();?>vendor/popper/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>vendor/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>vendor/common/common.js"></script>
    <script src="<?php echo base_url();?>vendor/nanoscroller/nanoscroller.js"></script>
    <script src="<?php echo base_url();?>vendor/magnific-popup/jquery.magnific-popup.js"></script>
    <script src="<?php echo base_url();?>vendor/jquery-placeholder/jquery-placeholder.js"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="<?php echo base_url();?>js/theme.js"></script>
    
    <!-- Theme Custom -->
    <script src="<?php echo base_url();?>js/custom.js"></script>
    
    <!-- Theme Initialization Files -->
    <script src="<?php echo base_url();?>js/theme.init.js"></script>

  </body>
</html>