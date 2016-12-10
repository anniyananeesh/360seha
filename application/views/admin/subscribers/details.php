<?php $this->load->view( ADMIN_URL.'subscribers/sections/map-js');?>
<?php $this->load->view( ADMIN_URL.'subscribers/sections/js-partial');?>
<section class="scrollable padder">
    
    <?php $parent_id = $category->id_category_parent; $parent_arr = array();?>
                                  
    <?php while($this->category_service->has_parent($parent_id)):?>

        <?php 
          $parent = $this->category_service->get_category_by_pk($parent_id);
          $parent_id = $parent->id_category_parent;
          array_push($parent_arr, $parent->name);
        ?>

    <?php endwhile;?>

    <?php 

        $parent_arr = array_reverse($parent_arr); 
        $parent_arr = implode(' . ', $parent_arr);
    ?> 

    <div class="m-b-md">
        <h3 class="m-b-none"><?php echo $title;?> - <?php echo $parent_arr.' . '.$category->name;?></h3>
    </div>
 
    <section class="panel panel-default">
 
        <div class="panel-body">
 
                    <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
 
                        <div class="col-md-12"> 
 
                            <section class="panel panel-default"> 
                                <header class="panel-heading bg-light"> 
                                    <ul class="nav nav-tabs nav-justified"> 
                                        <li class="active"><a href="#english" data-toggle="tab">English</a></li> 
                                        <li class=""><a href="#arabic" data-toggle="tab">Arabic</a></li>
                                    </ul> 
                                </header> 

                                <div class="panel-body"> 
                                    <div class="tab-content"> 
                                        <div class="tab-pane active" id="english">
                                            <?php echo $this->load->view( ADMIN_URL.'subscribers/sections/add/en-details');?>
                                        </div> 
                                        <div class="tab-pane" id="arabic">
                                            <?php echo $this->load->view( ADMIN_URL.'subscribers/sections/add/ar-details');?>
                                        </div>
                                    </div> 
                                </div> 

                            </section>
 
                        </div>
 
                    <div class="line line-dashed b-b  pull-in"></div>
 
                    <h4 class="font-thin text-center text-success" style="margin-top: 50px;"><i class="i i-user3"></i> General Information</h4>
                    
                    <?php $this->load->view(ADMIN_URL.'subscribers/sections/add/logo');?>
                    
                    <div class="line line-dashed b-b pull-in"></div>
                      
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Subscriber Public URL <span class="required-txt">*</span></strong></label>
                        <div class="col-sm-10">

                            <span class="h5 pull-left text-dark m-r-sm" style="padding-top: 8px;">http://360seha.com/</span>
                            <input type="text" autofocus autocomplete="off" class="form-control pull-left m-r-sm" style="width: 200px;" name="subs_public_profile" id="subs_public_profile" value="<?php echo set_value('subs_public_profile');?>"/>
                            <div class="ajx_rst_ldr pull-left"></div>
                            <div class="clearfix"></div>
                            <?php if(form_error('subs_public_profile')):?>
                              <div class="error_info">

                                  <?php echo form_error('subs_public_profile');?> ...
                              </div> 
                            <?php endif;?>
                        </div>
                    </div>
 
                    <?php if($child):?>
                    <div class="line line-dashed b-b pull-in"></div>
                    <div class="form-group">
                            
                        <label class="col-sm-2 control-label" for="input-id-1"><strong>Choose Specialization <span class="required-txt">*</span></strong></label>
                        <div class="col-sm-10">

                          <div class="row">
                            <div class="col-md-3">
                                
                                <select data-placeholder="Choose Specializations..." style="width: 450px;" name="splzn[]" class="chosen-select" multiple>
                                    <?php foreach($child AS $cld):?>
                                    <option value="<?php echo $cld->id_category?>"
                                            <?php if(isset($post['splzn']) && in_array($cld->id_category, $post['splzn'])):?> 
                                                selected="selected"
                                            <?php endif;?>>
                                                <?php echo $cld->name?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                                
                              <?php if(form_error('splzn[]')):?>
                                  <div class="error_info">

                                      <?php echo form_error('splzn[]');?>
                                  </div> 
                              <?php endif;?>
                            </div>

                          </div> 

                        </div>
                            
                    </div>
                    
                    <?php endif;?>
                    
                    <?php if($category->type == 1):?>
                    
                        <div class="line line-dashed b-b  pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label" for="input-id-1"><strong>Medical Center <span class="required-txt">*</span></strong></label>
                          <div class="col-sm-10">
                            <div class="row">
                              <div class="col-md-4">

                                <select style="width:360px; padding: 5px 8px;" class="chosen-select" name="subs_medical_center" id="subs_medical_center"/>
                                    <option value="">Choose Medical Center</option> 
                                    <?php foreach ($medical_centers AS $mdlCtr):?>
                                    <option value="<?php echo $mdlCtr->subs_title?>" <?php echo set_select('subs_medical_center', $mdlCtr->subs_title)?> ><?php echo $mdlCtr->subs_title?></option>
                                    <?php endforeach;?>

                                </select>
                                <?php if(form_error('subs_medical_center')):?>
                                    <div class="error_info">

                                        <?php echo form_error('subs_medical_center');?>
                                    </div> 
                                <?php endif;?>
                              </div> 

                            </div> 

                          </div>
                        </div>

                        <script type="text/javascript">

                            $(function(){
                                $(document).on('change', '#subs_medical_center', DoGetMedicalCenterContactDetails); 
                            });

                            function DoGetMedicalCenterContactDetails()
                            {
                                var mdlCtrId = $(this).val();
                                if(mdlCtrId !== "")
                                {
                                    $.get('<?php echo base_url()?>async/getMdlCtrDetails/'+mdlCtrId, {}, function(rs){
                                        if(!rs.error)
                                        {
                                            $("#ad1").val(rs.data.subs_address_1);
                                            $("#ad1_ar").val(rs.data.subs_address_1_ar);
                                            $("#state").val(rs.data.subs_state).chosen().trigger("chosen:updated");

                                            if($("#state").trigger('change'))
                                            {
                                                $("#city").val(rs.data.city).chosen().trigger("chosen:updated");
                                            }
                                            $("#zipcode").val(rs.data.zipcode);
                                        }
                                    }, 'json');
                                }

                                return false;
                            }

                        </script>
                        
                    <?php endif;?>
                            
                    <div class="line line-dashed b-b  pull-in"></div>
                    <?php $this->load->view(ADMIN_URL.'subscribers/sections/add/address')?>
                    <div class="line line-dashed b-b  pull-in"></div>
                    <?php $this->load->view(ADMIN_URL.'subscribers/sections/add/contact')?>
                    <input type="hidden" name="subscriber_type" id="subscriber_type" value="<?php echo $category->type;?>"/>

                    <?php if($category->type == 1):?>
                        <?php $this->load->view(ADMIN_URL.'subscribers/sections/add/dr-partial');?>
                    <?php endif;?>
                    <div class="line line-dashed b-b  pull-in"></div>
                    <?php $this->load->view(ADMIN_URL.'subscribers/sections/add/timing');?>
                    <div class="line line-dashed b-b  pull-in"></div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label"><strong>Subscriber has emergency service?</strong></label>
                        <div class="col-sm-4">

                            <div class="col-sm-12">

                              <label class="switch left">
                                  <input type="checkbox" value="1" name="has_emergency" <?php echo (isset($_POST['has_emergency'])) ? 'checked': '';?>/>
                                  <span></span>
                              </label> 

                            </div>

                        </div>

                    </div> 

                    <div class="line line-dashed b-b  pull-in"></div>
                    <?php $this->load->view(ADMIN_URL.'subscribers/sections/add/location');?>
                    <?php $this->load->view(ADMIN_URL.'subscribers/sections/menu-access', array( 'access' => (isset($access)) ? $access : array()));?>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="input-id-1"><strong>Publish Profile On <span class="required-txt">*</span></strong></label>
                        <div class="col-sm-10">
                            <div class="row">
                                
                                <div class="col-md-3">

                                  <select style="width:360px; padding: 5px 8px;" name="publish_on"/>
                                        <option value="" selected="selected">Choose Languages</option> 

                                        <option value="Arabic" <?php echo set_select('publish_on', 'Arabic')?>>Arabic</option>
                                        <option value="English" <?php echo set_select('publish_on', 'English')?>>English</option>
                                        <option value="All" <?php echo set_select('publish_on', 'All')?>>Both</option>

                                  </select>
                                  <?php if(form_error('publish_on')):?>
                                      <div class="error_info">

                                          <?php echo form_error('publish_on');?>
                                      </div> 
                                  <?php endif;?>
                                </div>

                            </div> 

                        </div>

                    </div>

                    <div class="line line-dashed b-b  pull-in"></div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button type="button" class="btn btn-default" onclick="javascript: location.href='<?php echo base_url().ADMIN_URL?>subscribers/'">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>

    </form>

    </div>
        
</section>
    
</section>