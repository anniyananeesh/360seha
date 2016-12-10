<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">

				<?php $this->load->view('user/status', array('isPublish' => $published));?>

				<div class="setup-form block">

					<p class="h2 block strong">Doctors</p>
					<p class="h3 block">Tell us a brief description about your company</p>

					<form action="" method="post" class="m-t-lg" enctype="multipart/form-data">

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

						<div class="col-10">

							<div class="col-60">

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Name</label>
										<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('name_en')) ? 'error-border' : ''?>" <?php echo (form_error('name_en')) ? 'title="'.form_error('name_en').'"' : ''?> value="<?php echo (isset($post['name_en'])) ? $post['name_en']: '' ?>" id="name_en" name="name_en"/>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Name in Arabic</label>
										<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('name_ar')) ? 'error-border' : ''?>" <?php echo (form_error('name_ar')) ? 'title="'.form_error('name_ar').'"' : ''?> value="<?php echo (isset($post['name_ar'])) ? $post['name_ar']: '' ?>" id="name_ar" name="name_ar"/>
									</div>
								</div>

								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Specialization</label>
										<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('specialization_en')) ? 'error-border' : ''?>" <?php echo (form_error('specialization_en')) ? 'title="'.form_error('specialization_en').'"' : ''?> value="<?php echo (isset($post['specialization_en'])) ? $post['specialization_en']: '' ?>" id="specialization_en" name="specialization_en"/>
									</div>
									<div class="clear"></div>
								</div>

								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Specialization in Arabic</label>
										<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('specialization_ar')) ? 'error-border' : ''?>" <?php echo (form_error('specialization_ar')) ? 'title="'.form_error('specialization_ar').'"' : ''?> value="<?php echo (isset($post['specialization_ar'])) ? $post['specialization_ar']: '' ?>" id="specialization_ar" name="specialization_ar"/>
									</div>
								</div>

								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">URL</label>
										<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('url')) ? 'error-border' : ''?>" <?php echo (form_error('url')) ? 'title="'.form_error('url').'"' : ''?> value="<?php echo (isset($post['url'])) ? $post['url']: '' ?>" id="url" name="url"/>
									</div>
								</div>

								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Upload image (640px X 640px) . Maximum 1 Mb filesize</label>
										<input type="file" name="userfile" id="userfile"/>

										<?php if(form_error('userfile')):?>
												<?php echo form_error('userfile');?>
										<?php endif;?>
									</div>
								</div>

								<div class="clear"></div>

								<button class="button button-green" type="submit">Save</button>
								<div class="clear"></div>

							</div>

						</div>

						<div class="clear"></div>

					</form>

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>
