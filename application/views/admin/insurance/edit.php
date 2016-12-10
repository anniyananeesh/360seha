<section class="scrollable padder">

      <div class="row wrapper" style=" margin-top: -20px;">
			                    
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
	                          	<input type="text" autofocus autocomplete="off" class="form-control" name="title" id="title" value="<?php echo $record->ins_title;?>"/>
	                          
		                          <?php if(form_error('title')):?>
		                            <div class="error_info">
		                                                                
		                                <?php echo form_error('title');?> ...
		                            </div> 
		                          <?php endif;?>
	                      	</div>
	                      	<div class="clearfix"></div>
	                      	<div class="col-sm-4 p-t-md">

	                      		<label>Arabic</label>
	                          	<input type="text" autofocus autocomplete="off" class="form-control" name="title_ar" id="title_ar" value="<?php echo $record->ins_title_ar;?>"/>
	                          
		                          <?php if(form_error('title_ar')):?>
		                            <div class="error_info">
		                                                                
		                                <?php echo form_error('title_ar');?> ...
		                            </div> 
		                          <?php endif;?>
	                      	</div>
                    </div> 

                    <div class="line line-dashed b-b line-lg pull-in"></div><!-- 
                    
                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Image</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-12">

                        <?php if(isset($record->thumb_url) && $record->thumb_url != NULL):?>
                            <img src="<?php echo base_url()?>uploads/insurance/<?php echo $record->thumb_url?>" class="m-b-md b b-success"/>                         
                        <?php endif;?> 

                        <input type="file" class="filestyle" name="userfile" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                        <div class="help-block">
                            Upload the Wall Image file | Allowed *.jpg, *.png | Res. 180 X 100 Pixels  | Maximum File Size 800KB                      
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
                          <label class="col-sm-2 control-label"><strong>Website Link</strong> <span class="required-txt">*</span></label>
                          <div class="clearfix"></div>
                          <div class="col-sm-4">

                            <label>English</label>
                              <input type="text" autofocus autocomplete="off" class="form-control" name="link" id="link" value="<?php echo $record->site_link;?>"/>
                            
                              <?php if(form_error('link')):?>
                                <div class="error_info">
                                                                    
                                    <?php echo form_error('link');?> ...
                                </div> 
                              <?php endif;?>
                          </div>
                          <div class="clearfix"></div> 
                    </div>  -->

                    <div class="clearfix"></div>
                    
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