<?php include('header.php'); ?>

        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">

              <div class="page-title">
                <div class="title_left">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>     
                    <li class="active">Purchase Product</li>
                  </ol>
                </div>
              </div>

                 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Purchase Product</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                  

                  <!-- Add Brand Modal Start -->
<?php echo form_open_multipart('purchase/add_product'); ?>

                  

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Bill Number</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="bill_no" class="form-control" id="inputSuccess3" placeholder="Bill Number" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                        <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target=".bs-example-modal"><i class="glyphicon glyphicon-plus-sign"></i> New Supplier</button>

                        <br><br><br>

                      
                        <label for="productImage" class="col-sm-2 control-label">Product Image </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <!-- the avatar markup -->
                          <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>              
                          <div class="kv-avatar center-block">
                          <?php echo form_upload(['name'=>'img_path', 'class'=>'form-control', 'id'=>'inputEmail', 'type'=>'text']); ?>
                          <?php if(isset($upload_error)) echo $upload_error; ?>                  
                          </div>
                          
                        </div>
                     

                        <!-- <div class="form-group"> -->
                          <label class="control-label col-md-2 col-sm-2 col-xs-12">Select Supplier</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="form-control" name="supplier_id" required="required" id="supplier">
                              <option>Select Supplier</option>

                              <?php 
                              foreach($suppliers as $suppliers)
                              { ?>
                                 <option value="<?php echo $suppliers->supplier_id; ?>"><?php echo $suppliers->supplier_name?></option>;
                              }
                              <?php } ?>

                            </select>
                          </div>
                        <!-- </div> -->

                          <br><br><br>


                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Product Name</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="form-control" name="product_id" required="required" id="product" disabled="">
                              <option>Select Product</option>
                              
                            </select>
                          </div>


                          <label class="control-label col-md-2 col-sm-2 col-xs-12">Unit</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="form-control" name="unit_id" required="required">
                              <option></option>

                              <?php 
                              foreach($unit_name as $unit_name)
                              { ?>
                                 <option value="<?php echo $unit_name->unit_id; ?>"><?php echo $unit_name->unit_name?></option>;
                              }
                              <?php } ?>

                            </select>
                          </div>
                        
                          <br><br><br>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Buy Rate</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="buy_rate" class="form-control" placeholder="Buy Rate" required="required" id="buy_rate">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Sales Rate</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="sales_rate" class="form-control" placeholder="Sales Rate" required="required" id="sales_rate">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>
                        <br><br><br>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Quantity</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Product Quantity" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                      
                        <!-- <div class="form-group"> -->
                          <label class="control-label col-md-2 col-sm-2 col-xs-12">Product Status</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="form-control" name="status" required="required">
                              <option></option>

                              <?php 
                              foreach($product_status as $status)
                              { ?>
                                 <option value="<?php echo $status->active; ?>"><?php echo $status->status?></option>;
                              }
                              <?php } ?>

                            </select>
                          </div><br><br>
                        <hr>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Total</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" readonly="readonly" name="total" class="form-control" id="total" placeholder="Total Amount" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                        

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Payment</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="payment" class="form-control" id="payment" placeholder="Payment" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>
                        <br><br><br>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Due</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="due" readonly="readonly" class="form-control" id="due" placeholder="Due Amount" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>
                        
                         <label class="control-label col-md-2 col-sm-2 col-xs-12">Description</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="description" class="form-control" id="inputSuccess3" placeholder="Description" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                        <br><br><br>
                        
                        <div class="modal-footer">
                          <button class="btn btn-success" onclick="calculate()">Calculate</button>
                          <button type="submit" class="btn btn-success">Save changes</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          
                        </div>

                      </div>
                    </div>
                  </div>
<!-- Brand Modal Close -->
 <?php echo form_close(); ?>

 <?php echo form_open('supplier/new_supplier'); ?>

                  <div class="modal fade bs-example-modal" tabindex="-1" role="dialog" aria-hidden="true" id="SimpleModalBox">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">

                        <div class="modal-header">
                          <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button> -->
                          <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-plus-sign"></i>New Supplier</h4>
                        </div>
                        <div class="modal-body" id="TheBodyContent">


                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Company Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                          <input type="text" name="company_name" class="form-control" id="inputSuccess3" placeholder="Company Name" required="required">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <br><br><br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                          <input type="text" name="supplier_name" class="form-control" id="inputSuccess3" placeholder="Supplier Name" required="required">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <br><br><br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                        <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                          <input type="text" name="address" class="form-control" id="inputSuccess3" placeholder="Supplier Address" required="required">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <br><br><br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                        <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                          <input type="text" name="email" class="form-control" id="inputSuccess3" placeholder="Supplier Email" required="required">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <br><br><br>

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number</label>
                        <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                          <input type="text" name="contact_no" class="form-control" id="inputSuccess3" placeholder="Contact Number" required="required">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <br><br><br>

                        
                        </div>
                        <div class="modal-footer">
                          
                          <button type="submit" class="btn btn-success" >Save changes</button>
                        </div>

                      </div>
                    </div>
                  </div>
<!-- Brand Modal Close -->
 <?php echo form_close(); ?>

                  </div>
                </div>
              </div>
            </div>
         </div>
      </div>
    </div>

<script type="text/javascript">
  function calculate(){

  var buy_rate = parseInt(document.getElementById('buy_rate').value);
  var quantity = parseInt(document.getElementById('quantity').value);
  var payment = parseInt(document.getElementById('payment').value);
 
  var rate=parseInt(buy_rate);
  var qty=parseInt(quantity);
  var pymt=parseInt(payment);
  
  var total=(buy_rate*qty).toFixed(2);
  var due=(total-payment).toFixed(2);
  
  document.getElementById('total').value = total;
  document.getElementById('due').value = due;
  
}
</script>
</script>    


<?php include('footer.php'); ?>