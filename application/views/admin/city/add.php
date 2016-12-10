<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><i class="fa fa-plus-circle"></i> <?php echo $title;?></h3>
        <button class="btn btn-default btn-rounded" style="float: right; margin-top: -30px;" onclick="javascript: window.location.href='<?php echo $ctrl_url?>'"><i class="i i-list2"></i> See all</button>
    </div>
    
    <section class="panel panel-default">
        
        <header class="panel-heading" style="font-size: 15px;">
          <?php echo $sub_title;?>
        </header>
        
                <div class="panel-body">
                    
                  <form class="form-horizontal" method="post"> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>City Title <span class="required-txt">*</span></strong></label>
                      <div class="col-sm-10">
                          <div class="col-md-5">
                              
                              <label>English</label>
                              <input type="text" autofocus autocomplete="off" class="form-control" name="name" id="name" value="<?php echo set_value('name');?>"/>
                          
                            <?php if(form_error('name')):?>
                              <div class="error_info">

                                  <?php echo form_error('name');?> ...
                              </div>
                            <?php else:?>

                              <span class="help-block m-b-none text-muted">Eg:- Sharjah, Dubai...</span>
                            <?php endif;?>
                              
                          </div>
                          
                          <div class="col-md-5">
                              
                              <label>Arabic</label>
                              <input type="text" autofocus autocomplete="off" class="form-control" name="name_ar" id="name_ar" value="<?php echo set_value('name_ar');?>"/>
                          
                            <?php if(form_error('name')):?>
                              <div class="error_info">

                                  <?php echo form_error('name');?> ...
                              </div>
                            <?php else:?>

                              <span class="help-block m-b-none text-muted">Eg:- Sharjah, Dubai...</span>
                            <?php endif;?>
                              
                          </div>
                          
                      </div>
                    </div>

                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Country <span class="required-txt">*</span></strong></label>
                      <div class="col-sm-4">
                          <div class="col-sm-12">
                          
                              <select class="chosen-select" name="country_fk" id="country_fk"/>
                                  <?php foreach($countries AS $data):?>
                                    <option value="<?php echo $data->id;?>"><?php echo $data->name_en;?></option>
                                  <?php endforeach;?>
                              </select>

                              <?php if(form_error('country_fk')):?>
                                  <div class="error_info">
                                    <?php echo form_error('country_fk');?> ...
                                  </div> 
                              <?php endif;?>

                          </div>
                      </div>
                    </div> 
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default btn-rounded" onclick="javascript: location.href='<?php echo $ctrl_url?>'">Cancel</button>
                        <button type="submit" class="btn btn-success btn-rounded m-l-sm">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </section>
    
</section>