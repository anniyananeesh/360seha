<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong"><?php echo lang('auto.videos')?></p>
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

						<div class="col-5">
							 
							<p class="h3 left block"><?php echo lang('auto.copy_youtube_url')?></p>
							<button type="button" class="button button-sm button-secondary-hollow right button-clear visible-lg-block addVideoUrl">
								<i class="ion-plus-round"></i>&nbsp;&nbsp;<?php echo lang('auto.add_video')?>
							</button>
							<button type="button" class="button button-sm button-secondary-hollow right button-clear visible-sm-block visible-md-block visible-xs-block addVideoUrl">
								<i class="ion-plus-round"></i>&nbsp;&nbsp;
							</button>

							<div class="clear"></div> 

							<div class="setup-videos block m-t-lg" id="videoItemList">

								<div class="setup-video-item block">

									<div class="col-6 left">
										<input type="text" class="setup-form-control setup-form-control-sm block" name="video[]" placeholder="Youtube URL" />
									</div>

									<div class="clear"></div> 
									
								</div>

								<?php if($videos):?>

									<?php foreach($videos AS $key => $value):?>
									<div class="setup-video-item block">
										<div class="col-6 left">
											<input type="text" class="setup-form-control setup-form-control-sm block" name="video[]" placeholder="Youtube URL" value="https://www.youtube.com/watch?v=<?php echo $value->vid_url?>" />
										</div>
										<div class="left icon-delete block delete-video">
											<i class="ion-close-round"></i>
										</div>
										<div class="clear"></div> 
									</div>
									<?php endforeach;?>
								<?php endif;?>

							</div>

							<div class="clear"></div> 

							<button class="button button-primary" type="submit" id="submitLocationBtn"><i class="ion-checkmark-round"></i>&nbsp;&nbsp;Save</button>
							&nbsp;&nbsp;
							<button class="button button-green" type="button" onclick="javascript: window.location.href='<?php echo HOST_URL.$nextUrl?>'">Next &nbsp;&nbsp;<i class="ion-arrow-right-c"></i></button>
							<div class="clear"></div>

						</div> 

						<script type="text/javascript">
							
							$(function(){

								$(document).on('click','.addVideoUrl',function(){

									var html = '<div class="setup-video-item block"><div class="col-6 left"><input type="text" class="setup-form-control setup-form-control-sm block" name="video[]" placeholder="Youtube URL" /></div><div class="left icon-delete block delete-video"><i class="ion-close-round"></i></div><div class="clear"></div></div>';

									$('#videoItemList').append(html);

									return false;

								});

								$(document).on('click','.delete-video',function(){
									$(this).parent().remove();
									return false;
								});

							})

						</script>

						<div class="clear"></div>

					</form> 

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>