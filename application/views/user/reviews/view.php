<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong">Reviews</p>
					<p class="h3 block">Manage your reviews here</p>

					<form action="" method="post" class="m-t-lg">
						  <input type="hidden" name="_dm" value="0TqRJcaiLxpXI9KTDG_Niwz-_K5mry4wUY3bewAl5To"/>
						<div class="col-10">
 
							<div class="col-60">
								
								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Name</label>
										<div class="content-section"><?php echo $post['name']?></div>
									</div>
									<div class="clear"></div>
								</div>

								<div class="clear"></div> 

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Message</label>
										<div class="content-section"><?php echo $post['message']?></div>
									</div>
								</div> 

								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Rating</label>
										<div class="content-section"><?php echo $post['rating']?></div>
									</div>
								</div> 

								<div class="clear"></div>

								<button class="button button-green pull-left" type="submit">Publish</button>

								<button class="button" type="button" onclick="javascript: window.location.href='<?php echo HOST_URL.$ctrlUrl?>'"><i class="ion-arrow-left-c"></i> Back</button>

								<div class="clear"></div>

							</div>

							<style type="text/css">
								
								.content-section
								{
									line-height: 20px;
								}

							</style>

						</div>

						<div class="clear"></div>

					</form> 

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>