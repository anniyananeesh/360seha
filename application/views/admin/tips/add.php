<section class="scrollable padder">

      <div class="row wrapper">
			                    
			    <div class="text-left" style="float: left;">
			        <h3 class="font-thin" style="float: left; margin-right:10px;"><?php echo $title?></h3>
              <small class="text-muted inline m-b-sm" style="margin-top: 28px;"><?php echo $sub_title;?></small>
			    </div>
			                    	
			    <button class="btn btn-default btn-rounded" style="float: right;" onclick="javascript: window.location.href='<?php echo $ctrlUrl?>'">
			    	<i class="i i-list2"></i> Back
			    </button>
			                    
			</div>

			<section class="panel panel-default">
 
                <div class="panel-body">
                    
                    <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
        
                    <div class="form-group">
                        	<label class="col-sm-2 control-label"><strong>Title</strong> <span class="required-txt">*</span></label>
                        	<div class="clearfix"></div>
	                      	<div class="col-sm-4">

	                      		<label>English</label>
	                          	<input type="text" autofocus autocomplete="off" class="form-control" name="title" id="title" value="<?php echo set_value('title');?>"/>
 
	                      	</div>
	                      	<div class="clearfix"></div>
	                      	<div class="col-sm-4 p-t-md">

	                      		<label>Arabic</label>
	                          	<input type="text" autofocus autocomplete="off" class="form-control" name="title_ar" id="title_ar" value="<?php echo set_value('title_ar');?>"/>
	                            <div class="clearfix"></div>
                              <?php if(isset($error_title)):?>
                                <div class="error_info">
                                  <?php echo $error_title;?> ...
                                </div> 
                              <?php endif;?>
	                      	</div>
                    </div> 

                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Image</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-12">
                          
                        <input type="file" class="filestyle" name="userfile" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                        <div class="help-block">
                            Upload the Wall Image file | Allowed *.jpg, *.png | Res. 640 X 640 Pixels  | Maximum File Size 800KB                      
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
                      <label class="col-sm-12 control-label"><strong>Description English <span class="required-txt">*</span></strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-6 editor-container">
     
                          <textarea name="description" class="form-control editor" style="overflow:scroll;height:200px;"><?php echo set_value('description');?></textarea>
 
                      </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Description Arabic <span class="required-txt">*</span></strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-6 editor-container">
     
                          <textarea name="description_ar" class="form-control editor" style="overflow:scroll;height:200px;"><?php echo set_value('description_ar');?></textarea>
                          <div class="clearfix"></div>
                              <?php if(isset($error_description)):?>
                                <div class="error_info">
                                  <?php echo $error_description;?> ...
                                </div> 
                              <?php endif;?>
                      </div>
                    </div> 

                    <div class="clearfix"></div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Send notification now?</strong></label>
                        <div class="clearfix"></div>
                      <div class="col-sm-8">
                          <label class="switch left">
                                  <input type="checkbox" name="send"/>
                                  <span></span>
                              </label>  
                      </div>
                    </div>

                    <div class="clearfix"></div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                        
                    <div class="form-group">
                        
                      <div class="col-sm-4">
                        <button type="button" class="btn btn-default" onclick="javascript: location.href='<?php echo $ctrlUrl?>'">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                        
                    </div>
                    
                  </form>
                    
                </div>
    
       		</section>
</section>