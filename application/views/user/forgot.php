<div class="clear"></div>

		<div class="setup-body container-fluid text-center">
			
			<div class="login-box">
				
				<p class="h2 block"><?php echo lang('auto.forgot_your_password')?></p>
				<div class="clear"></div>

				<form action="" method="post" id="authFrm" name="authFrm">
					
					<?php if(isset($Error)):?>
	                    <div class="flashmessage <?php echo(isset($Error) && $Error == 'Y') ? 'flashmessage-warning' : 'flashmessage-info';?>">
	                        <?php echo $MSG;?>
	                        <a class="close" onclick="javascript:$(this).parent().remove();" >
	                            <i class="ion-close-round"></i>
	                        </a>
	                    </div>
	              		<div class="clear"></div>
	           		<?php endif;?>

					<div class="setup-form-group block">
						<label class="setup-form-label block"><?php echo lang('auto.email_address')?></label>
						<input type="text" class="setup-form-control block <?php echo (form_error('username')) ? 'error-border' : ''?>" <?php echo (form_error('username')) ? 'title="'.form_error('username').'"' : ''?> name="username" id="username"
						value="<?php echo (isset($post['username']) && $post['username'] != '') ? $post['username'] : '';?>"/>
					</div>

					<div class="clear"></div>

					<button type="submit" class="button button-green left"><?php echo lang('auto.reset_password')?></button>

				</form>

			</div>

			<div class="clear"></div>

			<div class="block text-center h3 setup-signup">
				<?php echo lang('auto.already_registered')?> <a href="<?php echo HOST_URL?>/signin"><?php echo lang('auto.signin')?></a>
			</div>

			<div class="clear"></div>

		</div>