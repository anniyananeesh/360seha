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
                    $attributes = array('class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data');

                    echo form_open('', $attributes);
                  ?>
 
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Maintanence Mode</strong></label>
                      <div class="col-sm-4">
                          
                          <div class="col-sm-12">
                            <label class="switch left">
                                <input type="checkbox" value="1" name="maintenance" <?php if($config['maintenance']['value'] == '1'):?> checked<?php endif;?>>
                               <span></span>
                            </label>
                              
                              <input type="text" 
                                     autofocus 
                                     autocomplete="off" 
                                     <?php echo ($_mode || $config['maintenance']['value'] == '1') ? '' : 'disabled="disabled"'?> 
                                     class="form-control left small-input m-l-lg" 
                                     name="maintain_text" 
                                     id="maintain_text" 
                                     value="<?php echo ($_mode || $config['maintenance']['value'] == '1') ? $config['maintain_text']['value'] : ''?>" 
                                     placeholder="Maintanence Text ..."/>
                            
                          </div>
                          <?php if(form_error('maintenance')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('maintenance');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Show offer label on header?</strong></label>
                      <div class="col-sm-4">
                          
                          <div class="col-sm-12">
                            <label class="switch left">
                                <input type="checkbox" value="Y" name="offer_label" <?php if($config['offer_label']['value'] == 'Y'):?> checked<?php endif;?>>
                               <span></span>
                            </label>
                            
                          </div> 
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Page Title</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="site_name" id="site_name" value="<?php echo $config['site_name']['value'];?>"/>
                          <?php if(form_error('site_name')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('site_name');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Page Description</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="site_description" id="site_description" value="<?php echo $config['site_description']['value'];?>"/>
                          <?php if(form_error('site_description')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('site_description');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Admin Email</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" name="admin_email" id="admin_email" value="<?php echo $config['admin_email']['value'];?>"/>
                          <?php if(form_error('admin_email')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('admin_email');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Date Format :</strong></label>
                      <div class="col-sm-4"> 
                          
                        <div class="row">

                            <div class="col-md-6"> 
                                
                                <select style="width:200px" class="chosen-select" name="date_format"/>

                                    <option value="mm/dd/yy" <?php if($config['date_format']['value'] == 'mm/dd/yy'):?> selected<?php endif;?>>MM/DD/YYYY</option>
                                    <option value="dd/mm/yy" <?php if($config['date_format']['value'] == 'dd/mm/yy'):?> selected<?php endif;?>>DD/MM/YYYY</option>
                                    <option value="mm-dd-yy" <?php if($config['date_format']['value'] == 'mm-dd-yy'):?> selected<?php endif;?>>MM-DD-YYYY</option>
                                    <option value="dd-mm-yy" <?php if($config['date_format']['value'] == 'dd-mm-yy'):?> selected<?php endif;?>>DD-MM-YYYY</option>
                                    <option value="mm.dd.yy" <?php if($config['date_format']['value'] == 'mm.dd.yy'):?> selected<?php endif;?>>MM.DD.YYYY</option>
                                    <option value="dd.mm.yy" <?php if($config['date_format']['value'] == 'dd.mm.yy'):?> selected<?php endif;?>>DD.MM.YYYY</option>
                                    <option value="yy-mm-dd" <?php if($config['date_format']['value'] == 'yy-mm-dd'):?> selected<?php endif;?>>YYYY-MM-DD</option>
                                </select>
                                
                                <?php if(form_error('date_format')):?>
                                    <div class="error_info">

                                       <?php echo form_error('date_format');?> ...
                                    </div> 
                                <?php endif;?>
                                
                            </div>
 

                        </div> 
                           
                      </div>
                    </div> 
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Free registration period</strong></label>
                      <div class="col-sm-4">
                          
                          <input type="text" autofocus style="width: 100px;" autocomplete="off" class="form-control" placeholder="days" name="grace_period" id="admin_email" value="<?php echo $config['grace_period']['value'];?>"/>
                          <div class="clearfix"></div>
                          <?php if(form_error('grace_period')):?>
                            <div class="error_info">
                                <?php echo form_error('grace_period');?> ...
                            </div> 
                          
                          <?php else:?>
                            <div class="help-block">
                                Number of days
                            </div>
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        
                      <label class="col-sm-2 control-label"><strong>Per page listings</strong></label>
                      <div class="col-sm-10">
                          
                          <input type="text" autofocus autocomplete="off" class="form-control" style="width: 80px;" name="search_per_page" id="search_per_page" value="<?php echo $config['search_per_page']['value'];?>"/>
                          <?php if(form_error('search_per_page')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('search_per_page');?> ...
                            </div>
                          
                          <?php else:?>
                          
                            <div class="help-block">
                                Specify the number of items to be listed in each page.
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