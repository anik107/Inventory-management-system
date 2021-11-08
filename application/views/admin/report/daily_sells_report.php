<?php include('header.php'); ?>
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">

              <div class="page-title">
                <div class="title_left">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>     
                    <li class="active">Daily Sells Report</li>
                  </ol>
                </div>

  <?php echo form_error('query', "<div class='text-danger'>", '</div>'); ?> 
            </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daily Sell Report</h2>
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



<script type="text/javascript"> 
function deleteConfirm(url)
 {
    if(confirm('Do you want to Delete this record ?'))
    {
        window.location.href=url;
    }
 }
</script>




<?php include('footer.php'); ?>