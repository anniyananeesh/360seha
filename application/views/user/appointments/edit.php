<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong">Reschedule / Manage Appointment</p> 

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

						<div class="col-10">
 
							<div class="col-60">
								
								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">User</label>
										<p class="readonly-label"><?php echo $post['patient']?></p>
									</div>
									<div class="clear"></div>
								</div> 

								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Department</label>
										<p class="readonly-label"><?php echo $post['dept_title_en']?></p>
									</div>
								</div> 

								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Voucher Code</label>
										<p class="readonly-label"><?php echo ($post['voucher_code'] != '' && $post['voucher_code'] != null) ? $post['voucher_code'] : 'N/A'?></p>
									</div>
								</div>

								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Appointment Date</label>
										<p class="readonly-label">
											<input type="text" name="appointment_day" id="appointment_day" value="<?php echo date('Y/m/d', strtotime($post['appointment_day']))?>" class="form-control" readonly/>
										</p>
									</div>
								</div>

								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Appointment Time</label>
										<p class="readonly-label">
										<input type="text" name="appointment_time" id="appointment_time" value="<?php echo $post['appointment_time']?>" class="form-control"/>
										</p>
									</div>
								</div>

								<div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Status</label>
										<p class="readonly-label">
											
											<select name="status" id="status" class="form-control">
												<option value="Pending" <?php echo ($post['status'] == 'Pending') ? 'selected' : '';?>>Pending</option>
												<option value="Rejected" <?php echo ($post['status'] == 'Rejected') ? 'selected' : '';?>>Rejected</option>
												<option value="Confirmed" <?php echo ($post['status'] == 'Confirmed') ? 'selected' : '';?>>Confirmed</option>
											</select>
										</p>
									</div>
								</div>

								<div class="clear"></div>

								<button class="button button-green" type="submit">Update</button>
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

		<link rel="stylesheet" href="<?php echo PLUGINS_DIR?>/timepicker/jquery.timepicker.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo PLUGINS_DIR?>/datetime-picker/jquery.datetimepicker.css" type="text/css" />
 		<script type="text/javascript" src="<?php echo PLUGINS_DIR?>/timepicker/jquery.timepicker.min.js"></script>
 		<script type="text/javascript" src="<?php echo PLUGINS_DIR?>/datetime-picker/jquery.datetimepicker.js"></script>

		<script type="text/javascript">
			
			$(function(){

				$('#appointment_time').timepicker({ 'timeFormat': 'h:i A' });

				jQuery('#appointment_day').datetimepicker({
				  timepicker: false,
				  format:'m/d/Y',
				  minDate:'-<?php echo date('Y/m/d', strtotime('-1 days'));?>'
				});

			});

		</script>

		<style type="text/css">
			
			.readonly-label
			{
				display: block;
			    position: relative;
			    width: auto;
			    height: auto;
			    font-size: 14px;
			    padding: 4px 0px;
			    color: #000;
				height: auto;
			}

		</style>

