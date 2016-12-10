<div class="setup-aside block left setup-menu">

	<?php $currentMenuItem = strtolower($this->router->fetch_class());?>

	<div class="block menu">

		<p class="menu-head"><i class="ion-gear-a"></i> Account Setup</p>
		<div class="clear"></div>

		<a href="<?php echo HOST_URL?>/account/basic" class="block menu-link <?php echo ($currentMenuItem == 'basic') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.basic_inform')?></a>
		<a href="<?php echo HOST_URL?>/account/location" class="block menu-link <?php echo ($currentMenuItem == 'location') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.location_info')?></a>
		<a href="<?php echo HOST_URL?>/account/contact" class="block menu-link <?php echo ($currentMenuItem == 'contact') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.contact_info')?></a>
		<a href="<?php echo HOST_URL?>/account/logo" class="block menu-link <?php echo ($currentMenuItem == 'logo') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.change_your_logo')?></a>

		<a href="<?php echo HOST_URL?>/account/departments" class="block menu-link <?php echo ($currentMenuItem == 'departments') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.departments')?></a>

	  <?php if((is_array($menuAccess) && in_array('doctors', $menuAccess))):?>
			<a href="<?php echo HOST_URL?>/account/doctors/all" class="block menu-link <?php echo ($currentMenuItem == 'doctors') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.doctors')?></a>
		<?php endif;?>

		<?php if(is_array($menuAccess) && in_array('photos', $menuAccess)):?>
			<a href="<?php echo HOST_URL?>/account/photos" class="block menu-link <?php echo ($currentMenuItem == 'photos') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.photos')?></a>
		<?php endif;?>

		<!-- News section-->
		<?php if(is_array($menuAccess) && in_array('news', $menuAccess)):?>
		   <a href="<?php echo HOST_URL?>/account/news" class="block menu-link <?php echo ($currentMenuItem == 'news') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.news')?></a>
		<?php endif;?>

		<!-- Offers section-->
		<?php if(is_array($menuAccess) && in_array('offers', $menuAccess)):?>
		   <a href="<?php echo HOST_URL?>/account/offers" class="block menu-link <?php echo ($currentMenuItem == 'offers') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.offers')?></a>
		<?php endif;?>

		<a href="<?php echo HOST_URL?>/account/details" class="block menu-link <?php echo ($currentMenuItem == 'details') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.details_info')?></a>

		<a href="<?php echo HOST_URL?>/account/reviews" class="block menu-link <?php echo ($currentMenuItem == 'reviews') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> Reviews</a>

		<?php if($rootLogin):?>
			<a href="<?php echo HOST_URL?>/account/access" class="block menu-link <?php echo ($currentMenuItem == 'access') ? 'active' : '';?>"><i class="ion-checkmark-circled"></i> <?php echo lang('auto.setup_access')?></a>
		<?php endif;?>

	</div>

	<div class="clear"></div>

	<?php if($isPublish == 0):?>
	<div class="setup-status pending block">
		Your profile is pending
	</div>
	<?php endif;?>

	<div class="clear"></div>

</div>

<div class="setup-menu-sm block visible-sm-block visible-md-block visible-xs-block">

	<p class="menu-head"><i class="ion-gear-a"></i></p>
	<div class="clear"></div>

	<a href="<?php echo HOST_URL?>/account/basic" class="block menu-link <?php echo ($currentMenuItem == 'basic') ? 'active' : '';?>"><i class="ion-ios-information"></i></a>
	<a href="<?php echo HOST_URL?>/account/location" class="block menu-link <?php echo ($currentMenuItem == 'location') ? 'active' : '';?>"><i class="ion-ios-location-outline"></i></a>
	<a href="<?php echo HOST_URL?>/account/contact" class="block menu-link <?php echo ($currentMenuItem == 'contact') ? 'active' : '';?>"><i class="ion-android-phone-portrait"></i></a>
	<a href="<?php echo HOST_URL?>/account/logo" class="block menu-link <?php echo ($currentMenuItem == 'logo') ? 'active' : '';?>"><i class="ion-image"></i></a>
	<a href="<?php echo HOST_URL?>/account/departments" class="block menu-link <?php echo ($currentMenuItem == 'departments') ? 'active' : '';?>"><i class="ion-network"></i></a>

	<!-- Doctors section-->
	<?php if((is_array($menuAccess) && in_array('doctors', $menuAccess)) && ($menuAccess->subs_cat_id == 37 || $menuAccess->subs_cat_id == 38)):?>
		<a href="<?php echo HOST_URL?>/account/doctors" class="block menu-link <?php echo ($currentMenuItem == 'doctors') ? 'active' : '';?>"><i class="ion-android-person"></i></a>
	<?php endif;?>

	<!-- Photos section-->
	<?php if(is_array($menuAccess) && in_array('photos', $menuAccess)):?>
		<a href="<?php echo HOST_URL?>/account/photos" class="block menu-link <?php echo ($currentMenuItem == 'photos') ? 'active' : '';?>"><i class="ion-images"></i></a>
	<?php endif;?>

	<!-- News section-->
	<?php if(is_array($menuAccess) && in_array('news', $menuAccess)):?>
		 <a href="<?php echo HOST_URL?>/account/news" class="block menu-link <?php echo ($currentMenuItem == 'news') ? 'active' : '';?>"><i class="ion-earth"></i></a>
	<?php endif;?>

	<!-- Offers section-->
	<?php if(is_array($menuAccess) && in_array('offers', $menuAccess)):?>
		 <a href="<?php echo HOST_URL?>/account/offers" class="block menu-link <?php echo ($currentMenuItem == 'offers') ? 'active' : '';?>"><i class="ion-pricetags"></i></a>
	<?php endif;?>

	<a href="<?php echo HOST_URL?>/account/details" class="block menu-link <?php echo ($currentMenuItem == 'details') ? 'active' : '';?>"><i class="ion-edit"></i></a>
	<a href="<?php echo HOST_URL?>/account/reviews" class="block menu-link <?php echo ($currentMenuItem == 'reviews') ? 'active' : '';?>"><i class="ion-document-text"></i></a>

	<!-- Root login section-->
	<?php if($rootLogin):?>
		<a href="<?php echo HOST_URL?>/account/access" class="block menu-link <?php echo ($currentMenuItem == 'access') ? 'active' : '';?>"><i class="ion-unlocked"></i></a>
	<?php endif;?>

</div>
