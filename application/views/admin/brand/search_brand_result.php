<?php include('header.php'); ?>
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">

              <div class="page-title">
                <div class="title_left">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>     
                    <li class="active">Brand</li>
                  </ol>
                </div>

  <?php echo form_open('brand/search_brand'); ?>
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
                    <h2>Manage Brand </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <!-- <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="glyphicon glyphicon-plus-sign"></i> Add Brand</button> -->


                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                          
                          <table id="datatable-keytable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>SL.</th>
                                <th>Brand Name</th>
                                <th>Status</th>
                                <th>Options</th>
                              </tr>
                            </thead>

                             <tbody>

                              <?php if(count($record)): 
                                $count=$this->uri->segment(3, 0);
                                 foreach($record as $record): ?>

                              <tr>
                                <td><?= ++$count; ?></td>
                                <td><?= $record->brand_name; ?></td>
                                <td><?= $record->status; ?></td>
                              
                               <td>
                                  <?= anchor("brand/edit_brand/{$record->brand_id}", '<i class="fa fa-edit"></i>', ['class'=>'btn btn-default']); ?>
                                <!-- </td> -->
                               
                                  <a class="btn btn-default" onclick="javascript:deleteConfirm('<?php echo base_url().'brand/close_brand/'.$record->brand_id ?>');" deleteConfirm href="#"><i class="fa fa-trash"></i></a>
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
<?php echo form_open('brand/add_brand'); ?>

                  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel"><i class="glyphicon glyphicon-plus-sign"></i>Add Brand</h4>
                        </div>
                        <div class="modal-body">



                      <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                      </div>



                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                          <input type="text" name="brand_name" class="form-control" id="inputSuccess3" placeholder="Brand Name">
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <br><br><br>

                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                          <div class="col-md-9 col-sm-9 col-xs-12">
                            <select class="form-control" name="brand_status">
                              <option>Select One</option>

                              <?php 
                              foreach($brand_status as $status)
                              { ?>
                                 <option value="<?php echo $status->active; ?>"><?php echo $status->status?></option>;
                              }
                              <?php } ?>

                            </select>
                          </div>
                        </div>

                          <br><br><br>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
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


<?php include('footer.php'); ?>