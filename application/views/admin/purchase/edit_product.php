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
                  <?php echo form_open_multipart("purchase/update_Product/{$product->purchase_id}", $attributes); ?>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Image <span class="required"></span></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                  <?php if(!is_null($product->img_path)): ?>
                      <img src="<?= $product->img_path ?>" alt="" height="150px" width="150px">
                  <?php endif; ?>
                   </div>
                  </div>



                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Change Product Image <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_upload(['name'=>'img_path', 'class'=>'form-control', 'id'=>'inputEmail', 'type'=>'text']); ?>
                          <?php if(isset($upload_error)) echo $upload_error; ?>  
                        </div>
                      </div>
                        

                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Supplier</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="supplier_id" required="required" id="supplier">
                              <option value="<?php echo $product->supplier_id; ?>"><?php echo $product->supplier_name; ?></option>

                              <?php 
                              foreach($suppliers as $suppliers)
                              { ?>
                                 <option value="<?php echo $suppliers->supplier_id; ?>"><?php echo $suppliers->supplier_name?></option>;
                              }
                              <?php } ?>

                            </select>
                          </div>
                        </div>

                     
                     <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Product Name</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="product_id" required="required" id="product">
                              <option value="<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?></option>
                            </select>
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Unit</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="unit_id" required="required">
                              <option value="<?php echo $product->unit_id; ?>"><?php echo $product->unit_name; ?></option>

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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Rate <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'buy_rate', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('buy_rate', $product->buy_rate)])?> 
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Quantity <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'quantity', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('quantity', $product->quantity)])?> 
                        </div>
                      </div>

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select class="form-control col-md-7 col-xs-12" name="status">
                              <option value="<?php echo $product->active; ?>"><?php echo $product->status ?></option>

                              <?php 
                              foreach($product_status as $status)
                              { ?>
                                 <option value="<?php echo $status->active; ?>"><?php echo $status->status?></option>;
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