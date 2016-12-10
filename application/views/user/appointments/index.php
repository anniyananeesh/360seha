<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong"><?php echo lang('auto.appointment');?></p> 

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

							<div class="clear"></div> 

							<table width="100%" class="table table-striped">

								<tr>
									<th><?php echo lang('auto.user');?></th>
									<th><?php echo lang('auto.department');?></th>
									<th><?php echo lang('auto.voucher_code');?></th> 
									<th><?php echo lang('auto.day');?></th> 
									<th><?php echo lang('auto.time');?></th> 
									<th><?php echo lang('auto.status');?></th> 
									<th><?php echo lang('auto.action');?></th>
								</tr>

								<?php if($records):?>

									<?php foreach($records AS $key => $value):?>
										<tr>
											<td><?php echo $value->patient?></td>
											<td><?php echo $value->{dept_title_.$lan}?></td>
											<td><?php echo ($value->voucher_code != '' && $value->voucher_code != NULL) ? $value->voucher_code : 'N/A'?></td>
											<td><?php echo date('d F Y', strtotime($value->appointment_day))?></td> 
											<td><?php echo date('h:i A', strtotime($value->appointment_time))?></td>
											<td><?php echo $value->status?></td>
											<td>
												<a href="<?php echo HOST_URL.$ctrlUrl?>/edit/<?php echo $this->encrypt->encode($value->id)?>" class="left icon-edit block">
													<i class="ion-edit"></i>
												</a>

												<a onclick="javascript: return confirm('Do you want to delete this entry?');" href="<?php echo HOST_URL.$ctrlUrl?>/delete/<?php echo $this->encrypt->encode($value->id)?>" class="left icon-delete block">
													<i class="ion-close-round"></i>
												</a>

											</td>
										</tr>
									<?php endforeach;?>

								<?php else:?>
									<tr>
										<td colspan="3" align="center" valign="middle" height="30">No records has been found!</td>
									</tr>
								<?php endif;?>

							</table>

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