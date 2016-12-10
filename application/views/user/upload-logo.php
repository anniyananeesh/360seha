		<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong"><?php echo lang('auto.upload_logo_title')?></p>
					<p class="h3 block"><?php echo lang('auto.upload_logo_subhead')?></p>

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
						
						<div class="col-60">

							<input type="hidden" id="dmyVal" name="dmyVal" value="1"/>

							<div class="col-5">
								<div class="setup-form-group block">
 									
 									<?php if(!empty($image) && $image != NULL):?>
 										<img src="<?php echo $imageShowPath.$image?>" width="200" class="left"/>
 									<?php endif;?>

 									<div class="clear"></div>

									<div class="flex-box-image block m-t-lg">
										<input type="file" name="userfile" id="userfile" class="inputfile inputfile-4"/>
										<label for="userfile" class="<?php echo (form_error('userfile')) ? 'error-border' : ''?>"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span><?php echo lang('auto.choose_a_file')?></span></label>
									</div>

									<?php if(form_error('userfile')):?>
										<div class="error">
											<?php echo form_error('userfile');?>
										</div>
									<?php endif;?>

								</div>
							</div>

							<div class="clear"></div>
 
							<button class="button button-primary" type="submit"><i class="ion-checkmark-round"></i>&nbsp;&nbsp;<?php echo lang('auto.save')?></button>

							<div class="clear"></div>

						</div>

					</form> 

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>

		<script type="text/javascript">
			
			'use strict';

			;( function ( document, window, index )
			{
				var inputs = document.querySelectorAll( '.inputfile' );
				Array.prototype.forEach.call( inputs, function( input )
				{
					var label	 = input.nextElementSibling,
						labelVal = label.innerHTML;

					input.addEventListener( 'change', function( e )
					{
						var fileName = '';
						if( this.files && this.files.length > 1 )
							fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
						else
							fileName = e.target.value.split( '\\' ).pop();

						if( fileName )
							label.querySelector( 'span' ).innerHTML = fileName;
						else
							label.innerHTML = labelVal;
					});

					// Firefox bug fix
					input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
					input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
				});
			}( document, window, 0 ));

		</script>