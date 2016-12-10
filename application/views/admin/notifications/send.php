<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
                  <a href="<?php echo base_url().ADMIN_URL?>notifications/add" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">New Notification</a>
              </div> 
    
    <span class="clearfix"></span> 
    
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
 
 
    <section class="panel panel-default" style="margin-top: 20px;">
 
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
 
                        <th>Title</th>
                        <th>Message</th>
                        <th>Send On</th> 
                        <th width="240">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                         <?php if($queue):?>
                        
                        <?php foreach ($queue as $notification):?>
                        
                            <tr>
                             
                              <td>
                                  <?php $_id = $this->encrypt->encode($notification->job_id);?>
                                  <?php echo $notification->title_en?>
                              </td>
                              <td> 
                                  <?php echo character_limiter($notification->message_en, 100, '...')?>
                              </td> 
                               
                              <td>
                                <?php echo date('d F Y', strtotime($notification->send_on))?>
                              </td> 

                              <td> 
                                <a class="btn btn-danger btn-xs delete_entry" href="<?php echo base_url().ADMIN_URL?>notifications/queue_delete/<?php echo $_id?>">Delete</a>
                              </td>
                              
                            </tr>
                      
                        <?php endforeach;?>
                      
                      <?php else:?>
                      <tr>

                          <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center; color:red; font-weight: bold;" colspan="3"> 
                            No notifications found !
                          </td>
                      </tr> 
                      
                      <?php endif;?>
                    </tbody>
                    
                  </table>
                    
                </div>
                
              </section>
              
            </section>