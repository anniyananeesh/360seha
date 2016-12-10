<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><i class="fa fa-plus-circle"></i> <?php echo $title;?></h3>
        <button class="btn btn-default btn-rounded" style="float: right; margin-top: -30px;" onclick="javascript: window.location.href='<?php echo $ctrlUrl?>'"><i class="i i-list2"></i> Back</button>
    </div>
    
    <section class="panel panel-default">
 
                <div class="panel-body">
                    
                    <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
 
                    <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Title</strong> <span class="required-txt">*</span></label>
                        <div class="clearfix"></div>
                      <div class="col-sm-3">
                          <select style="width: 430px" class="chosen-select pull-left m-l-md" name="subscriber" id="subscriber"/>

                            <option value="">Choose Subscriber</option>

                            <?php foreach($subscribers as $user):?>

                                <?php $_id = $this->encrypt->encode($user->user_id);?>
                                <option value="<?php echo $_id;?>" <?php echo ($user->user_id == $record->subscriber) ? 'selected' : ''?>><?php echo $user->subs_title;?></option>
                            <?php endforeach;?>

                          </select>
                          <?php if(form_error('subscriber')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('subscriber');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                        <div class="clearfix"></div> 
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Departments</strong> <span class="required-txt">*</span></label>
                        <div class="clearfix"></div>
                      <div class="col-sm-3">
                          <select style="width: 430px" class="chosen-select pull-left m-l-md" name="dept_id" id="dept_id"/>

                            <option value="">Choose</option> 

                            <?php foreach($departments as $key => $value):?>
 
                                <option value="<?php echo $value->id;?>" <?php echo ($value->id == $record->dept_id) ? 'selected' : ''?>><?php echo $value->title_en;?></option>
                            <?php endforeach;?>

                          </select>
                          <?php if(form_error('dept_id')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('dept_id');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                        <div class="clearfix"></div> 
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div> 

                    <script type="text/javascript">
                      
                      $(function(){

                          $(document).on('change','#subscriber',function(){

                              var subsID = $(this).val();

                              $.get('<?php echo HOST_URL?>/admin/async/get_departments/' + subsID, function(res){

                                  if(res.length > 0)
                                  {
                                     var html = '';

                                     for(i=0; i < res.length; i++)
                                     {
                                        html += '<option value="' + res[i].id + '">' + res[i].title_en + '</option>'
                                     }

                                     $('#dept_id').html(html);
                                     $("#dept_id").trigger("chosen:updated");
                                  }
                                  else
                                  {
                                    alert('No data found');
                                  }

                              }, 'json');

                          }); 

                      })

                    </script>

                    <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Title</strong> <span class="required-txt">*</span></label>
                        <div class="clearfix"></div>
                      <div class="col-sm-3">
                          <label>English</label>
                          <input type="text" autofocus autocomplete="off" class="form-control" name="title" id="title" value="<?php echo $record->title_en;?>"/>
 
                      </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-3 p-t-md">
                          <label>Arabic</label>
                          <input type="text" autofocus autocomplete="off" class="form-control" name="title_ar" id="title_ar" value="<?php echo $record->title_ar;?>"/>
                           <div class="clearfix"></div>
                              <?php if(isset($error_title)):?>
                                <div class="error_info">
                                  <?php echo $error_title;?> ...
                                </div> 
                              <?php endif;?>
                      </div>
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Image</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-12">
                          <?php if(isset($record->thumb_url) && $record->thumb_url != NULL):?>
                            <img src="<?php echo base_url()?>uploads/subscribers/wall/<?php echo $record->thumb_url?>" class="m-b-md b b-success"/>                         
                        <?php endif;?> 
                        <input type="file" class="filestyle" name="userfile" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                        <div class="help-block">
                            Upload the Wall Image file | Allowed *.jpg, *.png | Res. 640 X 640 Pixels  | Maximum File Size 800KB                      
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

                    <div class="clearfix"></div>

                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="clearfix"></div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Offer Time</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-12 p-none"> 
 
                        <div class="col-md-2">

                            <label>Starts On <span class="required-txt">*</span></label>
                            <div class="clearfix"></div>
                            <input type="text" autocomplete="off" class="form-control" placeholder="" id="dpd1" name="dpd1" value="<?php echo ($record->offer_starts != NULL) ? date('m/d/Y',  strtotime($record->offer_starts)) : '';?>"/>
                            <div class="clearfix"></div>
                            <?php if(form_error('dpd1')):?>
                            <div class="error_info">

                              <?php echo form_error('dpd1');?> ...
                            </div> 
                            <?php endif;?>
                        </div> 

                        <div class="col-md-2">
                            <label>Ends On <span class="required-txt">*</span></label>
                            <div class="clearfix"></div>
                            <input type="text" autocomplete="off" class="form-control" placeholder="" id="dpd2" name="dpd2" value="<?php echo ($record->offer_ends != NULL) ? date('m/d/Y',  strtotime($record->offer_ends)) : '';?>"/>
                            <div class="clearfix"></div>
                            <?php if(form_error('dpd2')):?>
                            <div class="error_info">

                                <?php echo form_error('dpd2');?> ...
                            </div> 
                            <?php endif;?>

                        </div>
                           
                      </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="clearfix"></div>

                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Description English</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-6 editor-container">
     
                          <textarea name="description_en" class="form-control" style="overflow:scroll;height:100px;"><?php echo $record->description_en;?></textarea>
 
                      </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Description Arabic</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-6 editor-container">
     
                          <textarea name="description_ar" class="form-control" style="overflow:scroll;height:100px;"><?php echo $record->description_ar;?></textarea>
                          <div class="clearfix"></div>
                              <?php if(isset($error_description)):?>
                                <div class="error_info">
                                  <?php echo $error_description;?> ...
                                </div> 
                              <?php endif;?>
                      </div>
                    </div> 

                    <div class="clearfix"></div>

                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Voucher Code (if any)</strong> <span class="required-txt">*</span></label>
                        <div class="clearfix"></div>
                      <div class="col-sm-3"> 
                          <input type="text" autofocus autocomplete="off" class="form-control" name="voucher_code" id="voucher_code" value="<?php echo $record->voucher_code;?>"/>
                           
                      </div>
                        <div class="clearfix"></div> 
                    </div>

                    <!-- <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <label class="col-sm-12 control-label"><strong>Does this pinboard has any points?</strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-12">
                          
                        <label><input type="radio" name="has_points" class="hasPointsChk" value="1" <?php //echo((isset($_POST['has_points']) && $_POST['has_points'] == 1) || $record->has_points == 1) ? 'checked="checked"': '';?>> Yes</label>&nbsp;&nbsp;
                        <label><input type="radio" name="has_points" class="hasPointsChk" value="0" <?php //echo((isset($_POST['has_points']) && $_POST['has_points'] == 0) || $record->has_points == 0) ? 'checked="checked"': '';?>> No</label>
 
                      </div>
                      
                    </div> 

                    <div id="showPinboardPoints" style="<?php //echo (($error && isset($_POST['has_points']) && $_POST['has_points'] == 1) || $record->has_points == 1) ? 'display: block;' : 'display: none;';?>">

                      <div class="line line-dashed b-b line-lg pull-in"></div>
                        
                          <div class="form-group">
                            <label class="col-sm-12 control-label"><strong>Points</strong></label>
                            <div class="clearfix"></div>
                            <div class="col-sm-3">
                                
                              <input type="text" style="width: 100px;" name="points" id="points" value="<?php //echo $record->points?>" autocomplete="off" class="form-control"/>
                              <div class="clearfix"></div>
                              <?php //if(form_error('points')):?>
                                  <div class="error_info">

                                      <?php //echo form_error('points');?> ...
                                  </div> 
                              <?php //endif;?>
       
                            </div>
                            
                          </div> 

                          <div class="line line-dashed b-b line-lg pull-in"></div>
                          
                          <div class="form-group">
                            <label class="col-sm-12 control-label"><strong>Expiry Date</strong></label>
                            <div class="clearfix"></div>
                            <div class="col-sm-3">
                                
                              <input type="text" style="width: 200px;" data-date-format="dd/mm/yyyy" name="expiry" id="expiry" value="<?php //echo ($record->has_points == 1) ? date('d/m/Y', strtotime($record->expiry)) : '';?>" autocomplete="off" class="form-control"/>
                              <div class="clearfix"></div>
                              <?php //if(form_error('expiry')):?>
                                  <div class="error_info">

                                      <?php //echo form_error('expiry');?> ...
                                  </div> 
                              <?php //endif;?>
       
                            </div>
                          
                        </div>

                    </div>-->
 
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group" style="padding-bottom: 150px;">
                      <div class="col-sm-4">
                        <button type="button" class="btn btn-default" onclick="javascript: location.href='<?php echo $ctrlUrl?>'">Back</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </section>
    
</section>

<script type="text/javascript">
  
  $(function(){

      var hasPointsChk = $('.hasPointsChk');

      hasPointsChk.on('click',function(){
        
        var checked = $(this).val();

        if(checked == 1)
        {
          $("#showPinboardPoints").fadeIn(350);
        }else{
          $("#showPinboardPoints").fadeOut(350);
        }

      });

      $('#expiry').datepicker();
 
 
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
        
    });     
    
</script>