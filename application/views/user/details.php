<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong"><?php echo lang('auto.details_info')?></p>
					<p class="h3 block"><?php echo lang('auto.setup_subhead')?></p>

					<form action="" method="post" class="m-t-lg">
						<input type="hidden" name="dmyVal" value="1" />
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
									<label class="setup-form-label block"><?php echo lang('auto.do_you_have_emergency')?></label>
									<div class="onoffswitch">
									    <input type="checkbox" <?php echo (isset($post['has_emergency']) && $post['has_emergency']) ? 'checked="checked"' : '';?> name="has_emergency" class="onoffswitch-checkbox" id="myonoffswitch">
									    <label class="onoffswitch-label" for="myonoffswitch">
									        <span class="onoffswitch-inner"></span>
									        <span class="onoffswitch-switch"></span>
									    </label>
									</div>
								</div>
								<div class="clear"></div>
							</div>



							<!-- 
							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.do_you_have_insurance')?></label>
									<div class="onoffswitch">
									    <input type="checkbox" name="has_insurance" class="onoffswitch-checkbox" id="myonoffswitch2" <?php echo (isset($post['has_insurance']) && $post['has_insurance']) ? 'checked="checked"' : '';?>>
									    <label class="onoffswitch-label" for="myonoffswitch2">
									        <span class="onoffswitch-inner"></span>
									        <span class="onoffswitch-switch"></span>
									    </label>
									</div>
								</div>
								<div class="clear"></div>
							</div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.accepts_payments')?></label>
									<div class="clear"></div>
									<label class="<?php echo ($lan == 'en') ? 'left' : 'right'?> payments">
										<input type="checkbox" value="cash" name="payments[]" <?php echo (in_array('cash', $post['payments'])) ? 'checked' : ''?>/> <?php echo lang('auto.cash')?>
									</label>

									<label class="<?php echo ($lan == 'en') ? 'left' : 'right'?> payments">
										<input type="checkbox" value="credit_card" name="payments[]" <?php echo (in_array('credit_card', $post['payments'])) ? 'checked' : ''?>/> <?php echo lang('auto.credit_card')?>
									</label>

								</div>
								<div class="clear"></div>
							</div> -->

							<div class="clear"></div>

							<div class="col-10 setup-form-group">
								<div class="col-5 h4 block">
									<?php echo lang('auto.public_url')?>
								</div>
								<div class="clear"></div>

								<div class="h2 left text-middle profile-url">
									http://360seha.com/&nbsp;&nbsp;
								</div>
								<div class="col-5 h2">
									<input type="text" class="setup-form-control setup-form-control-sm block" value="<?php echo (isset($post['subs_public_profile'])) ? $post['subs_public_profile'] : '';?>" name="subs_public_profile" id="subs_public_profile"/>
								</div>
								<div class="clear"></div>
							</div>

							<div class="clear"></div>  

							<button class="button button-primary" type="submit">
								<i class="ion-checkmark-round"></i>&nbsp;&nbsp;<?php //echo ($published == 1) ? 'Save' : 'Submit for approval';?><?php echo lang('auto.save')?>
							</button>
							
							<div class="clear"></div>

						</div>

					</form> 

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>

		<style type="text/css">
			
			label.payments
			{
				margin-right: 8px;
				margin-top: 5px;
			}

			label.payments
			{
				padding-right: 5px;
			}

		</style>