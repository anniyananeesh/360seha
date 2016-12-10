<div class="form-group">
    <label class="col-sm-2 control-label" for="input-id-1"><strong>Contact Details</strong></label>
    <div class="col-sm-10">
      <div class="row">
        <div class="col-md-3">
          <label>Phone No. 1 <span class="required-txt">*</span></label>
          <input type="text" autocomplete="off" class="form-control" placeholder="" name="p_cntct" value="<?php echo $post["p_cntct"];?>"/>
          <?php if(form_error('p_cntct')):?>
              <div class="error_info">
                <?php echo form_error('p_cntct');?> ...
              </div> 
          <?php endif;?>
        </div>
        <div class="col-md-3">
          <label>Fax No.</label> 
          <input type="text" autocomplete="off" class="form-control" placeholder="" name="fx_no" value="<?php echo $post["fx_no"];?>"/>
          <?php if(form_error('fx_no')):?>
              <div class="error_info">
                <?php echo form_error('fx_no');?> ...
              </div> 
          <?php endif;?>
        </div>
        <div class="col-md-3">
          <label>EMail Address <span class="required-txt">*</span></label>
          <input type="text" autocomplete="off" class="form-control" placeholder="" name="em_1" value="<?php echo $post["em_1"];?>"/>
          <?php if(form_error('em_1')):?>
              <div class="error_info">

                <?php echo form_error('em_1');?> ...
              </div> 
          <?php endif;?>
        </div>
      </div> 

    </div>

</div>