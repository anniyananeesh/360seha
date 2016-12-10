<div class="form-group">
    
    <label class="col-sm-2 control-label"><strong>Address</strong></label>
    <div class="col-sm-10">
        
        <div class="row">
 
            <div class="col-md-3">
                <label>Emirates? <span class="required-txt">*</span></label>
                <div class="clearfix"></div>
                <select class="chosen-select" name="state" id="state"/>
                    <option value="">Choose Emirate</option>
                    <?php foreach($cities as $c):?>
                        <option value="<?php echo $c->id?>" <?php echo ($post["state"] == $c->id) ? 'selected="selected"' : '';?>><?php echo $c->name?></option>
                    <?php endforeach;?>

                </select>

                <?php if(form_error('state')):?>
                    <div class="error_info">

                       <?php echo form_error('state');?> ...
                    </div> 
                <?php endif;?>
            </div>

            <div class="col-md-3">
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

            <div class="col-md-3">
                <label>Country <span class="required-txt">*</span></label>
                <div class="clearfix"></div>
                <select class="chosen-select" name="country" value="<?php echo set_value('country');?>"/>
                    <option value="">Choose Country</option>
                    <?php foreach ($countries as $ctry):?>
                        <option value="<?php echo $ctry->country_code?>" <?php if($ctry->country_code == 'AE'):?> selected="selected"<?php endif;?>><?php echo $ctry->country_name?></option>
                    <?php endforeach;?>
                </select>
                <?php if(form_error('country')):?>
                    <div class="error_info">

                       <?php echo form_error('country');?> ...
                    </div> 
                <?php endif;?>

            </div>

            <script type="text/javascript">

                $(function(){
                    $(document).on('change', '#state', doResRegions);
                    $("#city").chosen({width: '80%'});
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

        <div class="clearfix"></div>
                        
    </div>
                      
</div> 