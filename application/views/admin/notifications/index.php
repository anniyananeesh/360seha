<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
                  <a href="<?php echo $ctrlUrl?>add" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">New Record</a>
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
                        <th>Language</th>
                        <th>Send On</th> 
                        <th width="240">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                         <?php if($notifications):?>
                        
                        <?php foreach ($notifications as $notification):?>
                        
                            <tr>
                             
                              <td>
                                  <?php $_id = $this->encrypt->encode($notification->job_id);?>
                                  <?php echo $notification->title?>
                              </td>
                              <td> 
                                  <?php echo character_limiter($notification->message, 100, '...')?>
                              </td> 
                               <td> 
                                  <?php echo ($notification->not_lang == 'English') ? 'English':'Arabic';?>
                              </td> 
                              <td>
                                <?php echo date('d F Y', strtotime($notification->created_on))?>
                              </td> 

                              <td> 
                                <?php if ($notification->send != 1):?>
                                  <a class="btn btn-primary btn-xs" href="<?php echo $ctrlUrl?>send/<?php echo $_id?>" title="Send"><i class="fa fa-paper-plane"></i></a>&nbsp;
                                <?php endif;?>
                                <a class="btn btn-default btn-xs" href="<?php echo $ctrlUrl?>edit/<?php echo $_id?>">Edit</a>&nbsp;
                                <a class="btn btn-danger btn-xs delete_entry" href="<?php echo $ctrlUrl?>delete/<?php echo $_id?>">Delete</a>
                              </td>
                              
                            </tr>
                      
                        <?php endforeach;?>
                      
                      <?php else:?>
                      <tr>

                          <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center; color:red; font-weight: bold;" colspan="5"> 
                            No records has been found
                          </td>
                      </tr> 
                      
                      <?php endif;?>
                    </tbody>
                    
                  </table>
                    
                </div>
                
              </section>
              
            </section>