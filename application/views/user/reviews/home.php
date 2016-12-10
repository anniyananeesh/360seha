<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong">Reviews</p>
					<p class="h3 block">Manage the user reviews.</p>

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
									<th>Name</th>
									<th>Message</th>
									<th>Rated</th> 
									<th>Posted on</th> 
									<th>Action</th>
								</tr>

								<?php if($records):?>

									<?php foreach($records AS $key => $value):?>
										<tr>
											<td><?php echo $value->name?></td>
											<td><?php echo character_limiter(stripslashes(strip_tags($value->message)), 80, '...')?></td>
											<td><?php echo $value->rating?></td>
											<td><?php echo date('d M Y', strtotime($value->created_on));?></td>  
											<td>

												<a href="<?php echo HOST_URL.$ctrlUrl?>/view/<?php echo $this->encrypt->encode($value->id)?>" class="left icon-edit block" title="View item">
													<i class="ion-eye"></i>
												</a>

												<?php if($value->is_approve == 1):?>
													<a href="<?php echo HOST_URL.$ctrlUrl?>/approve/<?php echo $this->encrypt->encode($value->id)?>/0" class="left icon-edit block">
														<i class="ion-close-circled"></i>
													</a>

												<?php else:?>
													<a href="<?php echo HOST_URL.$ctrlUrl?>/approve/<?php echo $this->encrypt->encode($value->id)?>/1" class="left icon-edit block">
														<i class="ion-checkmark-round"></i>
													</a>
												<?php endif;?>

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