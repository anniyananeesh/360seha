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
                    
                  <?php 
                        $attributes = array('class' => 'form-horizontal', 'method' => 'post');
                        echo form_open('', $attributes);
                    ?>
                     
                      
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Allowed File Types</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="allowed_types" id="allowed_types" value="<?php echo $config['allowed_types']['value'];?>"/>
                          <?php if(form_error('allowed_types')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('allowed_types');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Maximum File Size:</strong></label>
                      <div class="col-sm-4"> 
 
                            <div class="input-group">
                                
                                <input type="text" class="form-control" name="max_size" id="max_size" value="<?php echo $config['max_size']['value'];?>">
                                <span class="input-group-addon">KB</span>
                            </div>
                            
                            <?php if(form_error('max_size')):?>
                                <div class="error_info">

                                    <?php echo form_error('max_size');?>
                                </div> 
                            <?php endif;?>
                           
                      </div>
                      
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Image Height</strong></label>
                      <div class="col-sm-4"> 
 
                            <div class="input-group">
                                
                                <input type="text" class="form-control" name="max_height" id="max_height" value="<?php echo $config['max_height']['value'];?>">
                                <span class="input-group-addon">px</span>
                            </div>
                            
                            <?php if(form_error('max_height')):?>
                                <div class="error_info">

                                    <?php echo form_error('max_height');?>
                                </div> 
                            <?php endif;?>
                           
                      </div>
                      
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Image Width</strong></label>
                      <div class="col-sm-4"> 
 
                            <div class="input-group">
                                
                                <input type="text" class="form-control" name="max_width" id="max_width" value="<?php echo $config['max_width']['value'];?>">
                                <span class="input-group-addon">px</span>
                            </div>
                            
                            <?php if(form_error('max_width')):?>
                                <div class="error_info">

                                    <?php echo form_error('max_width');?>
                                </div> 
                            <?php endif;?>
                           
                      </div>
                      
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Thumb Height</strong></label>
                      <div class="col-sm-4"> 
 
                            <div class="input-group">
                                
                                <input type="text" class="form-control" name="thumb_height" id="thumb_height" value="<?php echo $config['thumb_height']['value'];?>">
                                <span class="input-group-addon">px</span>
                            </div>
                            
                            <?php if(form_error('thumb_height')):?>
                                <div class="error_info">

                                    <?php echo form_error('thumb_height');?>
                                </div> 
                            <?php endif;?>
                           
                      </div>
                      
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Thumb Width</strong></label>
                      <div class="col-sm-4"> 
 
                            <div class="input-group">
                                
                                <input type="text" class="form-control" name="thumb_width" id="thumb_width" value="<?php echo $config['thumb_width']['value'];?>">
                                <span class="input-group-addon">px</span>
                            </div>
                            
                            <?php if(form_error('thumb_width')):?>
                                <div class="error_info">

                                    <?php echo form_error('thumb_width');?>
                                </div> 
                            <?php endif;?>
                           
                      </div>
                      
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Image Quality Compression Ratio:</strong></label>
                      <div class="col-sm-4"> 
                          
                        <div class="row">

                            <div class="col-md-4"> 
                                
                                <div class="input-group">

                                    <input type="text" class="form-control" name="quality" id="quality" value="<?php echo $config['quality']['value'];?>">
                                    <span class="input-group-addon">%</span>
                                </div>

                                <?php if(form_error('quality')):?>
                                    <div class="error_info">

                                        <?php echo form_error('quality');?>
                                    </div> 
                                <?php endif;?>
                                
                            </div>
 
                        </div> 
                           
                      </div>
                      
                    </div> 
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Enable Watermarking ?</strong></label>
                      <div class="col-sm-4">
                          
                          <div class="col-sm-12">
                            <label class="switch left">
                                <input type="checkbox" value="1" name="wm_enable" <?php if($config['wm_enable']['value'] == '1'):?> checked<?php endif;?>>
                               <span></span>
                            </label> 
                            
                          </div>
                          
                      </div>
                    </div>
 
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Watermark Image Path</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="wm_path" id="wm_path" value="<?php echo $config['wm_path']['value'];?>"/>
                          <?php if(form_error('wm_path')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('wm_path');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Watermark Position</strong></label>
                      <div class="col-sm-4"> 
                          
                        <div class="row">

                            <div class="col-md-6"> 
                                <select style="width:260px" class="chosen-select" name="wm_pos" id="wm_pos"/>
                                    <option value="">Choose Position</option>
                                    <option value="CENTER" <?php if($config['wm_pos']['value'] == 'CENTER'):?> selected<?php endif;?>>Centre</option>
                                    <option value="BOTTOM" <?php if($config['wm_pos']['value'] == 'BOTTOM'):?> selected<?php endif;?>>Bottom</option>
                                    <option value="TOP" <?php if($config['wm_pos']['value'] == 'TOP'):?> selected<?php endif;?>>Top</option>
                                </select>
                                <?php if(form_error('wm_pos')):?>
                                    <div class="error_info">

                                       <?php echo form_error('wm_pos');?> ...
                                    </div> 
                                <?php endif;?>
                                
                            </div>
 
                        </div> 
                           
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