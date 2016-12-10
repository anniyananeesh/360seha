<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
                  <a href="<?php echo $ctrl_url?>/add" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">Create</a>
                  
              </div> 
    
    <span class="clearfix"></span>
    
    <form method="post" name="search_hotels">
        <div class="row" style="margin-top: 15px; margin-bottom: 15px;"> 

            <div class="col-sm-4">
                <input type="text" class="input-sm form-control" autocomplete="off" autofocus name="name" placeholder="Search country...">
            </div>
            
            
            <div class="col-sm-3">
                <button class="btn btn-sm btn-default" type="submit">Go!</button>
            </div>
            
        </div>
    </form>
    
    <?php if($this->session->flashdata('message')):?>
    
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-ok-sign"></i>
            <?php echo $this->session->flashdata('message');?>
        </div>
    
    <?php endif;?>
    
    <?php if($this->session->flashdata('notify_error')):?>
    
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-ok-sign"></i>
            <?php echo $this->session->flashdata('notify_error');?>
        </div>
    
    <?php endif;?>
 
    <section class="panel panel-default" style="margin-top: 10px;">
                
        <form action="<?php echo $ctrl_url?>/save_order" method="post">
            
            <div class="table-responsive">
              <table class="table table-striped b-t b-light">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Arabic</th>
                    <th><span>Order</span> <input type="submit" class="btn btn-sm btn-default m-l-sm" style="padding: 0px 10px;" value="Save"/></th>
                    <th>Added On</th>
                    <th width="240">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php if($records):?>

                    <?php foreach ($records as $data):?>

                        <tr>

                          <td><?php $_id = $this->encrypt->encode($data->id);?>
                              <?php if($data->image_url != NULL):?>
                                  <img src="<?php echo base_url()?>uploads/country/<?php echo $data->image_url?>" width="80" class="b b-gray img-responsive"/>
                              <?php else:?>
                                  -- 
                              <?php endif;?>
                          </td>
                          <td><?php echo $data->name_en?></td>
                          <td><?php echo $data->name_ar?></td> 
                          <td>
                              <input type="hidden" name="_id[]" value="<?php echo $_id?>" class="form-control" style="width: 50px;"/>
                              <input type="text" name="orderby[]" value="<?php echo $data->orderby?>" class="form-control" style="width: 50px;"/>
                          </td>
                          <td><?php echo date('d F Y', strtotime($data->created_on))?></td>
                          <td>

                            <a class="btn btn-default btn-xs" href="<?php echo $ctrl_url?>/edit/<?php echo $_id?>">Edit</a>&nbsp;
                            <a class="btn btn-danger btn-xs delete_entry" href="<?php echo $ctrl_url?>/delete/<?php echo $_id?>">Delete</a>

                          </td>

                        </tr>

                    <?php endforeach;?>

                  <?php else:?>
                  <tr>

                      <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center;" colspan="4">
                      		No records has been found
                      </td>
                  </tr> 
                  <?php endif;?>

                </tbody>

              </table>

            </div>
         
        </form>
        
    </section>
    
</section>