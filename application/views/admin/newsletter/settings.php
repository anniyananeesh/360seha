<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><?php echo $title;?></h3>
    </div>

    <?php if($this->session->flashdata('message')):?>
    
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">Ã—</button>
            <i class="fa fa-ok-sign"></i>
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
                      <label class="col-sm-2 control-label"><strong>Newsletter From Mail</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="from_nl_mail" id="from_nl_mail" value="<?php echo $config['from_nl_mail']['value'];?>"/>
                          <?php if(form_error('from_nl_mail')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('from_nl_mail');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div> 
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Newsletter From Name</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="from_nl_name" id="from_nl_name" value="<?php echo $config['from_nl_name']['value'];?>"/>
                          <?php if(form_error('from_nl_name')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('from_nl_name');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                      
                    <div class="form-group">
                        
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Newsletter Server</strong></label>
                      <div class="col-sm-4"> 
                          
                        <div class="row">

                            <div class="col-md-6"> 
                                <select style="width:260px" class="chosen-select" name="nl_server" id="nl_server"/>
                                    <option value="">Choose Server</option>
                                    <option value="Localhost" <?php if($config['nl_server']['value'] == 'Localhost'):?> selected<?php endif;?>>Local Server</option>
                                    <option value="MailChimp" <?php if($config['nl_server']['value'] == 'MailChimp'):?> selected<?php endif;?>>Mail Chimp</option>
                                </select>
                                <?php if(form_error('nl_server')):?>
                                    <div class="error_info">

                                       <?php echo form_error('nl_server');?>
                                    </div> 
                                <?php endif;?>
                                
                            </div>
 
                        </div> 
                           
                      </div>
                      
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        
                      <label class="col-sm-2 control-label"><strong>MailChimp Secret Key</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="mailchimp_id" id="mailchimp_id" <?php if($config['nl_server']['value'] == 'MailChimp' || $_mode):?> <?php else:?> disabled<?php endif;?> value="<?php echo $config['mailchimp_id']['value'];?>"/>
                          <?php if(form_error('mailchimp_id')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('mailchimp_id');?>
                            </div> 
                          <?php endif;?>
                      </div>
                      
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Spam Words Filters</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="spam_words" id="spam_words" value="<?php echo $config['spam_words']['value'];?>"/>
                          <?php if(form_error('spam_words')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('spam_words');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Enable Automated Newsletters ?</strong></label>
                      <div class="col-sm-4">
                          
                          <div class="col-sm-12">
                            <label class="switch left">
                                <input type="checkbox" value="1" name="auto_enable" <?php if($config['auto_enable']['value'] == '1'):?> checked<?php endif;?>>
                               <span></span>
                            </label> 
                            
                          </div>
                          
                      </div>
                    </div>
                    
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Upload Newsletters ?</strong></label>
                      <div class="col-sm-4">
                          
                          <div class="col-sm-12">
                            <label class="switch left">
                                <input type="checkbox" value="1" name="upload_enable" <?php if($config['upload_enable']['value'] == '1'):?> checked<?php endif;?>>
                               <span></span>
                            </label> 
                            
                          </div>
                          
                      </div>
                    </div> 
                    
                    <br/><br/><br/>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-success btn-lg btn-rounded">Save Settings</button>
                      </div>
                    </div>
                    
                  </form>
                    
                </div>
        
              </section>
    
</section>

<script type="text/javascript">
    
    $(function(){
       
       $(document).on('change', '#nl_server', showEnableMailChimpKey);
        
    });
    
    function showEnableMailChimpKey()
    {
        
        var server = $(this).val();

        if(server === 'Localhost')
        {
            $("#mailchimp_id").attr('disabled','disabled');
        }else if(server === 'MailChimp')
        {
            $("#mailchimp_id").removeAttr('disabled');            
        }
        
    }
    
</script>