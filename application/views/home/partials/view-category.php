
    <?php foreach($subscriberList AS $key => $value):?>

        <?php if($key == 3) break;?>
        <div class="col-lg-3 col-md-6" title="<?php echo ucfirst($value->subs_title);?>">
        	<div class="card">

                <?php $photos = $this->modelPhotoAlias->fetchRowFields(array('img_url'), array('subscriber'=>$value->user_id), array('orderby'=>'ASC'));?>

            	<a href="<?php echo HOST_URL?>/<?php echo $value->subs_public_profile?>" class="card-image" style="background: url('<?php echo (empty($photos)) ? SUBS_IMAGE_SHOW_PATH.$value->logo : SUBS_PHOTO_SHOW_PATH.$photos->img_url?>') no-repeat; background-size: cover;"></a>
                <h1><?php echo ucfirst($value->{subs_title_.$lan});?></h1>
                <p><?php echo $value->{address_line1_.$lan};?>, <?php echo $value->{address_line2_.$lan};?>, <?php echo $value->{city_name_.$lan};?></p>
    		</div>
        </div>

    <?php endforeach;?>

    <?php if($subscriberList):?>
    <div class="col-lg-3 col-md-6">
    	<div class="card" style="padding-top:75px;">
            <h2><?php echo lang('auto.total')?></h2>
            <h3><?php echo count($subscriberList);?></h3>
            <p><?php echo lang('auto.health_centres_listed')?></p>
            <a href="<?php echo HOST_URL?>/search/?country=&city=&category=<?php echo ($catID != 'all') ? $catID : '';?>" class="card_button"><?php echo lang('auto.view_all')?></a>
		</div>
    </div>
    <?php endif;?>

    <?php if(empty($subscriberList)):?>
        <div class="row col-lg-12 text-center">
            
            <h3><?php echo lang('auto.no_health_providers_found')?></h3>
            
        </div>
    <?php endif;?>
