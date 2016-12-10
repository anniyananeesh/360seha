<div class="clear"></div>

		<div class="setup-body container-fluid text-center">
			
			<div class="login-box">
				
				<p class="h2 block"><?php echo lang('auto.subscriber_login')?></p>
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

		           		<?php if($this->session->flashdata('message')):?>

							<div class="flashmessage flashmessage-info">
			                 	<?php echo $this->session->flashdata('message');?>
			                 	<a class="close" onclick="javascript:$(this).parent().remove();" >
			                    	<i class="ion-close-round"></i>
			               		</a>
			             	</div>
			            	<div class="clear"></div>
						    
						<?php endif;?>

					<div class="setup-form-group block">
						<label class="setup-form-label block"><?php echo lang('auto.username')?></label>
						<input type="text" class="setup-form-control block <?php echo (form_error('username')) ? 'error-border' : ''?>" name="username" id="username" <?php echo (form_error('username')) ? 'title="'.form_error('username').'"' : ''?>/>
					</div>

					<div class="clear"></div>

					<div class="setup-form-group block">
						<label class="setup-form-label block"><?php echo lang('auto.password')?></label>
						<input type="password" class="setup-form-control block <?php echo (form_error('password')) ? 'error-border' : ''?>" id="password" name="password" <?php echo (form_error('password')) ? 'title="'.form_error('password').'"' : ''?>/>
					</div>

					<div class="clear"></div>

					<a href="<?php echo HOST_URL?>/forgot" class="block right forgot-password"><?php echo lang('auto.forgot_password')?></a>

					<div class="clear"></div>

					<button type="submit" class="button button-green left"><?php echo lang('auto.signin')?></button>

				</form>

			</div>

			<div class="clear"></div>

			<div class="block text-center h3 setup-signup">
				<?php echo lang('auto.dont_have_an_account')?> <a href="<?php echo HOST_URL?>/join"><?php echo lang('auto.signup')?></a>
			</div>

			<div class="clear"></div>

		</div>