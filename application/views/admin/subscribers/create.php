<link href="<?php echo PLUGINS_PATH?>/sumoselect3/sumoselect.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo PLUGINS_PATH?>/sumoselect3/jquery.sumoselect.min.js"></script>

<style type="text/css">
    
    .SumoSelect > .CaptionCont 
    {
        border: 1px solid #5185ae;
        background: #fff;
        border-radius: 2px;
        width: 100%!important;
    }

    .SumoSelect > .CaptionCont > span, .SumoSelect > .CaptionCont > span.placeholder
    {
        color: #333;
    }

</style>

<section class="scrollable padder">

    <div class="m-b-md">
        <h3 class="m-b-none"><?php echo $title;?></h3>
    </div>
    

    <?php if($this->session->flashdata('message')):?>
    
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-ok-sign"></i>
            <?php echo $this->session->flashdata('message');?>
        </div>
    
    <?php endif;?>
    
    <?php if(isset($Error) && $Error == 'Y'):?>
    
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-ok-sign"></i>
            <?php echo $MSG;?>
        </div>
    
    <?php endif;?>
    
    <section class="panel panel-default">
 
        <div class="panel-body">
            
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
 
                <div class="form-group">

                    <label class="col-sm-2 control-label"><strong>Subscriber Title <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-sm-4">
                        <label>English</label>
                        <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('name_en')):?>has-error<?php endif;?>" name="name_en" id="name_en" value="<?php echo set_value('name_en');?>"/>
                        <?php if(isset($post) && ($post["name_en"] == "" && $post["name_en"] == "")):?>
                            <div class="error_info">
                                Fill in either English and Arabic title for the subscriber
                            </div> 
                        <?php endif;?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-4 p-t-md">
                        <label>Arabic</label>
                        <input type="text" autofocus autocomplete="off" class="form-control txt-AlignARtl <?php if(form_error('name_ar')):?>has-error<?php endif;?>" name="name_ar" id="name_ar" value="<?php echo set_value('name_ar');?>"/>
                    </div>
                    <div class="clearfix"></div>

                </div>
                
                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1"><strong>Category <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-md-4">

                        <select style="width:360px; padding: 5px 8px;" name="category" id="category"/>
                            <option value="">Choose Category</option> 
                            <?php foreach ($categories AS $data):?>
                            <option value="<?php echo $data->id_category?>" <?php echo set_select('category', $data->id_category)?> ><?php echo $data->name_en?></option>
                            <?php endforeach;?>
                        </select>
                        <?php if(form_error('category')):?>
                            <div class="error_info">
                                <?php echo form_error('category');?>
                            </div> 
                        <?php endif;?>
                        
                    </div>
                </div> 

                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1"><strong>Departments <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-md-6">

                        <select multiple="multiple" style="width:360px; padding: 5px 8px;" name="departments[]" id="departments" class="departments" />
                             <?php foreach ($departments AS $data):?>
                            <option value="<?php echo $data->dept_id?>" <?php echo (in_array($data->dept_id, $post['departments'])) ? 'selected' : '';?>><?php echo $data->dept_title_en?></option>
                            <?php endforeach;?>
                        </select>
                        <?php if(form_error('departments')):?>
                            <div class="error_info">
                                <?php echo form_error('departments');?>
                            </div> 
                        <?php endif;?>
                        
                    </div>
                </div>

                <script type="text/javascript">
                              
                    $(function(){
                        
                        $('.departments').SumoSelect({ placeholder: 'Choose departments', csvDispCount: 5, search: true});

                    });

                </script>
                
                <div class="line line-dashed b-b  pull-in"></div> 

                <div class="form-group">

                    <label class="col-sm-2 control-label"><strong>Email Address <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-sm-4"> 
                        <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('email')):?>has-error<?php endif;?>" name="email" id="email" value="<?php echo set_value('email');?>"/>
                        <?php if(form_error('email')):?>
                            <div class="error_info">
                                <?php echo form_error('email');?>
                            </div> 
                        <?php endif;?>
                    </div>
                    <div class="clearfix"></div> 

                </div>

                <div class="line line-dashed b-b  pull-in"></div> 

                <div class="form-group">

                    <label class="col-sm-2 control-label"><strong>Contact No. <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-sm-4"> 
                        <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('contact_no')):?>has-error<?php endif;?>" name="contact_no" id="contact_no" value="<?php echo set_value('contact_no');?>"/>
                        <?php if(form_error('contact_no')):?>
                            <div class="error_info">
                                <?php echo form_error('contact_no');?>
                            </div> 
                        <?php endif;?>
                    </div>
                    <div class="clearfix"></div> 

                </div>

                <div class="line line-dashed b-b  pull-in"></div> 

                <div class="form-group">

                    <label class="col-sm-2 control-label"><strong>Location <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-sm-4"> 
                        <label>Latitude</label>
                        <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('latitude')):?>has-error<?php endif;?>" name="latitude" id="latitude" value="<?php echo set_value('latitude');?>"/>
                        <?php if(form_error('latitude')):?>
                            <div class="error_info">
                                <?php echo form_error('latitude');?>
                            </div> 
                        <?php endif;?>
                    </div>

                    <div class="col-sm-4"> 
                        <label>Longitude</label>
                        <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('longitude')):?>has-error<?php endif;?>" name="longitude" id="longitude" value="<?php echo set_value('longitude');?>"/>
                        <?php if(form_error('longitude')):?>
                            <div class="error_info">
                                <?php echo form_error('longitude');?>
                            </div> 
                        <?php endif;?>
                    </div>
                    <div class="clearfix"></div> 

                </div>
                
                <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Short Description English</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-6 editor-container">
                          <textarea name="description_en" id="description_en" class="form-control" style="overflow:scroll;height:140px;"><?php echo set_value('description_en');?></textarea>
                          <div class="clearfix"></div>
                          <?php if(form_error('description_en')):?>
                            <div class="error_info">
                              <?php echo form_error('description_en');?>
                            </div> 
                          <?php endif;?>
                      </div>

                    </div> 

                    <div class="clearfix"></div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
 
                <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Image</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-12">
                          
                        <input type="file" class="filestyle" name="userfile" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                        <div class="help-block">
                            Upload the Image file | Allowed *.jpg, *.png | Res. 640 X 640 Pixels  | Maximum File Size 800KB                      
                        </div>
                        
                        <?php if(form_error('userfile')):?>
                            <div class="error_info">

                                <?php echo form_error('userfile');?> ...
                            </div> 
                        <?php endif;?>                        
                        
                      </div>
                      
                    </div>    
                
                <div class="line line-dashed b-b  pull-in"></div>

                <div class="form-group">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-default" onclick="javascript: location.href='<?php echo base_url().ADMIN_URL?>subscribers/'">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
 
            </form>
            
        </div>
        
    </section>
    
</section>