<?php include('public_header.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
      #back
      {
        
        background:url('register.jpg');
        opacity:.9;
        background-size: 100%;
      }
    </style>
</head>

<body id="back">
    
<div class="container">
  <div class="row">
    <h1  class="mt-3" style="text-align:center;">Sign up</h1>
    <div class="col-lg-6 m-auto">
      <div class="card mt-5 bg-dark">
        <div class="card-body">

       
         <?php echo form_open('register/admin_registration') ?>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                 <span class="input-group-text">
                  <i class="fa fa-user fa-2x"> </i>
                 </span>
              </div>
              <input type="text" name="username" class="form-control py-2" placeholder="User Name"
              value="<?php echo set_value('username'); ?>" required/>
             
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                 <span class="input-group-text">
                  <i class="fa fa-comments fa-2x"> </i>
                 </span>
              </div>
              <input type="text" name="email" class="form-control py-2" placeholder="Email"
              value="<?php echo set_value('email'); ?>" required unique/>
             
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                 <span class="input-group-text">
                  <i class="fa fa-lock fa-2x"> </i>
                 </span>
              </div>
              <input type="password" name="password" class="form-control py-2" placeholder="Password"
              value="<?php echo set_value('password'); ?>" required/> 
             
            </div>
             <?php echo 
                          
                  form_submit(['name'=>'submit', 'class'=>'btn btn-success col-lg-8', 'value'=>'Register', 'type'=>'submit']);
              ?>          
            <a href="<?php echo base_url('login') ?>" class="btn btn-danger col-lg-3" style="float:right"> Cancel </a>      
           <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
  
</div>
    
</body>
</html>