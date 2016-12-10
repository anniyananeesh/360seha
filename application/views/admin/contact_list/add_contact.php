<section class="scrollable padder">
    <div class="m-b-md">
        <?php $list_id = $this->encrypt->encode($list_id);?>
        <h3 class="m-b-none font-thin"><i class="fa fa-plus-circle"></i> <strong><?php echo $clist->list_title?></strong> <?php echo $title;?></h3>
        <button class="btn btn-default btn-rounded" style="float: right; margin-top: -30px;" onclick="javascript: window.location.href='<?php echo base_url()?>admin/contactlist/list_contacts/<?php echo $list_id?>'"><i class="i i-list2"></i>List Contacts</button>
    </div>
    
    <section class="panel panel-default">
        
        <header class="panel-heading" style="font-size: 15px;">
          <?php echo $sub_title;?> <strong><?php echo $clist->list_title?></strong>
        </header>
        
                <div class="panel-body">
                    
                  <form class="form-horizontal" method="post"> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>First name</strong></label>
                      <div class="col-sm-4">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="first_name" id="first_name" value="<?php echo set_value('first_name');?>"/>
                          
                          <?php if(form_error('first_name')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('first_name');?> ...
                            </div>
                          <?php endif;?>
                      </div>
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Last name</strong></label>
                      <div class="col-sm-4">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="last_name" id="last_name" value="<?php echo set_value('last_name');?>"/>
                          
                          <?php if(form_error('last_name')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('last_name');?>
                            </div>
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Email</strong></label>
                      <div class="col-sm-4">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="email" id="email" value="<?php echo set_value('email');?>"/>
                          
                          <?php if(form_error('email')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('email');?>
                            </div>
                          <?php endif;?>
                      </div>
                    </div> 
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default btn-rounded" onclick="javascript: location.href='<?php echo base_url()?>admin/contactlist/list_contacts/<?php echo $list_id?>'">Cancel</button>
                        <button type="submit" class="btn btn-success btn-rounded m-l-sm">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </section>
    
</section>