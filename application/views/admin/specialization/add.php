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
	                          	<input type="text" autofocus autocomplete="off" class="form-control" name="title_en" id="title_en" value="<?php echo set_value('title_en');?>"/>
	                          
		                          <?php if(form_error('title_en')):?>
		                            <div class="error_info">
		                                                                
		                                <?php echo form_error('title_en');?> ...
		                            </div> 
		                          <?php endif;?>
	                      	</div>
	                      	<div class="clearfix"></div>
	                      	<div class="col-sm-4 p-t-md">

	                      		<label>Arabic</label>
	                          	<input type="text" autofocus autocomplete="off" class="form-control" name="title_ar" id="title_ar" value="<?php echo set_value('title_ar');?>"/>
	                          
		                          <?php if(form_error('title_ar')):?>
		                            <div class="error_info">
		                                                                
		                                <?php echo form_error('title_ar');?> ...
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
                          
                              <select class="chosen-select" name="dept_fk" id="dept_fk"/>
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