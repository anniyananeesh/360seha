
<script type="text/javascript">
    
    $(function(){
 
        $("#splzn").chosen({
           width: '100%'
        });
        
        $("#subs_cat").chosen({
            width: '100%'
        });
        
    });
     
    
</script>
<section class="scrollable padder">

    <div class="m-b-md">
        <h3 class="m-b-none"><?php echo $title;?></h3>
    </div>
 
    <section class="panel panel-default">
 
        <div class="panel-body">
            
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
                
                <div class="form-group">
                    <label class="col-sm-12 control-label"><strong>Upload Logo </strong></label>
                    <div class="clearfix"></div>
                    <div class="col-md-12 pull-left">
 
                        <input type="file" class="filestyle m-t-lg pull-left" 
                           name="userfile" 
                           data-icon="false" 
                           data-classButton="btn btn-default" 
                           data-classInput="form-control inline v-middle input-s">
                        <div class="help-block text-muted">
                          Allowed <?php echo $initFileTypes?> | Res. <?php echo $initImageConfig['thumb_width']['value']?> X <?php echo $initImageConfig['thumb_height']['value']?> Pixels | Maximum File Size <?php echo $initImageConfig['max_size']['value']?> KB                      
                        </div>

                        <?php if(form_error('userfile')):?>
                            <div class="error_info">
                                <?php echo form_error('userfile');?>
                            </div>
                        <?php endif;?>

                    </div>
 
                </div>

                <div class="clearfix"></div>
                
                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-id-1"><strong>Category <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-md-4">

                        <select style="width:360px; padding: 5px 8px;" name="subs_cat" id="subs_cat"/>
                            <option value="">Choose Category</option> 
                            <?php foreach ($categories AS $c):?>
                            <option value="<?php echo $c['id']?>" <?php echo set_select('subs_cat', $c['id'])?> ><?php echo $c['name']?></option>
                            <?php endforeach;?>
                        </select>
                        <?php if(form_error('subs_cat')):?>
                            <div class="error_info">
                                <?php echo form_error('subs_cat');?>
                            </div> 
                        <?php endif;?>
                        
                    </div>
                </div>
                
                <script type="text/javascript">
                    
                    $(function(){
                        $(document).on('change', '#subs_cat', doChangeSubCats);
                    });
                    
                    function doChangeSubCats()
                    {
                        var catId = $(this).val(),
                            html = '';
 
                        $.get('<?php echo base_url().ADMIN_URL?>async/get_children/'+catId, {}, function(res){

                            for(i=0; i<res.length; i++){
                                html += '<option value="'+res[i].id_category+'">'+res[i].name+'</option>';
                                html += '<option value="'+res[i].id_category+'">'+res[i].name_ar+'</option>';
                            }
                            $('#splzn').html(html);
                            $("#splzn").chosen().trigger("chosen:updated");
                            
                        }, 'json');
                    }
                    
                </script>
                
                <div class="line line-dashed b-b  pull-in"></div>

                <div class="form-group">

                    <label class="col-sm-2 control-label" for="input-id-1"><strong>Choose Specialization</strong></label> <!-- <span class="required-txt">*</span>-->
                    <div class="clearfix"></div>
                    <div class="col-md-12">
 
                        <select id="splzn" style="width: 500px;" name="splzn[]" multiple>

                            <?php if(isset($child) && $child):?>
                                <?php foreach($child AS $cld):?>
                                <option value="<?php echo $cld->id_category?>"
                                        <?php if(isset($post['splzn']) && in_array($cld->id_category, $post['splzn'])):?> 
                                            selected="selected"
                                        <?php endif;?>>
                                            <?php echo $cld->name?>
                                </option>
                                <option value="<?php echo $cld->id_category?>"
                                        <?php if(isset($post['splzn']) && in_array($cld->id_category, $post['splzn'])):?> 
                                            selected="selected"
                                        <?php endif;?>>
                                            <?php echo $cld->name_ar?>
                                </option>
                                <?php endforeach;?>
                            <?php endif;?>

                        </select>

                        <?php if(form_error('splzn[]')):?>
                            <div class="error_info">
                                <?php echo form_error('splzn[]');?>
                            </div> 
                        <?php endif;?>

                    </div>

                </div>
                
                <div class="line line-dashed b-b pull-in"></div>
                
                <div class="form-group">

                    <label class="col-sm-2 control-label"><strong>Subscriber Title <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-sm-4">
                        <label>English</label>
                        <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('title')):?>has-error<?php endif;?>" name="title" id="title" value="<?php echo set_value('title');?>"/>
                        <?php if(isset($post) && ($post["title"] == "" && $post["title_ar"] == "")):?>
                            <div class="error_info">
                                Fill in either English or Arabic title for the subscriber
                            </div> 
                        <?php endif;?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-4 p-t-md">
                        <label>Arabic</label>
                        <input type="text" autofocus autocomplete="off" class="form-control txt-AlignARtl <?php if(form_error('title_ar')):?>has-error<?php endif;?>" name="title_ar" id="title_ar" value="<?php echo set_value('title_ar');?>"/>
                    </div>
                    <div class="clearfix"></div>

                </div>
                
                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label"><strong>Subscriber's Details (Short)</strong></label>
                    <div class="clearfix"></div>
                    <div class="col-md-4">
                        <label>English</label>
                        <textarea name="description" id="description" class="form-control <?php if(form_error('description')):?>has-error<?php endif;?>" style="overflow:scroll;height:60px;max-height:150px"><?php echo set_value('description');?></textarea>
 
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="col-md-4 p-t-md">
                        <label>Arabic</label>
                        <textarea name="description_ar" id="description_ar" class="form-control txt-AlignARtl <?php if(form_error('description_ar')):?>has-error<?php endif;?>" style="overflow:scroll;height:60px;max-height:150px"><?php echo set_value('description_ar');?></textarea>
 
                    </div>

                </div>
                
                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                    <label class="col-sm-12 control-label"><strong>Location <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <label>Latitude</label>
                        <input type='text' id="latitude" class="form-control <?php if(form_error('latitude')):?>has-error<?php endif;?>" name="latitude" value="<?php echo set_value('latitude');?>" title="Latitude"/>
                    </div> 
                    <div class="col-md-6">
                        <label>Longitude</label>
                        <input type='text' id="longitude" class="form-control <?php if(form_error('longitude')):?>has-error<?php endif;?>" name="longitude" value="<?php echo set_value('longitude');?>" title="Longitude"/> 
                    </div>
                    
                    <div class="clearfix"></div>
                    <?php if(form_error('latitude') || form_error('longitude')):?>
                        <div class="error_info p-l-md">
                            Latitude and longitude required in order to show subscriber location on Google Maps
                        </div>
                    <?php endif;?>
                    
                    <div class="clearfix"></div>
                    <div class="col-md-6 p-t-md">
                        <label>Emirates? <span class="required-txt">*</span></label>
                            <div class="clearfix"></div>
                            <select name="state" id="state"/>
                                <option value="">Choose Emirate</option>
                                <?php foreach($cities as $c):?>
                                    <option value="<?php echo $c->id?>" <?php echo (isset($post) && $post["state"] == $c->id) ? 'selected="selected"' : '';?>><?php echo $c->name?></option>
                                <?php endforeach;?>

                            </select>

                            <?php if(form_error('state')):?>
                                <div class="error_info">

                                   <?php echo form_error('state');?> ...
                                </div> 
                            <?php endif;?>
                    </div> 
                    <div class="col-md-6 p-t-md">
                        <label>Area <span class="required-txt">*</span></label>
                        <div class="clearfix"></div>
                        <select name="city" id="city"/>   
                            <option value="">Choose Area</option>
                            <?php if($regions && count($regions) > 0):?>
                                <?php foreach($regions as $r):?>
                                    <option value="<?php echo $r->id?>" <?php echo ($post["city"] == $r->id) ? 'selected="selected"' : '';?>><?php echo $r->reg_name?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>

                        <?php if(form_error('city')):?>
                            <div class="error_info">

                               <?php echo form_error('city');?> ...
                            </div> 
                        <?php endif;?>
                    </div>
                    
                    <div class="clearfix"></div>
                    <script type="text/javascript">

                        $(function(){
                            $(document).on('change', '#state', doResRegions);
                            $("#city").chosen({width: '100%'});
                            $("#state").chosen({width: '100%'});
                        });

                        function doResRegions()
                        {
                            var cityId = $("#state :selected").val();
                            $.get('<?php echo base_url()?>async/get_city_regions/'+cityId, {}, function(res){
                                $('#city').html('<option value="" selected="selected"></option>'); 
                                if(res){

                                    var opt = '';
                                    for(i=0; i<res.length; i++){
                                        opt += '<option value="'+res[i].id+'" selected="selected">'+res[i].reg_name+'</option>';
                                    }

                                    $('#city').html(opt);
                                    $("#city").chosen().trigger("chosen:updated");

                                }

                            }, 'json');

                        }

                    </script>

                </div>

                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">
                    <label class="col-sm-12 control-label"><strong>Access </strong></label>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <label class="m-r-sm">
                            <input type="checkbox" name="access[]" value="doctors"> Doctors
                        </label>
                        <label class="m-r-sm">
                            <input type="checkbox" name="access[]" value="services"> Services
                        </label>
                        <label class="m-r-sm">
                            <input type="checkbox" name="access[]" value="offers"> Offers
                        </label>
                        <label class="m-r-sm">
                            <input type="checkbox" name="access[]" value="news"> News
                        </label>
                        <label class="m-r-sm">
                            <input type="checkbox" name="access[]" value="insurance"> Insurance
                        </label>

                        <label class="m-r-sm">
                            <input type="checkbox" name="access[]" value="articles"> Articles
                        </label>

                        <label class="m-r-sm">
                            <input type="checkbox" name="access[]" value="photos"> Photos
                        </label>
                        <label class="m-r-sm">
                            <input type="checkbox" name="access[]" value="videos"> Videos
                        </label>

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