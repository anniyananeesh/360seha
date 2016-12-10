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
                    <input type="hidden" value="1" name="_cors"/>
                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Image</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-12">
                          
                        <input type="file" class="filestyle" name="userfile" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                        <div class="help-block">
                            Upload the Image file | Allowed *.jpg, *.png | Res. 640 X 400 Pixels  | Maximum File Size 800KB                      
                        </div>
                        
                        <?php if(form_error('userfile')):?>
                            <div class="error_info">

                                <?php echo form_error('userfile');?> ...
                            </div> 
                        <?php endif;?>                        
                        
                      </div>
                      
                    </div>   

                    <div class="clearfix"></div>

                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Department <span class="required-txt">*</span></strong></label>
                         <div class="clearfix"></div>
                      <div class="col-sm-12">
                          
                              <select class="chosen-select" name="dept_fk[]" id="dept_fk" style="width:350px;" multiple="true" />
                                   <?php foreach($department AS $data):?>
                                    <option value="<?php echo $data->dept_id;?>"><?php echo $data->dept_title;?></option>
                                  <?php endforeach;?>
                              </select>

                              <?php if(form_error('dept_fk')):?>
                                  <div class="error_info">
                                    <?php echo form_error('dept_fk');?> ...
                                  </div> 
                              <?php endif;?>

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