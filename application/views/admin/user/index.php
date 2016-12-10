<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
                  <a href="<?php echo base_url()?>admin/user/create" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">Create User</a>
                  
              </div> 
    
    <span class="clearfix"></span>
    
    <form method="post" name="search_hotels">
        <div class="row" style="margin-top: 15px; margin-bottom: 15px;"> 

            <div class="col-sm-4">
                <input type="text" class="input-sm form-control" autocomplete="off" autofocus name="list_title" placeholder="Search User: Administrator, John.Doe...">
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
            <p class="h3 font-thin"><?php echo $this->session->flashdata('message');?></p>
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
 
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
 
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Group</th>
                        <th>Added On</th>
                        <th width="260">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php if($records):?>
                        
                        <?php foreach ($records as $usr):?>
                        
                            <tr>
 
                              <td>
                                  
                                  <?php $_id = $this->encrypt->encode($usr->user_id);?>
                                  <?php echo $usr->first_name.' '.$usr->last_name?>
                              </td>
                              
                              <td><?php echo $usr->user_name?></td> 
                              
                              <td><?php echo $usr->email?></td> 
                              <td><?php echo $usr->grp_title?></td>
                              <td><?php echo date('d F Y', strtotime($usr->created))?></td>
                              <td>
                             
                                <?php if($usr->user_status == 0):?>
                              		<a href="<?php echo base_url().ADMIN_URL?>user/status/<?php echo $_id?>/1" title="Enable this user"><i class="glyphicon glyphicon-minus-sign text-danger"></i></a>
                              	<?php else:?>
                              		<a href="<?php echo base_url().ADMIN_URL?>user/status/<?php echo $_id?>/0" title="Disable this user">
                                    
                                    <i class="glyphicon glyphicon-ok-sign text-success"></i>
                                    </a>
                              	<?php endif;?>
                        
                                &nbsp;

                                  <a class="btn btn-success btn-xs reset_pwd" href="<?php echo base_url().ADMIN_URL?>user/reset/<?php echo $_id?>">Reset Password</a>&nbsp;
                                  <a class="btn btn-default btn-xs" href="<?php echo base_url().ADMIN_URL?>user/edit/<?php echo $_id?>">Edit</a>&nbsp;
                                  <a class="btn btn-danger btn-xs delete_entry" href="<?php echo base_url().ADMIN_URL?>user/delete/<?php echo $_id?>">Delete</a>
                                
                              </td>
                              
                            </tr>
                      
                        <?php endforeach;?>
                      
                      <?php else:?>
                      <tr>

                          <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center;" colspan="7">
                              
                              
                          </td>
                      </tr> 
                      <?php endif;?>
                      
                    </tbody>
                    
                  </table>
                    
                </div>
        
                <?php if(isset($records) && count($records) > 15):?>
                <footer class="panel-footer">
                  <div class="row"> 
                      
                    <div class="col-sm-4">
                      <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">                
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </footer>
                <?php endif;?>
        
              </section>
            </section>