<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">

				<?php $this->load->view('user/status', array('isPublish' => $published));?>

				<div class="setup-form block">

					<p class="h2 block strong"><?php echo lang('auto.access_head')?></p>
					<p class="h3 block"><?php echo lang('auto.access_subhead')?></p>

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

						<input type="hidden" value="1" name="dmyVal" id="dmyVal"/>

						<div class="col-60">

						 	<div class="department-chooser block">

 								<!-- <label class="checkbx-inner">
 									<input type="checkbox" <?php echo (is_array($menuAccess) && in_array('timings', $menuAccess)) ? 'checked' : '';?> name="access[]" value="timings"> <?php echo lang('auto.basic_inform')?>
 								</label>
 								<div class="clear"></div>

 								<label class="checkbx-inner">
 									<input type="checkbox" <?php echo (is_array($menuAccess) && in_array('appointment', $menuAccess)) ? 'checked' : '';?> name="access[]" value="appointment"> <?php echo lang('auto.make_appointment')?>
 								</label>
 								<div class="clear"></div>-->



 								<label class="checkbx-inner">
 									<input type="checkbox" <?php echo (is_array($menuAccess) && in_array('doctors', $menuAccess)) ? 'checked' : '';?> name="access[]" value="doctors"> <?php echo lang('auto.doctors')?>
 								</label>
 								<div class="clear"></div>
 								<label class="checkbx-inner">
 									<input type="checkbox" <?php echo (is_array($menuAccess) && in_array('photos', $menuAccess)) ? 'checked' : '';?> name="access[]" value="photos"> <?php echo lang('auto.photos')?>
 								</label>

								<div class="clear"></div>
 								<label class="checkbx-inner">
 									<input type="checkbox" <?php echo (is_array($menuAccess) && in_array('news', $menuAccess)) ? 'checked' : '';?> name="access[]" value="news"> <?php echo lang('auto.news')?>
 								</label>

								<div class="clear"></div>
 								<label class="checkbx-inner">
 									<input type="checkbox" <?php echo (is_array($menuAccess) && in_array('offers', $menuAccess)) ? 'checked' : '';?> name="access[]" value="offers"> <?php echo lang('auto.offers')?>
 								</label>
 								<!-- <div class="clear"></div>
 								<label class="checkbx-inner">
 									<input type="checkbox" <?php echo (is_array($menuAccess) && in_array('videos', $menuAccess)) ? 'checked' : '';?> name="access[]" value="videos"> <?php echo lang('auto.videos')?>
 								</label>

 								<div class="clear"></div>
 								<label class="checkbx-inner">
 									<input type="checkbox" <?php echo (is_array($menuAccess) && in_array('logo', $menuAccess)) ? 'checked' : '';?> name="access[]" value="logo"> <?php echo lang('auto.logo')?>
 								</label>-->


 								<!-- <div class="clear"></div>
 								<label class="checkbx-inner">
 									<input type="checkbox" <?php echo (is_array($menuAccess) && in_array('insurance', $menuAccess)) ? 'checked' : '';?> name="access[]" value="insurance"> <?php echo lang('auto.insurance')?>
 								</label>-->

 								<!--<div class="clear"></div>
 								<label class="checkbx-inner">
 									<input type="checkbox" <?php echo (is_array($menuAccess) && in_array('chat', $menuAccess)) ? 'checked' : '';?> name="access[]" value="chat"> <?php echo lang('auto.chat')?>
 								</label> -->

 							</div>

							<div class="clear"></div>

							<div class="clear"></div>

							<button class="button button-primary m-t-lg" type="submit"><i class="ion-checkmark-round"></i>&nbsp;&nbsp;<?php echo lang('auto.save')?></button>
							<div class="clear"></div>

						</div>

					</form>

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>
