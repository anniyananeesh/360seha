<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><?php echo $title;?></h3>
    </div>

    <?php if(isset($error_message)):?>
    
        <div class="alert alert-danger font-thin">
 
            <?php echo $error_message;?>
        </div>
    
    <?php endif;?>

    <?php if(isset($message)):?>
    
        <div class="alert alert-danger h4 font-thin">
 
            <?php echo $message;?>
        </div>
    
    <?php endif;?>

    <?php if($this->session->flashdata('message')):?>
    
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $this->session->flashdata('message');?>
        </div>
    
    <?php endif;?>
 
    
    <section class="panel panel-default">
        
                <header class="panel-heading" style="font-size: 15px;">
                  Settings
                </header>
        
                <div class="panel-body">
                    
                  <form class="form-horizontal" method="post"> 
 
                    <div class="form-group">
                        
                        <label class="col-sm-12 control-label"><strong>Find the Subscriber <span class="required-txt">*</span></strong></label>
                        <div class="clearfix"></div>
                        <div class="col-sm-5">
                            
                            <select name="subscriber" class="chosen-select" style="width: 500px;">

                                <option value="">Choose Subscriber</option>
                                <?php foreach($subscribers AS $s):?>
                                    <option value="<?php echo $s->user_id?>"><?php echo ($s->subs_type == 1) ? 'Dr.' : ''; echo $s->subs_title?></option>
                                <?php endforeach;?>
                                    
                            </select>
                            
                            <?php if(form_error('subscriber')):?>
                                <div class="error_info">

                                    <?php echo form_error('subscriber');?> ...
                                </div> 
                            <?php endif;?>
                            
                        </div>
                          
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        
                      <label class="col-sm-12 control-label"><strong>From Name <span class="required-txt">*</span></strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="from_name" id="from_name" value="<?php echo set_value('from_name');?>"/>
                          <?php if(form_error('from_name')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('from_name');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>From Email: <span class="required-txt">*</span></strong></label>
                        <div class="clearfix"></div>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="from_email" id="from_email" value="<?php echo set_value('from_email');?>"/>
                          <?php if(form_error('from_email')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('from_email');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div> 
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Subject <span class="required-txt">*</span></strong></label>
                        <div class="clearfix"></div>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="subject" id="subject" value="<?php echo set_value('subject');?>"/>
                          <?php if(form_error('subject')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('subject');?>
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Newsletter content</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-10">
                           <textarea name="message" id="message" class="form-control editor" style="overflow:scroll;height:300px;max-height:450px;"><?php echo set_value('message');?></textarea>
                      </div>
                    </div>
 
                    <div class="line line-dashed b-b line-lg pull-in m-t-lg"></div>
                    
                    <div class="form-group">
                      <div class="col-sm-4">
                        <button type="submit" class="btn btn-success btn-rounded font-thin">Send</button>
                      </div>
                    </div>
                    
                  </form>
                    
                </div>
        
              </section>
    
</section>