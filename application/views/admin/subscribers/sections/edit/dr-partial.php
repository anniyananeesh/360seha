<div id="show_physician_section">

    <div class="line line-dashed b-b line-lg pull-in"></div>

    <div class="form-group">

      <label class="col-sm-2 control-label" for="input-id-1"><strong>Doctor Visiting? <span class="required-txt">*</span></strong></label>

      <div class="col-sm-10">

        <div class="row">

            <div class="col-md-3">
              <div class="clearfix"></div>
              <select style="width:200px; padding: 5px 8px;" name="dr_nature" id="dr_nature"/>

                  <option value="" selected="selected">Choose Nature</option>
                  <option value="1" <?php if($post["is_visiting"] == 1):?> selected="selected"<?php endif;?>>Yes</option>
                  <option value="0" <?php if($post["is_visiting"] == 0):?> selected="selected"<?php endif;?>>No</option>
              </select> 
              <?php if(form_error('dr_nature')):?>
                <div class="error_info">

                    <?php echo form_error('dr_nature');?> ...
                </div> 
            <?php endif;?>

            </div>
 
            <div class="col-md-7" 
                 id="show-visit-timings" 
                 style="<?php if($post["is_visiting"] == 1):?> display: block;<?php else:?> display: none;<?php endif;?>"
                 >

                <label>Visiting Times <span class="required-txt">*</span></label>
                <div class="clearfix"></div>
                <input type="text" autocomplete="off" data-date-format="dd/mm/yyyy" class="form-control pull-left" id="dpd1" name="dpd1" value="<?php echo ($post["is_visiting"] == 1) ? date('d/m/Y', strtotime($post["dpd1"])): '';?>" style="width: 150px;" placeholder="From"/>
                <input type="text" autocomplete="off" data-date-format="dd/mm/yyyy" class="form-control pull-left m-l-sm" id="dpd2" name="dpd2" value="<?php echo ($post["is_visiting"] == 1) ? date('d/m/Y', strtotime($post["dpd2"])): '';?>" style="width: 150px;" placeholder="To"/>
                <div class="clearfix"></div>
                <?php if(form_error('dpd1')):?>
                    <div class="error_info">

                        <?php echo form_error('dpd1');?> ...
                    </div> 
                <?php endif;?>
                
            </div>
            
            <script type="text/javascript">

                $(function(){

                    $(document).on('change', '#dr_nature', doShowDrTimings);

                });

                function doShowDrTimings()
                {
                    if($(this).val() == '1'){
                        $('#show-visit-timings').fadeIn(250);
                    }else if($(this).val() == '0' || $(this).val() == ''){
                        $('#show-visit-timings').fadeOut(250);
                    }
                    return false;
                }

            </script>

        </div> 

      </div>

    </div>


    <div class="line line-dashed b-b line-lg pull-in"></div>

    <div class="form-group">

        <label class="col-sm-2 control-label" for="input-id-1"><strong>Languages <span class="required-txt">*</span></strong></label>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-md-3">

              <select style="width:360px; padding: 5px 8px;" name="subs_languages"/>
                    <option value="" selected="selected">Choose Languages Spoken</option> 

                    <option value="Arabic" <?php if($post["subs_languages"] == 'Arabic'):?> selected="selected"<?php endif;?>>Arabic</option>
                    <option value="English" <?php if($post["subs_languages"] == 'English'):?> selected="selected"<?php endif;?>>English</option>
                    <option value="All" <?php if($post["subs_languages"] == 'All'):?> selected="selected"<?php endif;?>>Both</option>

              </select>
              <?php if(form_error('subs_languages')):?>
                  <div class="error_info">

                      <?php echo form_error('subs_languages');?>
                  </div> 
              <?php endif;?>
            </div>

          </div> 

        </div>
  </div>

    <div class="line line-dashed b-b line-lg pull-in"></div>

        <div class="form-group">
  <label class="col-sm-2 control-label" for="input-id-1"><strong>Gender <span class="required-txt">*</span></strong></label>
  <div class="col-sm-10">
    <div class="row">
      <div class="col-md-3">

        <select style="width:360px; padding: 5px 8px;" name="subs_gender"/>
            <option value="">Choose Gender</option> 
            <option value="male" <?php if($post["subs_gender"] == 'male'):?> selected="selected"<?php endif;?>>Male</option>
            <option value="female" <?php if($post["subs_gender"] == 'female'):?> selected="selected"<?php endif;?>>Female</option>
            <option value="other" <?php if($post["subs_gender"] == 'other'):?> selected="selected"<?php endif;?>>Other</option>

        </select>
        <?php if(form_error('subs_gender')):?>
            <div class="error_info">

                <?php echo form_error('subs_gender');?>
            </div> 
        <?php endif;?>
      </div> 

    </div> 

  </div>
</div>

    <div class="line line-dashed b-b line-lg pull-in"></div>

        <div class="form-group">
  <label class="col-sm-2 control-label" for="input-id-1"><strong>Experience <span class="required-txt">*</span></strong></label>
  <div class="col-sm-10">
    <div class="row">
      <div class="col-md-3">

        <input type="text" autocomplete="off" class="form-control"  name="exp" value="<?php echo $post["exp"];?>"/>
        <?php if(form_error('exp')):?>
            <div class="error_info">

                <?php echo form_error('exp');?> ...
            </div> 
        <?php endif;?>
      </div> 

    </div> 

  </div>
</div>

</div>

<script type="text/javascript">
    
    $(function(){
        
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {

            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date){
              
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
        
    })
    
</script>