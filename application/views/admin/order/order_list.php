<?php include('header.php'); ?>
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">

              <div class="page-title">
                <div class="title_left">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>     
                    <li class="active">Order</li>
                  </ol>
                </div>

  <?php echo form_open('order/search_order'); ?>
              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" name="query" class="form-control" required="required" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
  <?php echo form_close(); ?>
  <?php echo form_error('query', "<div class='text-danger'>", '</div>'); ?> 
            </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Manage Order </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                 

                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                          
                          <table id="datatable-keytable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SL.</th>
                                <th>Bill Number</th>
                                <th>Product</th>
                                <th>Rate</th>
                                <th>Quantity</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Vat</th>
                                <th>Discount</th>
                                <th>Total</th>
                                <th>Payment</th>
                                <th>Due</th>
                                <th>Customer</th>
                                <!-- <th>Status</th> -->
                                <th>Options</th>
                              </tr>
                            </thead>

                             <tbody>

                              <?php if(count($orders)): 
                                $count=$this->uri->segment(3, 0);
                                 foreach($orders as $product): ?>

                              <tr>
                                <td><?= ++$count; ?></td>
                                <td><?= $product->bill_no; ?></td>
                                <td><?= $product->product; ?></td>
                                <td><?= $product->rate; ?></td>
                                <td><?= $product->quantity; ?></td>
                                <td><?= $product->brand; ?></td>
                                <td><?= $product->category; ?></td>
                                <td><?= $product->vat; ?></td>
                                <td><?= $product->discount; ?></td>
                                <td><?= $product->total; ?></td>
                                <td><?= $product->payment; ?></td>
                                <td><?= $product->due; ?></td>
                                <td><?= $product->customer_name; ?></td>
                                <!-- <td><?= $product->status; ?></td> -->

                                <td>
                                 <!--  <?= anchor("order/edit_product/{$product->order_id}", '<i class="fa fa-edit"></i>', ['class'=>'btn btn-default']); ?> -->
                                <!-- </td> -->
                               
                                  <a class="btn btn-default" onclick="javascript:deleteConfirm('<?php echo base_url().'order/close_product/'.$product->order_id ?>');" deleteConfirm href="#"><i class="fa fa-trash"></i></a>

                                  <?= anchor("report/sell_report/{$product->order_id}", '<i class="fa fa-arrow-circle-down"></i>', ['class'=>'btn btn-default']); ?>
                                </td>
                              
                              </tr>

                              <?php endforeach; ?>
                              <?php else: ?>
                                <tr>
                                  <td colspan="3">No Records Found</td>
                                </tr>
                              <?php endif; ?>

                            </tbody>   
                          </table>
          <?=  $this->pagination->create_links(); ?>
                            <br> <br> <br>
                            
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


<!-- Add Brand Modal Start -->
<?php echo form_open_multipart('order/sales_product'); ?>

                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-plus-sign"></i>Sales Product</h4>
                        </div>
                        <div class="modal-body">

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Bill Number</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="bill_no" class="form-control" id="inputSuccess3" placeholder="Bill Number" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>
                       

                        <!-- <div class="form-group"> -->
                          <label class="control-label col-md-2 col-sm-2 col-xs-12">Select Customer</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="form-control" name="customer_id" required="required" id="supplier">
                              <option>Select Customer</option>

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

                           <!-- <div class="form-group"> -->
                          <label class="control-label col-md-2 col-sm-2 col-xs-12">Brand Name</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="form-control" name="brand_id" required="required" id="brand">
                              <option>Select Brand</option>

                              <?php 
                              foreach($brand_name as $brand_name)
                              { ?>
                                 <option value="<?php echo $brand_name->brand_id; ?>"><?php echo $brand_name->brand_name?></option>;
                              }
                              <?php } ?>

                            </select>
                          </div>
                        

                          <!-- <div class="form-group"> -->
                          <label class="control-label col-md-2 col-sm-2 col-xs-12">Category Name</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="form-control" name="categories_id" required="required" id="category" disabled="">
                              <option>Select Category</option>
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

                       

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Sales Rate</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="rate" class="form-control" placeholder="Sales Rate" required="required" id="sales_rate">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>
                        

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Quantity</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Product Quantity" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>

                        <br><br><br>



                        <!-- <div class="form-group"> -->
                          <label class="control-label col-md-2 col-sm-2 col-xs-12">Product Status</label>
                          <div class="col-md-4 col-sm-4 col-xs-12">
                            <select class="form-control" name="order_status" required="required">
                              <option></option>

                              <?php 
                              foreach($product_status as $status)
                              { ?>
                                 <option value="<?php echo $status->active; ?>"><?php echo $status->status?></option>;
                              }
                              <?php } ?>

                            </select>

                          </div>


                          <br><br><br>


                        <hr>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12">Total</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" readonly="readonly" name="total" class="form-control" id="total" placeholder="Total Amount" required="required">
                          <!-- <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> -->
                        </div>



                        <label class="control-label col-md-2 col-sm-2 col-xs-12">VAT(%)</label>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                          <input type="text" name="vat" class="form-control" placeholder="VAT(%)" id="vat" required="required">
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
                          <input type="text" name="discount" class="form-control" id="discount" required="required" placeholder="Discount">
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


<script type="text/javascript"> 
function deleteConfirm(url)
 {
    if(confirm('Do you want to Delete this record ?'))
    {
        window.location.href=url;
    }
 }
</script>

<script type="text/javascript">
  
function calculate(){

  var sales_rate = parseInt(document.getElementById('sales_rate').value);
  var quantity = parseInt(document.getElementById('quantity').value);
  var payment = parseInt(document.getElementById('payment').value);
  var vat = parseInt(document.getElementById('vat').value);
  var discount = parseInt(document.getElementById('discount').value);



  var rate=parseInt(sales_rate);
  var qty=parseInt(quantity);
  var pymt=parseInt(payment);
  var vt=parseInt(vat);
  var dcount=parseInt(discount);

  
  var total=(sales_rate * qty).toFixed(2);
  var vat=(total * (vt/100) ).toFixed(2);
  var grand_total=(total-vat-dcount).toFixed(2);
  var due=(grand_total-payment).toFixed(2);
  
  document.getElementById('total').value = total;
   document.getElementById('grand_total').value = grand_total;
  document.getElementById('due').value = due;
  
}
</script>


<?php include('footer.php'); ?>