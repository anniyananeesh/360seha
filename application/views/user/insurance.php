<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong"><?php echo lang('auto.choose_insurance_companies')?></p>
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
						
						<input type="hidden" name="dmyVal" value="1"/>

						<div class="col-10">
 							
 							<div class="department-chooser block">
 							<?php if($records):?>

 								<?php foreach($records AS $key => $value):?>

 									<label class="checkbx-inner <?php echo (in_array($value->ins_id, $userInsurance)) ? 'active' : '';?>">
 										<input type="checkbox" <?php echo (in_array($value->ins_id, $userInsurance)) ? 'checked' : '';?> value="<?php echo $value->ins_id?>" name="ins[]" class="checkbx-department"/>
 										<?php echo $value->{title_.$lan};?>
 									</label>

 								<?php endforeach;?>

 							<?php endif;?>
 							</div>

							<div class="clear"></div> 

							<button class="button button-primary m-t-lg" type="submit"><i class="ion-checkmark-round"></i>&nbsp;&nbsp;<?php echo lang('auto.save')?></button>
							<div class="clear"></div>

						</div>

						<div class="clear"></div>

					</form> 

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div> 