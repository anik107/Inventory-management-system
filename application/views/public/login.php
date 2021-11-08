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
        
        background:url('login.jpg');
        opacity:.9;
        background-size: 100%;
      }
    </style>
</head>

<body id="back">
    
<div class="container">
  <div class="row">
    <h1  class="mt-3" style="text-align:center;">User Login</h1>
    <div class="col-lg-6 m-auto">
      <div class="card mt-5 bg-dark">
        <div class="card-title text-center mt-3">
          <img src="human.png" height="150px" width="150px">
        </div>
        <div class="card-body">
                    <?php echo form_open('login/admin_login') ?>
                      <?php if($error = $this->session->flashdata('login_failed')): ?>
                        <div class="alert alert-dismissible alert-danger">
                          <?php echo $error; ?>
                        </div>
                      <?php endif; ?>
          <!-- <form method="post"> -->
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                 <span class="input-group-text">
                  <i class="fa fa-user fa-2x"> </i>
                 </span>
              </div>
              <!-- <input type="text" class="form-control py-2" placeholder="User Name">-->
              <?php echo form_input(['name'=>'username', 'class'=>'form-control py-2', 'id'=>'name', 'type'=>'text','required'=>'required' , 'placeholder'=>'User name']); ?>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                 <span class="input-group-text">
                  <i class="fa fa-lock fa-2x"> </i>
                 </span>
              </div>
              <!-- <input type="password" class="form-control py-2" placeholder="Password"> -->
              <?php 

                            $password=array(

                              'name' =>'password',
                              'class'=>'form-control py-2',
                              'type'=>'password',
                              'required'=>'required',
                              'placeholder'=>'Password'
                              );
                            ?>
                            <?php echo form_input($password); ?>
            </div>
            <!-- <button class="btn btn-success col-lg-12"> Login Now </button> -->
             <?php echo 
                          
                  form_submit(['name'=>'submit', 'class'=>'btn btn-success col-lg-5', 'value'=>'Login', 'type'=>'submit']);
              ?>
              <a href="<?php echo base_url('register') ?>" class="btn btn-danger col-lg-5" style="float:right"> Register </a>
          <!-- </form>-->
          <?php echo form_close(); ?>

        </div>
      </div>
    </div>
  </div>
  
</div>
    
</body>
</html>