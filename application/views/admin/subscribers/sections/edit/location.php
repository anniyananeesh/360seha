<div class="form-group">

    <label class="col-sm-2 control-label" for="input-id-1"><strong>Choose Location <span class="required-txt">*</span></strong></label>

    <div class="col-sm-3 h3 text-center font-thin m-b-lg">
        <input type="text" autocomplete="off" readonly="readonly" class="form-control text-center" name="place_info" id="place_info" value="<?php echo $post["place_info"];?>"/>
        <input type='text' id="latitude" class="form-control m-t-sm m-b-sm" name="latitude" value="<?php echo $post["latitude"];?>" title="Latitude"/>
        <input type='text' id="longitude" class="form-control m-t-sm m-b-sm" name="longitude" value="<?php echo $post["longitude"];?>" title="Longitude"/> 
        <a name="find_gmap" id="find_gmap" class="btn btn-primary btn-sm btn-lg font-thin m-t-md">Locate your location on GMap</a>
    </div>

    <?php if(form_error('latitude') || form_error('longitude')):?>
        <div class="error_info">
            Lattitude and longitude required inorder to show your location on Google Maps
        </div> 
    <?php endif;?>

</div> 