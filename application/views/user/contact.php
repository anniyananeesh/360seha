<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong"><?php echo lang('auto.contact_info')?></p>
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
							
							<!-- <div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.contact_person')?></label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('contact_person')) ? 'error-border' : ''?>" id="contact_person" name="contact_person" <?php echo (form_error('contact_person')) ? 'title="'.form_error('contact_person').'"' : ''?> value="<?php echo (isset($post['contact_person'])) ? $post['contact_person']: '' ?>"/>
								</div>
								<div class="clear"></div>
							</div> -->

							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.email_address')?></label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('email')) ? 'error-border' : ''?>" id="email" name="email" <?php echo (form_error('email')) ? 'title="'.form_error('email').'"' : ''?> value="<?php echo (isset($post['email'])) ? $post['email']: '' ?>"/>
								</div>
							</div> 

							<div class="clear"></div>

							<!-- <div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.telephone')?></label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('tel')) ? 'error-border' : ''?>" id="tel" name="tel" <?php echo (form_error('tel')) ? 'title="'.form_error('tel').'"' : ''?> value="<?php echo (isset($post['tel'])) ? $post['tel']: '' ?>"/>
								</div>
								<div class="clear"></div>
							</div>

							<div class="clear"></div>-->

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.contact_no')?></label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('contact_no')) ? 'error-border' : ''?>" id="contact_no" name="contact_no" <?php echo (form_error('contact_no')) ? 'title="'.form_error('contact_no').'"' : ''?> value="<?php echo (isset($post['contact_no'])) ? $post['contact_no']: '' ?>"/>
								</div>
								<div class="clear"></div>
							</div>

							<div class="clear"></div>
							<p class="h4 strong m-b-lg"><?php echo lang('auto.other_info')?></p>
							<div class="clear"></div>
							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><i class="ion-link"></i>&nbsp;&nbsp;<?php echo lang('auto.website_link')?></label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('url')) ? 'error-border' : ''?>" id="url" name="url" <?php echo (form_error('url')) ? 'title="'.form_error('url').'"' : ''?> value="<?php echo (isset($post['url'])) ? $post['url']: '' ?>"/>
								</div>
								<div class="clear"></div>
							</div> 

							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><i class="ion-social-facebook"></i>&nbsp;&nbsp;<?php echo lang('auto.facebook_page')?></label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('social_fb_link')) ? 'error-border' : ''?>" id="social_fb_link" name="social_fb_link" <?php echo (form_error('social_fb_link')) ? 'title="'.form_error('social_fb_link').'"' : ''?> value="<?php echo (isset($post['social_fb_link'])) ? $post['social_fb_link']: '' ?>"/>
								</div>
								<div class="clear"></div>
							</div> 

							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><i class="ion-social-twitter"></i>&nbsp;&nbsp;<?php echo lang('auto.twitter_page')?></label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('social_tweet_link')) ? 'error-border' : ''?>" id="social_tweet_link" name="social_tweet_link" <?php echo (form_error('social_tweet_link')) ? 'title="'.form_error('social_tweet_link').'"' : ''?> value="<?php echo (isset($post['social_tweet_link'])) ? $post['social_tweet_link']: '' ?>"/>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><i class="ion-social-instagram-outline"></i>&nbsp;&nbsp;<?php echo lang('auto.instagram_page')?></label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('social_inst_link')) ? 'error-border' : ''?>" id="social_inst_link" name="social_inst_link" <?php echo (form_error('social_inst_link')) ? 'title="'.form_error('social_inst_link').'"' : ''?> value="<?php echo (isset($post['social_inst_link'])) ? $post['social_inst_link']: '' ?>"/>
								</div>
								<div class="clear"></div>
							</div>

							<div class="clear"></div>

							<button class="button button-primary" type="submit"><i class="ion-checkmark-round"></i>&nbsp;&nbsp;<?php echo lang('auto.save')?></button>
							&nbsp;&nbsp;
							<button class="button button-green" type="button" onclick="javascript: window.location.href='<?php echo HOST_URL.$nextUrl?>'"><?php echo lang('auto.next')?> &nbsp;&nbsp;<i class="ion-arrow-right-c"></i></button>
							
							<div class="clear"></div>

						</div>

					</form> 

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>