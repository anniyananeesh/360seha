<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none"><?php echo $title;?></h3>
    </div>
    
    <section class="panel panel-default">
 
                <div class="panel-body">
                    
                    <form class="form-horizontal" method="post" enctype="multipart/form-data"> 

                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Sponsor Name <span class="required-txt">*</span></strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-6">
                          <label>English <span class="required-txt">*</span></label>
                          <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('title')):?>has-error<?php endif;?>" name="title" id="title" value="<?php echo $record->title_en;?>"/>
                          
                          <?php if(form_error('title')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('title');?> ...
                            </div>
                          <?php else:?>
                          
                            <span class="help-block m-b-none text-muted">Eg:- Google, Microsoft, MOH UAE...</span>
                          <?php endif;?>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-sm-6 p-t-sm">
                          <label>Arabic <span class="required-txt">*</span></label>
                          <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('title_ar')):?>has-error<?php endif;?>" name="title_ar" id="title_ar" value="<?php echo $record->title_ar;?>"/>
                          
                          <?php if(form_error('title_ar')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('title_ar');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div> 
                        
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Country <span class="required-txt">*</span></strong></label>
                        <div class="clearfix"></div>
                      <div class="col-sm-6">
 
                              <select class="form-control <?php if(form_error('country_fk')):?>has-error<?php endif;?>" name="country_fk" id="country_fk"/>
                                  <?php foreach($countries AS $data):?>
                                    <option value="<?php echo $data->id;?>" <?php echo ($record->country_fk == $data->id) ? 'selected' : '';?>><?php echo $data->name_en;?></option>
                                  <?php endforeach;?>
                              </select>

                              <?php if(form_error('country_fk')):?>
                                  <div class="error_info">
                                    <?php echo form_error('country_fk');?> ...
                                  </div> 
                              <?php endif;?>
 
                      </div>
                    </div>  
                        
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Sponsor URL <span class="required-txt">*</span></strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-6"> 
                          <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('url')):?>has-error<?php endif;?>" name="url" id="url" value="<?php echo $record->sponsor_url;?>"/>
                          
                          <?php if(form_error('url')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('url');?> ...
                            </div> 
                          <?php endif;?>
                      </div> 

                    </div> 
                        
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Image <span class="required-txt">*</span></strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-6">
                        <?php if(isset($record->image_url) && $record->image_url != NULL):?>
                            <img src="<?php echo base_url()?>uploads/sponsors/<?php echo $record->image_url?>" class="m-b-md b b-success"/>                         
                        <?php endif;?> 
                        <input type="file" name="userfile" data-icon="false" data-classButton="btn btn-default">
                        <div class="help-block">
                            Upload the Sponsor banner Image file | Allowed *.jpg, *.png | Res. 300 X 400 Pixels  | Maximum File Size 800KB                      
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
                        
                      <div class="col-sm-4">
                        <button type="button" class="btn btn-default" onclick="javascript: location.href='<?php echo $ctrlUrl?>'">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="sbmtFrm">Save changes</button>
                      </div>
                        
                    </div>
                    
                  </form>
                    
                </div>
        
            </section>
    
</section>