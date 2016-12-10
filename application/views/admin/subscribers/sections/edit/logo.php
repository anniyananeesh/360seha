<div class="form-group text-center">
    <label class="col-sm-3 control-label"><strong>Logo </strong></label>
 
    <div class="pull-left">
        <input type="file" class="filestyle m-t-lg pull-left" 
           name="userfile" 
           data-icon="false" 
           data-classButton="btn btn-default" 
           data-classInput="form-control inline v-middle input-s">
        <div class="help-block text-muted">
            Logo Image file | Resolution. <?php echo $config['thumb_width']['value']?> X <?php echo $config['thumb_height']['value']?> Pixels                        
        </div>

        <?php if(form_error('userfile')):?>
            <div class="error_info">
                <?php echo form_error('userfile');?>
            </div>
        <?php endif;?>

    </div>
    <div class="thumb-lg m-l-lg pull-left">
        <?php if(isset($post["subs_profile_img"]) && $post["subs_profile_img"] != NULL):?>
          <img src="<?php echo base_url()?>uploads/subscribers/profile/<?php echo $post["subs_profile_img"];?>" width="120">
        <?php else:?>
            <img src="<?php echo ACTIVE_THEME?>images/a0.png" width="120">
        <?php endif;?>
    </div>

</div>