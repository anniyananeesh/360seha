<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>360Seha</title>

	<meta name="keywords" content="360Seha" />
	<meta name="description" content="360Seha" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo USER_CSS_PATH?>/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo USER_CSS_PATH?>/style_<?php echo $lan?>.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo USER_CSS_PATH?>/media_<?php echo $lan?>.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo BOWER_PATH?>/custombox/dist/custombox.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo BOWER_PATH?>/gilbitron/Dropit/dropit.css"/>
	
	<script type="text/javascript" src="<?php echo BOWER_PATH?>/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tipsy/1.0.3/jquery.tipsy.min.js"></script>
	
	<script type="text/javascript" src="<?php echo BOWER_PATH?>/custombox/dist/legacy.min.js"></script>
	<script type="text/javascript" src="<?php echo BOWER_PATH?>/custombox/dist/custombox.min.js"></script>
	<script type="text/javascript" src="<?php echo BOWER_PATH?>/gilbitron/Dropit/dropit.js"></script>
	<script type="text/javascript" src="<?php echo USER_JS_PATH?>/simple-sidebar.min.js"></script>
	<script type="text/javascript" src="<?php echo USER_JS_PATH?>/rowsorter.min.js"></script>
</head>

<script type="text/javascript">
	
	$(function(){

		$('.setup-form-control').tipsy({gravity: 'n'});

		$('.menu').dropit();

	})

</script>

<body dir="<?php echo $dir?>"> 

	<div class="container-fluid setup-screen">
		
		<div class="setup-header block">
			
			<?php 

 				$CI = & get_instance();
 				$userSessionData = $CI->session->userdata('user_logged');
 			?>

 			<?php if($userSessionData):?>
			<div class="block left visible-sm-block visible-xs-block">
				<button class="collapsable-btn" type="button">
		      		<span class="icon-bar"></span>
		         	<span class="icon-bar"></span>
		         	<span class="icon-bar"></span>
		      	</button>
			</div>
			<?php endif;?>
			
			<a class="setup-logo left" href="#">
				<img src="<?php echo USER_IMG_PATH?>/account/logo-sm.png" width="100"/>
			</a> 

			<div class="language right block">
				<?php if($lan == 'en'):?>
                	<a href="<?php echo HOST_URL?>/lang/ar" class="block"><?php echo lang('auto.lang_arabic')?></a> 
              	<?php else:?>
                	<a href="<?php echo HOST_URL?>/lang/en" class="block"><?php echo lang('auto.lang_english')?></a> 
             	<?php endif;?>
			</div>
 
 			<?php if($userSessionData):?>
			<div class="profile-header right block visible-lg-block visible-md-block">
 				
				<ul class="menu right block">
					    <li>
					        <a href="#" class="sort block"><?php echo lang('auto.hi')?> <?php echo $userSessionData["name"]?> <i class="ion-ios-arrow-down"></i>
							</a> 
					        <ul class="sort-submenu">
					            <li><a href="<?php echo HOST_URL?>/account/settings"><i class="ion-gear-a"></i>&nbsp;&nbsp;<?php echo lang('auto.account_settings')?></a></li>
					            <li><a href="<?php echo HOST_URL?>/account/logo"><i class="ion-image"></i>&nbsp;&nbsp;<?php echo lang('auto.change_your_logo')?></a></li>
					            <li><a href="<?php echo HOST_URL?>/account/logout"><i class="ion-power"></i>&nbsp;&nbsp;<?php echo lang('auto.logout')?></a></li> 
					        </ul>
					    </li>
					</ul>
			</div>

			<?php endif;?>

			<div class="clear"></div>

		</div>

		<div class="clear"></div>