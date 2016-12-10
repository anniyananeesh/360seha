<div class="line line-dashed b-b line-lg pull-in"></div>
<h4 class="font-thin text-center m-t-lg text-success" style="margin-top: 50px;"><i class="i i-list2"></i> Menu Access</h4>
<div class="line line-dashed b-b line-lg pull-in"></div>

<div class="form-group">

    <label class="col-sm-2 control-label"><strong>What options do you want to add to this subscriber</strong></label>

    <div class="col-sm-10">
        
        <div class="checkbox i-checks pull-left m-r-md btn <?php if(in_array(MENU_ABOUT_ID, $access)):?> btn-success<?php else:?>btn-default <?php endif;?> btn-rounded btn-sm" style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" value="<?php echo MENU_ABOUT_ID?>" class="menu_access" <?php if(in_array(MENU_ABOUT_ID, $access)):?> checked="checked"<?php endif;?> name="access[]">
                <i></i>
                <?php echo MENU_ABOUT_ACCESS?>
            </label>
        </div>
        
        <div class="checkbox i-checks pull-left m-r-md btn <?php if(in_array(MENU_OFFERS_ID, $access)):?> btn-success<?php else:?>btn-default <?php endif;?> btn-rounded btn-sm" style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" value="<?php echo MENU_OFFERS_ID?>" class="menu_access" <?php if(in_array(MENU_OFFERS_ID, $access)):?> checked="checked"<?php endif;?> name="access[]">
                <i></i>
                <?php echo MENU_OFFERS_ACCESS?>
            </label>
        </div>

        <div class="checkbox i-checks pull-left m-r-md btn <?php if(in_array(MENU_CONTACT_US_ID, $access)):?> btn-success<?php else:?>btn-default <?php endif;?> btn-rounded btn-sm" style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" value="<?php echo MENU_CONTACT_US_ID?>" class="menu_access" <?php if(in_array(MENU_CONTACT_US_ID, $access)):?> checked="checked"<?php endif;?> name="access[]">
                <i></i>
                <?php echo MENU_CONTACT_US_ACCESS?>
            </label>
        </div>

        <div class="checkbox i-checks pull-left m-r-md btn <?php if(in_array(MENU_IMAGE_GALLERY_ID, $access)):?> btn-success<?php else:?>btn-default <?php endif;?> btn-rounded btn-sm" style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" value="<?php echo MENU_IMAGE_GALLERY_ID?>" class="menu_access" <?php if(in_array(MENU_IMAGE_GALLERY_ID, $access)):?> checked="checked"<?php endif;?> name="access[]">
                <i></i>
                <?php echo MENU_IMAGE_GALLERY_ACCESS?>
            </label>
        </div>

        <div class="checkbox i-checks pull-left m-r-md btn <?php if(in_array(MENU_VIDEO_GALLERY_ID, $access)):?> btn-success<?php else:?>btn-default <?php endif;?> btn-rounded btn-sm" style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" value="<?php echo MENU_VIDEO_GALLERY_ID?>" class="menu_access" <?php if(in_array(MENU_VIDEO_GALLERY_ID, $access)):?> checked="checked"<?php endif;?> name="access[]">
                <i></i>
                <?php echo MENU_VIDEO_GALLERY_ACCESS?>
            </label>
        </div>
        
        <div class="checkbox i-checks pull-left m-r-md btn <?php if(in_array(MENU_INSURANCE_CLIENTS_ID, $access)):?> btn-success<?php else:?>btn-default <?php endif;?> btn-rounded btn-sm" style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" value="<?php echo MENU_INSURANCE_CLIENTS_ID?>" class="menu_access" <?php if(in_array(MENU_INSURANCE_CLIENTS_ID, $access)):?> checked="checked"<?php endif;?> name="access[]">
                <i></i>
                <?php echo MENU_INSURANCE_CLIENTS_ACCESS?>
            </label>
        </div>

        <div class="checkbox i-checks pull-left m-r-md btn <?php if(in_array(MENU_PRODUCTS_ID, $access)):?> btn-success<?php else:?>btn-default <?php endif;?> btn-rounded btn-sm" style="margin-bottom: 15px;">
            <label>
                <input type="checkbox" value="<?php echo MENU_PRODUCTS_ID?>" class="menu_access" <?php if(in_array(MENU_PRODUCTS_ID, $access)):?> checked="checked"<?php endif;?> name="access[]">
                <i></i>
                <?php echo MENU_PRODUCTS_ACCESS?>
            </label>
        </div>

    </div>

</div>