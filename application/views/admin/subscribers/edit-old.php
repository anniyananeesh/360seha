<section class="pos-abt" id="gmap_canvas" style="z-index: 25000;"></section>

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
 
                        <div class="col-md-5"> 
 
                                <ul class="nav nav-tabs"> 
                                        <li class="active"><a href="#english" data-toggle="tab">English</a></li> 
                                        <li class=""><a href="#arabic" data-toggle="tab">Arabic</a></li>
                                    </ul> 

                                <div class="panel-body"> 
                                    <div class="tab-content"> 
                                        <div class="tab-pane active" id="english">
                                            <?php echo $this->load->view( ADMIN_URL.'subscribers/sections/edit/en-details', array('config'=>$config));?>
                                        </div> 
                                        <div class="tab-pane" id="arabic">
                                            <?php echo $this->load->view( ADMIN_URL.'subscribers/sections/edit/ar-details', array('config'=>$config));?>
                                        </div>
                                    </div> 
                                </div>  
 
                        </div>
                        
                        <div class="col-md-4">
                            ss
                            
                        </div>
                        
                        <div class="clearfix"></div>
 
                    <div class="line line-dashed b-b  pull-in"></div>
 
                    <h4 class="font-thin text-center text-success" style="margin-top: 50px;"><i class="i i-user3"></i> General Information</h4>
                    
                    <div class="line line-dashed b-b  pull-in"></div>
                    <?php //$this->load->view(ADMIN_URL.'subscribers/sections/edit/timing');?>
                    
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
                                    <option value="<?php echo $mdlCtr->subs_title?>" <?php if($mdlCtr->subs_title == $post['subs_medical_center']):?> selected<?php endif;?>><?php echo $mdlCtr->subs_title?></option>
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

                                            $("#ad2").val(rs.data.subs_address_2);
                                            $("#ad2_ar").val(rs.data.subs_address_2_ar);
 
                                            $("#state").val(rs.data.subs_state).chosen().trigger("chosen:updated"); 

                                            $.get('<?php echo base_url()?>async/get_city_regions/'+rs.data.subs_state, {}, function(res){

                                                $('#city').html('<option value="" selected="selected"></option>'); 
                                                if(res){

                                                    var opt = '';
                                                    for(i=0; i<res.length; i++){
                                                        opt += '<option value="'+res[i].id+'" selected="selected">'+res[i].reg_name+'</option>';
                                                    }

                                                    $('#city').html(opt);
                                                    $("#city").chosen().trigger("chosen:updated");

                                                    cb(rs.data.city);
                                                }

                                            }, 'json'); 

                                            $("#zipcode").val(rs.data.zipcode);
                                        }
                                    }, 'json');
                                }

                                return false;
                            } 

                            function cb(city){

                                $("#city").val(city);
                                $("#city").trigger("chosen:updated");
                            }
                        </script>
                        
                    <?php endif;?>
                        

                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">

                        <label class="col-sm-3 control-label"><strong>Website URL</strong></label>
                        <div class="col-sm-9">
                            <input type="text" autofocus autocomplete="off" class="form-control" name="url" id="url" value="<?php echo $post['url'];?>"/>
                            <?php if(form_error('url')):?>
                                <div class="error_info">
                                    <?php echo form_error('url');?>
                                </div> 
                            <?php endif;?>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                            
                    <div class="line line-dashed b-b  pull-in"></div>
                    <?php $this->load->view(ADMIN_URL.'subscribers/sections/edit/address')?>
                    <div class="line line-dashed b-b  pull-in"></div>
                    <?php $this->load->view(ADMIN_URL.'subscribers/sections/edit/contact')?>
                    <input type="hidden" name="subscriber_type" id="subscriber_type" value="<?php echo $category->type;?>"/>
                    
                    <div class="line line-dashed b-b  pull-in"></div>
                    <?php //$this->load->view(ADMIN_URL.'subscribers/sections/edit/location');?>
                    
                    <?php if($category->type == 1):?>
                        <?php $this->load->view(ADMIN_URL.'subscribers/sections/edit/dr-partial');?>
                    <?php endif;?>
                    
                    
<?php if($child):?>
<div class="line line-dashed b-b pull-in"></div>
<div class="form-group">

    <label class="col-sm-3 control-label" for="input-id-1"><strong>Choose Specialization <span class="required-txt">*</span></strong></label>
    <div class="col-sm-9">

      <div class="row">
        <div class="col-md-3">

            <select data-placeholder="Choose Specializations..." style="width: 450px;" name="splzn[]" class="chosen-select" multiple>
                <?php foreach($child AS $cld):?>
                <option value="<?php echo $cld->id_category?>"
                        <?php if(isset($splzn) && in_array($cld->id_category, $splzn)):?> 
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
                    
                    <div class="line line-dashed b-b  pull-in"></div>
                    
                    <div class="form-group">
 
                        <label class="col-sm-2 control-label"><strong>Subscriber has emergency service?</strong></label>
                        <div class="col-sm-4">

                            <div class="col-sm-12">

                              <label class="switch left">
                                  <input type="checkbox" value="1" name="has_emergency" <?php if(isset($post["has_emergency"]) && $post["has_emergency"] == 1):?> checked="checked"<?php endif;?>/>
                                  <span></span>
                              </label> 

                            </div>

                        </div>

                    </div> 
                    
                    <?php $this->load->view(ADMIN_URL.'subscribers/sections/menu-access', array( 'access' => (isset($access)) ? $access : array()));?>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label" for="input-id-1"><strong>Publish Profile On <span class="required-txt">*</span></strong></label>
                        <div class="col-sm-10">
                            <div class="row">
                                
                                <div class="col-md-3">

                                  <select style="width:360px; padding: 5px 8px;" name="publish_on"/>
                                        <option value="" selected="selected">Choose Languages</option> 

                                        <option value="Arabic" <?php if($post["publish_on"] == 'Arabic'):?> selected="selected"<?php endif;?>>Arabic</option>
                                        <option value="English" <?php if($post["publish_on"] == 'English'):?> selected="selected"<?php endif;?>>English</option>
                                        <option value="All" <?php if($post["publish_on"] == 'All'):?> selected="selected"<?php endif;?>>Both</option>

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