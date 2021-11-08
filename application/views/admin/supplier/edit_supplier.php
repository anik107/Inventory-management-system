<?php include('header.php'); ?>

        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">

              <div class="page-title">
                <div class="title_left">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>     
                    <li class="active">Update Supplier</li>
                  </ol>
                </div>
              </div>

                 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Supplier</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <!-- <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left"> -->
                  <?php $attributes=array('class'=>'form-horizontal form-label-left'); ?>
                  <?php echo form_open("supplier/update_supplier/{$supplier->supplier_id}", $attributes); ?>
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Name <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'company_name', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('company_name', $supplier->company_name)])?> 
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Supplier Name <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'supplier_name', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('supplier_name', $supplier->supplier_name)])?> 
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'address', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('address', $supplier->address)])?> 
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Email<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'email', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('email', $supplier->email)])?> 
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contact Number <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'contact_no', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('contact_no', $supplier->contact_no)])?> 
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                      </div>

                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
         </div>
      </div>
    </div>


<?php include('footer.php'); ?>