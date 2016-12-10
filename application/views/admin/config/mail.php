<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><?php echo $title;?></h3>
    </div>

    <?php if($this->session->flashdata('message')):?>
    
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <i class="fa fa-ok-sign"></i>
            <?php echo $this->session->flashdata('message');?>
        </div>
    
    <?php endif;?>
 
    
    <section class="panel panel-default">
        <header class="panel-heading" style="font-size: 15px;">
                  Settings
                 </header>
                <div class="panel-body">
                    
                    <?php 
                        $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                        echo form_open('', $attributes);
                    ?>
 
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Server Type:</strong></label>
                      <div class="col-sm-4"> 
                          
                        <div class="row">

                            <div class="col-md-6"> 
                                <select style="width:260px" class="chosen-select" name="server_type" id="server_type"/>
                                    <option value="">Choose Server</option>
                                    <option value="Localhost" <?php if($config['server_type']['value'] == 'Localhost'):?> selected<?php endif;?>>Custom Server</option>
                                    <option value="Gmail Server" <?php if($config['server_type']['value'] == 'Gmail Server'):?> selected<?php endif;?>>Gmail Server</option>
                                </select>
                                <?php if(form_error('server_type')):?>
                                    <div class="error_info">

                                       <?php echo form_error('server_type');?> ...
                                    </div> 
                                <?php endif;?>
                                
                            </div>
 
                        </div> 
                           
                      </div>
                      
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Hostname</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="host_name" id="host_name" value="<?php echo $config['host_name']['value'];?>"/>
                          <?php if(form_error('host_name')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('host_name');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>From Mail</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="from_mail" id="from_name" value="<?php echo $config['from_mail']['value'];?>"/>
                          <?php if(form_error('from_mail')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('from_mail');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>From Name</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="from_name" id="from_name" value="<?php echo $config['from_name']['value'];?>"/>
                          <?php if(form_error('from_name')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('from_name');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Server Port</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="server_port" id="server_port" value="<?php echo $config['server_port']['value'];?>"/>
                          <?php if(form_error('server_port')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('server_port');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Username</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="username" id="username" value="<?php echo $config['username']['value'];?>"/>
                          <?php if(form_error('username')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('username');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Password</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="password" autofocus autocomplete="off" class="form-control" name="password" id="password" value="<?php echo $config['password']['value'];?>"/>
                          <?php if(form_error('password')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('password');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>  
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="submit" class="btn btn-success btn-lg btn-rounded">Save Settings</button>
                      </div>
                    </div>
                  <?php echo form_close();?>
                </div>
              </section>
    
</section>