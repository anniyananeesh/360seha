<section class="scrollable padder">

      <div class="row wrapper" style=" margin-top: -20px;">
			                    
			    <div class="text-left" style="float: left;">
			       <h3 class="font-thin" style="float: left; margin-right:10px;"><?php echo $title?></h3>
			        <small class="text-muted inline m-b-sm"><?php echo $sub_title;?></small>
			    </div>
			                    	
			    <button class="btn btn-default btn-rounded" style="float: right;" onclick="javascript: window.location.href='<?php echo $ctrlUrl?>'">
			    	<i class="i i-list2"></i> Back
			    </button>
			                    
			</div>

			<section class="panel panel-default">
 
                <div class="panel-body">
                    
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">   
                    <input type="hidden" value="1" name="_cors"/>
                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Image</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-12">

                        <?php if(isset($record->image_url) && $record->image_url != NULL):?>
                            <img src="<?php echo base_url()?>uploads/banners/<?php echo $record->image_url?>" class="m-b-md b b-success" width="1000"/>                         
                        <?php endif;?> 

                        <input type="file" class="filestyle" name="userfile" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                        <div class="help-block">
                            Upload the Wall Image file | Allowed *.jpg, *.png | Res. 1800 X 400 Pixels  | Maximum File Size 800KB                      
                        </div>
                        
                        <?php if(form_error('userfile')):?>
                            <div class="error_info">

                                <?php echo form_error('userfile');?> ...
                            </div> 
                        <?php endif;?>                        
                        
                      </div>
                      
                    </div>  
 
                    <div class="line line-dashed b-b line-lg pull-in"></div>  
                    
                    <div class="form-group">
                        
                      <div class="col-sm-4">
                        <button type="button" class="btn btn-default" onclick="javascript: location.href='<?php echo $ctrlUrl?>'">Back</button>
                        <button type="submit" class="btn btn-primary">Change image</button>
                      </div>
                        
                    </div>
                    
                  </form>
                    
                </div>
    
       		</section>

</section>