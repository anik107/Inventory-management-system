<?php include('header.php'); ?>

        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">

              <div class="page-title">
                <div class="title_left">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>     
                    <li class="active">Update Product</li>
                  </ol>
                </div>
              </div>

                 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Product</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                  

                  <?php $attributes=array('class'=>'form-horizontal form-label-left'); ?>
                  <?php echo form_open("supplier/update_product/{$supplier->product_id}", $attributes); ?>
                     

                     <div class="form-group">
                        <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required"></span> -->
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['type'=>'hidden', 'name'=>'s_id', 'class'=>'form-control col-md-7 col-xs-12', 'value'=>set_value('s_id', $supplier->s_id)])?> 
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'product_name', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('product_name', $supplier->product_name)])?> 
                        </div>
                      </div>

                     
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Unit</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="u_id" required="required">
                              <option value="<?php echo $supplier->unit_id; ?>"><?php echo $supplier->unit_name?></option>

                              <?php 
                              foreach($unit_name as $unit_name)
                              { ?>
                                 <option value="<?php echo $unit_name->unit_id; ?>"><?php echo $unit_name->unit_name?></option>;
                              }
                              <?php } ?>

                            </select>
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