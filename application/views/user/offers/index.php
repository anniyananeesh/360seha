<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">

				<?php $this->load->view('user/status', array('isPublish' => $published));?>

				<div class="setup-form block">

					<p class="h2 block strong"><?php echo lang('auto.offers');?></p>
					<p class="h3 block"><?php echo lang('auto.profile_offers_subhead');?></p>

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

							<button type="button" class="button button-sm button-secondary-hollow left button-clear" onclick="javascript: window.location.href='<?php echo HOST_URL.$ctrlUrl?>/add'">
								<i class="ion-plus-round"></i>&nbsp;&nbsp;Add
							</button>

							<div class="clear"></div>

							<table width="100%" class="table table-striped">

								<tr>
									<th width="100"><?php echo lang('auto.image');?></th>
									<th><?php echo lang('auto.title');?></th>
									<th><?php echo lang('auto.department');?></th>
									<th><?php echo lang('auto.voucher_code');?></th>
									<th><?php echo lang('auto.action');?></th>
								</tr>

								<?php if($records):?>

									<?php foreach($records AS $key => $value):?>
										<tr>
											<td>

												<?php if($value->thumb_url != NULL):?>
													<img src="<?php echo $imageShowPath.$value->thumb_url?>" width="80"/>
												<?php endif;?>

											</td>
											<td><?php echo $value->{title_.$lan}?></td>
											<td><?php echo $value->{dept_title_.$lan}?></td>
											<td><?php echo ($value->voucher_code != NULL) ? $value->voucher_code : '-'?></td>
											<td>

												<a title="Send the offer as notification" href="<?php echo HOST_URL.$ctrlUrl?>/send/<?php echo $this->encrypt->encode($value->wall_id)?>" onclick="javascript: return confirm('Do you want to send this offer as notification?');" class="left icon-edit block">
														<i class="ion-paper-airplane"></i> Send
												</a>

                        <a href="<?php echo HOST_URL.$ctrlUrl?>/status/<?php echo $this->encrypt->encode($value->wall_id)?>/<?php echo ($value->status == 1) ? 'N' : 'Y';?>" class="left <?php echo ($value->status == 0) ? 'icon-edit' : 'icon-delete';?> block" style="margin-right :5px">
													<i class="<?php echo ($value->status == 1) ? 'ion-close-round' : 'ion-checkmark-round';?>"></i>
												</a>

												<a href="<?php echo HOST_URL.$ctrlUrl?>/edit/<?php echo $this->encrypt->encode($value->wall_id)?>" class="left icon-edit block">
													<i class="ion-edit"></i>
												</a>

												<a onclick="javascript: return confirm('Do you want to delete this entry?');" href="<?php echo HOST_URL.$ctrlUrl?>/delete/<?php echo $this->encrypt->encode($value->wall_id)?>" class="left icon-delete block">
													<i class="ion-trash-a"></i>
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
