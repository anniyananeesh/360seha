<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><i class="fa fa-plus-circle"></i> <?php echo $title;?></h3>
        <button class="btn btn-default btn-rounded" style="float: right; margin-top: -30px;" onclick="javascript: window.location.href='<?php echo base_url()?>admin/contactlist'"><i class="i i-list2"></i> Contact List</button>
    </div>
    
    <section class="panel panel-default">
        
        <header class="panel-heading" style="font-size: 15px;">
          <?php echo $sub_title;?>
        </header>
        
                <div class="panel-body">
                    
                  <form class="form-horizontal" method="post"> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Title <span class="required-txt">*</span></strong></label>
                      <div class="col-sm-4">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="list_title" id="list_title" value="<?php echo set_value('list_title');?>"/>
                          
                          <?php if(form_error('list_title')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('list_title');?> ...
                            </div>
                          <?php else:?>
                          
                            <span class="help-block m-b-none text-muted">Eg:- Business, Personal...</span>
                          <?php endif;?>
                      </div>
                    </div> 
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default btn-rounded" onclick="javascript: location.href='<?php echo base_url()?>admin/contactlist/'">Cancel</button>
                        <button type="submit" class="btn btn-success btn-rounded m-l-sm">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </section>
    
</section>