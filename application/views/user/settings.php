		<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong"><?php echo lang('auto.account_settings')?></p>
					<p class="h3 block"><?php echo lang('auto.setup_subhead')?></p>

					<form action="" method="post" class="m-t-lg">
						
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
						
						<div class="col-60">
							
							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.current_password')?></label>
									<input type="password" class="setup-form-control setup-form-control-sm block <?php echo (form_error('current_password')) ? 'error-border' : ''?>" id="current_password" name="current_password" <?php echo (form_error('current_password')) ? 'title="'.form_error('current_password').'"' : ''?> value="<?php echo (isset($post['current_password'])) ? $post['current_password']: '' ?>"/>
								</div>
								<div class="clear"></div>
							</div> 

							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.new_password')?></label>
									<input type="password" class="setup-form-control setup-form-control-sm block <?php echo (form_error('new_password')) ? 'error-border' : ''?>" id="new_password" name="new_password" <?php echo (form_error('new_password')) ? 'title="'.form_error('new_password').'"' : ''?> value="<?php echo (isset($post['new_password'])) ? $post['new_password']: '' ?>"/>
								</div>
							</div> 

							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.confirm_password')?></label>
									<input type="password" class="setup-form-control setup-form-control-sm block <?php echo (form_error('confirm_password')) ? 'error-border' : ''?>" id="confirm_password" name="confirm_password" <?php echo (form_error('confirm_password')) ? 'title="'.form_error('confirm_password').'"' : ''?> value="<?php echo (isset($post['confirm_password'])) ? $post['confirm_password']: '' ?>"/>
								</div>
								<div class="clear"></div>
							</div>

							<div class="clear"></div>

							<button class="button button-primary" type="submit"><i class="ion-checkmark-round"></i>&nbsp;&nbsp;<?php echo lang('auto.save')?></button>
							
							<div class="clear"></div>

						</div>

					</form> 

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>