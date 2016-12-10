<br/>
<div class="form-group">

    <label class="col-sm-9 control-label"><strong>Subscriber Title <span class="required-txt">*</span></strong></label>
    <div class="clearfix"></div>
    <div class="col-sm-9">
        <input type="text" autofocus autocomplete="off" class="form-control" name="title" id="title" value="<?php echo $post['title'];?>"/>
        <?php if(isset($post) && ($post["title"] == "" && $post["title_ar"] == "")):?>
            <div class="error_info">
                Fill in either English or Arabic title for the subscriber
            </div> 
        <?php endif;?>
    </div>
    <div class="clearfix"></div>

</div>

<div class="line line-dashed b-b line-lg pull-in"></div>

<div class="form-group">
    <label class="col-sm-9 control-label"><strong>Public URL <span class="required-txt">*</span></strong></label>
    <div class="clearfix"></div>
    <div class="col-sm-9">

        <span class="h5 pull-left text-dark m-r-sm" style="padding-top: 8px;">http://360seha.com/</span>
        <input type="text" autofocus autocomplete="off" class="form-control pull-left m-r-sm" style="width: 200px;" name="subs_public_profile" id="subs_public_profile" value="<?php echo $post['subs_public_profile'];?>"/>
        <div class="ajx_rst_ldr pull-left"></div>
        <div class="clearfix"></div>
        <?php if(form_error('subs_public_profile')):?>
          <div class="error_info">

              <?php echo form_error('subs_public_profile');?> ...
          </div> 
        <?php endif;?>
    </div>
</div>

<div class="line line-dashed b-b line-lg pull-in"></div>

<div class="form-group">
    <label class="col-sm-9 control-label"><strong>Subscriber's Details (Short) <span class="required-txt">*</span></strong></label>
    <div class="clearfix"></div>
    <div class="col-md-9">
        <textarea name="description" id="description" class="form-control" style="overflow:scroll;height:60px;max-height:150px"><?php echo $post['description'];?></textarea>
        <?php if(isset($post) && ($post["description"] == "" && $post["description_ar"] == "")):?>
            <div class="error_info">
                Fill in either English or Arabic description for the subscriber
            </div> 
        <?php endif;?>
    </div>
    
</div>

<?php if(isset($category) && (int) $category->type == 1):?>
<div class="line line-dashed b-b line-lg pull-in"></div>
         
<div class="form-group">

    <label class="col-sm-9 control-label"><strong>Summary</strong></label>
    <div class="col-md-9">
        <textarea id="summary" name="summary" class="form-control"><?php echo $post['summary'];?></textarea>
    </div>

</div>
<?php endif;?>

<div class="line line-dashed b-b line-lg pull-in"></div>
                    
<div class="form-group">
    
    <label class="col-sm-9 control-label"><strong>Address</strong></label>
    <div class="clearfix"></div>
    <div class="col-md-9">
        <label>Street Address <span class="required-txt">*</span></label>
        <input type="text" autocomplete="off" class="form-control" placeholder="" id="ad1" name="ad1" value="<?php echo $post['ad1'];?>"/>
        <?php if(isset($post) && ($post["ad1"] == "" && $post["ad1_ar"] == "")):?>
            <div class="error_info">
                Fill in either English or Arabic address for the subscriber
            </div> 
        <?php endif;?>
        
        <div class="clearfix"></div>
        <label class="m-t-sm">Building & Flat No. <span class="required-txt">*</span></label>
        <input type="text" autocomplete="off" class="form-control" placeholder="" id="ad2" name="ad2" value="<?php echo $post['ad2'];?>"/>
        <?php if(isset($post) > 0 && ($post["ad2"] == "" && $post["ad2_ar"] == "")):?>
            <div class="error_info">
                Fill in either English or Arabic
            </div> 
        <?php endif;?>

    </div>

    <div class="clearfix"></div>
                      
</div>