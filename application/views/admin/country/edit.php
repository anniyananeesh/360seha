<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><i class="fa fa-plus-circle"></i> <?php echo $title;?></h3>
        <button class="btn btn-default btn-rounded" style="float: right; margin-top: -30px;" onclick="javascript: window.location.href='<?php echo $ctrl_url?>'"><i class="i i-list2"></i>See all</button>
    </div>
    
    <section class="panel panel-default">
        
        <header class="panel-heading" style="font-size: 15px;">
          <?php echo $sub_title;?>
        </header>
        
                <div class="panel-body">
                    
                  <form class="form-horizontal" method="post" enctype="multipart/form-data"> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Title <span class="required-txt">*</span></strong></label>
                      <div class="col-sm-10">
                          <div class="col-md-5">
                              
                              <label>English</label>
                              <input type="text" autofocus autocomplete="off" class="form-control" name="name_en" id="name_en" value="<?php echo isset($record->name_en) ? $record->name_en : ''?>"/>
                          
                            <?php if(form_error('name_en')):?>
                              <div class="error_info">

                                  <?php echo form_error('name_en');?> ...
                              </div>
                            <?php else:?>

                              <span class="help-block m-b-none text-muted">Eg:- UAE, Qatar...</span>
                            <?php endif;?>
                              
                          </div>
                          
                          <div class="col-md-5">
                              
                              <label>Arabic</label>
                              <input type="text" autofocus autocomplete="off" class="form-control" name="name_ar" id="name_ar" value="<?php echo isset($record->name_ar) ? $record->name_ar : ''?>"/>
                          
                            <?php if(form_error('name_ar')):?>
                              <div class="error_info">

                                  <?php echo form_error('name_ar');?> ...
                              </div>
 
                            <?php endif;?>
                              
                          </div>
                          
                      </div>
                    </div> 
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                   <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>URL <span class="required-txt">*</span></strong></label>
                      <div class="col-sm-10">
                          <div class="col-md-5"> 
                              <input type="text" autofocus autocomplete="off" class="form-control" name="domain_url" id="domain_url" value="<?php echo isset($record->domain_url) ? $record->domain_url : ''?>"/>
                          
                            <?php if(form_error('domain_url')):?>
                              <div class="error_info">

                                  <?php echo form_error('domain_url');?> ...
                              </div>
                            <?php else:?>

                              <span class="help-block m-b-none text-muted">Eg:- emirates.360seha.com</span>
                            <?php endif;?>
                              
                          </div> 
                              
                          </div>
                          
                      </div>
                   
                    
                   <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><strong>Image</strong></label>
 
                      <div class="col-sm-10">

                        <?php if(isset($record->image_url) && $record->image_url != NULL):?>
                            <img src="<?php echo base_url()?>uploads/country/<?php echo $record->image_url?>" class="m-b-md b b-success"/>                         
                        <?php endif;?> 

                        <input type="file" class="filestyle" name="userfile" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                        <div class="help-block">
                            Upload the Wall Image file | Allowed *.jpg, *.png | Res. 320 X 320 Pixels  | Maximum File Size 800KB                      
                        </div>
                        
                        <?php if(form_error('userfile')):?>
                            <div class="error_info">

                                <?php echo form_error('userfile');?> ...
                            </div> 
                        <?php endif;?>

                        <?php if(isset($error) && $error != ""):?>
                            <div class="error_info">

                                <?php echo $error;?> ...
                            </div> 
                        <?php endif;?>
                        
                        
                      </div>
                      
                    </div>  
 
                    <div class="line line-dashed b-b line-lg pull-in"></div> 

                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default btn-rounded" onclick="javascript: location.href='<?php echo $ctrl_url?>'">Cancel</button>
                        <button type="submit" class="btn btn-success btn-rounded m-l-sm">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </section>
    
</section>