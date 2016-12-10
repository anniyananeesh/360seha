<?php
	$CI = & get_instance();
	$rootLogin = $CI->session->userdata('root_login');
?>

<?php if($isPublish == 0 && !$rootLogin):?>
	<div class="alert block visible-lg-block">
		<i class="ion-close-circled alert-danger"></i>
		Your account is now inactive mode. After completing the basic setup, contact our technical support to activate your account with 360seha.com
	</div>

	<div class="alert block visible-sm-block visible-md-block visible-xs-block">
		<i class="ion-close-circled alert-danger"></i>
		Pending Approval.
	</div>
<?php endif;?>

<?php if($rootLogin):?>

	<div class="alert block">
		<i class="ion-close-circled alert-success"></i>
		Access from admin account  <a href="<?php echo HOST_URL?>/admin/subscribers/" class="button button-primary button-sm text-uppercase">Admin Account</a>
	</div>

<?php endif;?>