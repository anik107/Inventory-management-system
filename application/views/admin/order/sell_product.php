<?php include('header.php'); ?>

        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">

              <div class="page-title">
                <div class="title_left">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>     
                    <li class="active">Sell Product</li>
                  </ol>
                </div>
              </div>

                 <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sell Product</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                  <?php $attributes=array('class'=>'form-horizontal form-label-left'); ?>
                  <?php echo form_open_multipart("order/sells_Product/{$product->purchase_id}", $attributes); ?>

                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Product Image <span class="required"></span></label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                  <?php if(!is_null($product->img_path)): ?>
                      <img src="<?= $product->img_path ?>" alt="" height="150px" width="150px">
                  <?php endif; ?>
                   </div>
                  </div>


                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Bill Number</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="bill_no" class="form-control" id="inputSuccess3" placeholder="Bill Number" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>
                        

                      <!-- <div class="form-group"> -->
                         <label class="control-label col-md-2 col-sm-2 col-xs-12">Select Customer</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="form-control" name="customer_id" required="required" id="supplier">
                              <option></option>

                              <?php 
                              foreach($customer as $customer)
                              { ?>
                                 <option value="<?php echo $customer->customer_id; ?>"><?php echo $customer->customer_name?></option>;
                              }
                              <?php } ?>

                            </select>
                          </div>
                        <!-- </div> -->
                        <br><br><br>

                        
                        
                          <?php echo form_input(['type'=>'hidden', 'name'=>'p_id', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('purchase_id', $product->purchase_id)])?> 
                        



                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Product Name <span class="required"></span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'product', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('product_name', $product->product_name)])?> 
                        </div>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Brand Name <span class="required"></span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'brand', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('brand_name', $product->brand_name)])?> 
                        </div>

                        <br><br><br>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Category Name <span class="required"></span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'category', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('categories_name', $product->categories_name)])?> 
                        </div>


                        <!-- <div class="form-group"> -->
                          <label class="control-label col-md-2 col-sm-2 col-xs-12">Unit</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
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
                        <!-- </div> -->
                        <br><br><br>


                       <!-- <div class="form-group"> -->
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Buy Rate <span class="required"></span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'readonly'=>'readonly', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('buy_rate', $product->buy_rate)])?> 
                        </div>
                      <!-- </div> -->

                      <!-- <div class="form-group"> -->
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Sells Rate <span class="required"></span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'name'=>'rate', 'id'=>'sales_rate', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('sales_rate', $product->sales_rate)])?> 
                        </div>
                      <!-- </div> -->
                      <br><br><br>

                      <label class="control-label col-md-2 col-sm-2 col-xs-12">Quantity</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Product Quantity" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                       

                       <!-- <div class="form-group"> -->
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Available Quantity
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?php echo form_input(['type'=>'text', 'readonly'=>'readonly', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'id'=>'avl_quantity', 'value'=>set_value('quantity', $product->quantity)])?> 
                        </div>


                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <?php echo form_input(['type'=>'hidden', 'name'=>'purchase_quantity', 'readonly'=>'readonly', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'id'=>'purchase_quantity'])?> 
                        </div>
                      <!-- </div> -->
                      <br><br><br>
                      

                      <!-- <div class="form-group"> -->
                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Status <span class="required"></span>
                        </label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                           <select class="form-control col-md-7 col-xs-12" name="order_status">
                              <option value="<?php echo $product->active; ?>"><?php echo $product->status ?></option>

                              <?php 
                              foreach($product_status as $status)
                              { ?>
                                 <option value="<?php echo $status->active; ?>"><?php echo $status->status?></option>;
                              }
                              <?php } ?>

                            </select>
                        </div>
                      <!-- </div> -->
                      <br><br><br>
                       <hr>
                      

                     <label class="control-label col-md-2 col-sm-2 col-xs-12">Total</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" readonly="readonly" name="total" class="form-control" id="total" placeholder="Total Amount" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>



                        <label class="control-label col-md-2 col-sm-2 col-xs-12">VAT(%)</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="vat" class="form-control" placeholder="VAT(%)" id="vat" required="required" value="0">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                        
                        <br><br><br>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Grand Total</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="grand_total" readonly="readonly" class="form-control" id="grand_total" placeholder="Grand Total" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Discount</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="discount" class="form-control" id="discount" required="required" placeholder="Discount" value="0">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                        
                        <br><br><br>


                        <hr>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Payment</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="payment" class="form-control" id="payment" placeholder="Payment" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Due</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="due" readonly="readonly" class="form-control" id="due" placeholder="Due Amount" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>
                         

                        <br><br><br>

                         <label class="control-label col-md-2 col-sm-2 col-xs-12">Description</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="description" class="form-control" id="inputSuccess3" placeholder="Description">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                        <br><br><br>
                        
                        <div class="modal-footer">
                          <button class="btn btn-success" onclick="calculate()">Calculate</button>
                          <!-- <button type="submit" class="btn btn-success">Save changes</button> -->
                          <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                          
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

  var sales_rate = parseInt(document.getElementById('sales_rate').value);
  var quantity = parseInt(document.getElementById('quantity').value);
  var avl_quantity = parseInt(document.getElementById('avl_quantity').value);
  var payment = parseInt(document.getElementById('payment').value);
  var vat = parseInt(document.getElementById('vat').value);
  var discount = parseInt(document.getElementById('discount').value);



  var rate=parseInt(sales_rate);
  var qty=parseInt(quantity);
  var avl_qty=parseInt(quantity);
  var pymt=parseInt(payment);
  var vt=parseInt(vat);
  var dcount=parseInt(discount);

  if(quantity>avl_quantity){
    alert('Product is not enough stock');
  }

  
  var purchase_quantity=(avl_quantity-quantity).toFixed(2);
  var total=(sales_rate * qty).toFixed(2);
  var vat=(total * (vt/100));
  var grand_total=(total-vat-dcount).toFixed(2);
  var due=(grand_total-payment).toFixed(2);
  
  document.getElementById('purchase_quantity').value = purchase_quantity;
  document.getElementById('total').value = total;
  document.getElementById('grand_total').value = grand_total;
  document.getElementById('due').value = due;


  
}
</script>

<?php include('footer.php'); ?>