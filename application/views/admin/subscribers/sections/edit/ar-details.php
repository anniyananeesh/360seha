<br/>

<div class="form-group">

    <label class="col-sm-9 control-label"><strong>Subscriber Title <span class="required-txt">*</span></strong></label>
    <div class="clearfix"></div>
    <div class="col-sm-9">
        <input type="text" autofocus autocomplete="off" class="form-control txt-AlignARtl" name="title_ar" id="title_ar" value="<?php echo $post['title_ar'];?>"/>
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
    <label class="col-sm-9 control-label"><strong>Subscriber's Details (Short) <span class="required-txt">*</span></strong></label>
    <div class="clearfix"></div>
    <div class="col-md-9">
        <textarea name="description_ar" id="description_ar" class="form-control txt-AlignARtl" style="overflow:scroll;height:60px;max-height:150px"><?php echo $post['description_ar'];?></textarea>
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
    <div class="clearfix"></div>
    <div class="col-md-9">
        <textarea id="summary_ar" name="summary_ar" class="form-control txt-AlignARtl"><?php echo $post['summary_ar'];?></textarea>
    </div>

</div>
<?php endif;?>

<div class="line line-dashed b-b line-lg pull-in"></div>
         
<div class="form-group">
    
    <label class="col-sm-9 control-label"><strong>Address</strong></label>
    <div class="clearfix"></div>
    <div class="col-md-9">
        <label>Street Address <span class="required-txt">*</span></label>
        <input type="text" autocomplete="off" class="form-control txt-AlignARtl" placeholder="" id="ad1_ar" name="ad1_ar" value="<?php echo $post['ad1_ar'];?>"/>
        <?php if(isset($post) && ($post["ad1"] == "" && $post["ad1_ar"] == "")):?>
            <div class="error_info">
                Fill in either English or Arabic address for the subscriber
            </div> 
        <?php endif;?>
        <div class="clearfix"></div>
        <label class="m-t-sm">Building & Flat No. <span class="required-txt">*</span></label>
        <input type="text" autocomplete="off" class="form-control txt-AlignARtl" placeholder="" id="ad2_ar" name="ad2_ar" value="<?php echo $post['ad2_ar'];?>"/>
        <?php if(isset($post) > 0 && ($post["ad2"] == "" && $post["ad2_ar"] == "")):?>
            <div class="error_info">
                Fill in either English or Arabic
            </div> 
        <?php endif;?>

    </div>

    <div class="clearfix"></div>
                      
</div>