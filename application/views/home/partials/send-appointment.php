<div class="modal block">
	
	<div class="modal-header block">
		<?php echo lang('auto.make_appointment')?>

		<button class="btn btn-clear pull-right" onclick="Custombox.close();">
			<i class="ion-close-round"></i>
		</button>
	</div>

	<form action="" method="post" id="sendMessageFrm" name="sendMessageFrm" class="nomargins nopad">

		<div class="modal-body block">
		
			<div class="form-group">
				<label class="form-label"><?php echo lang('auto.your_fullname')?></label>
				<input type="text" class="form-control form-control-text" placeholder="" name="full_name" id="full_name"/>	
	          	<div class="clearfix"></div>		
			</div>

			<div class="form-group">
				<label class="form-label"><?php echo lang('auto.email_address')?></label>
				<input type="text" class="form-control form-control-text" placeholder="" name="email" id="email"/>
	         	<div class="clearfix"></div>				
			</div>

			<div class="form-group">
				<label class="form-label"><?php echo lang('auto.contact_no')?></label>
				<input type="text" class="form-control form-control-text" placeholder="" name="contact_no" id="contact_no"/>
	         	<div class="clearfix"></div>				
			</div> 

			<div class="form-group">
				<label class="form-label"><?php echo lang('auto.department')?></label> 
				<select name="department" id="department" class="form-control">
					<option value=""><?php echo lang('auto.choose')?></option>
					<?php foreach($departments AS $key => $value):?>
						<option value="<?php echo $value->dept_title_en?>"><?php echo $value->{dept_title_.$lan}?></option>
					<?php endforeach;?>
				</select>
	         	<div class="clearfix"></div>				
			</div>

			<div class="form-group">
				<label class="form-label"><?php echo lang('auto.appointment_date')?></label>
				<input type="date" class="form-control form-control-text" placeholder="" name="appointment_date" id="appointment_date"/>
	         	<div class="clearfix"></div>				
			</div> 

			<div class="form-group">
				<label class="form-label"><?php echo lang('auto.message')?></label>
				<textarea class="form-control form-control-text" name="message" id="message"></textarea>
	        	<div class="clearfix"></div>		
			</div>

			<input type="hidden" name="_email" id="_email" value="<?php echo $profileData->subs_email?>"/>
			<input type="hidden" name="_id" id="_id" value="<?php echo $this->encrypt->encode($profileData->user_id);?>"/>

		</div>

		<div class="modal-footer block">
			<button class="btn btn-success btn-block" type="button" id="sendMessageBtn"><?php echo lang('auto.make_appointment')?></button>
			<div class="clearfix"></div>
		</div>

	</form>

</div>

<script type="text/javascript">
	
	$(function(){

		$(document).on('click', '#sendMessageBtn', function(evt){

			evt.preventDefault();

			var $form = $('#sendMessageFrm'),
				dataURI = $form.serialize();

			$.post('<?php echo HOST_URL?>/async/post_appointment', dataURI, function(res)
			{
				if(res.code == 200)
				{
					$form.find('.alert-danger').remove();
					$form.find('.alert-success').remove();
                 	$form.prepend('<div class="alert alert-success">' + res.message + '<a class="close" onclick="javascript:$(\'.alert\').remove();" ><i class="ion-close-round"></i></a></div><div class="clear"></div>');

                 	setTimeout(function(){ 

						Custombox.close();
						$form.find('.alert-danger').remove();
						$form.find('.alert-success').remove();

						$("#full_name").val('');
						$("#email").val(''); 
						$("#message").val(''); 
						
					}, 1000);

				}else{

					$form.find('.alert-danger').remove();
					$form.find('.alert-success').remove();
                 	$form.prepend('<div class="alert alert-danger">' + res.message + '<a class="close" onclick="javascript:$(\'.alert\').remove();" ><i class="ion-close-round"></i></a></div><div class="clear"></div>');
				}

			}, 'json');

		});

	})

</script>