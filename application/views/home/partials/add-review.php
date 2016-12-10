<div class="modal block">
	
	<div class="modal-header block">
		<?php echo lang('auto.add_review')?>

		<button class="btn btn-clear pull-right" onclick="Custombox.close();">
			<i class="ion-close-round"></i>
		</button>
	</div>

	<form action="" method="post" id="addReviewFrm" name="addReviewFrm" class="nomargins nopad">

		<div class="modal-body block">
		
			<div class="form-group">
				<label class="form-label"><?php echo lang('auto.wud_you_recommend')?></label>
				<div class="clearfix"></div>	
				<label class="normal left"><input type="radio" value="1" name="recommend"> <?php echo lang('auto.yes')?></label>	
				<label class="normal left"><input type="radio" value="0" name="recommend"> <?php echo lang('auto.no')?></label>	
	          	<div class="clearfix"></div>		
			</div> 

			<div class="form-group">
				<label class="form-label"><?php echo lang('auto.your_fullname')?></label>
				<input type="text" class="form-control form-control-text" placeholder="" name="full_name" id="full_name"/>	
	          	<div class="clearfix"></div>		
			</div>

			<div class="form-group">
				<label class="form-label"><?php echo lang('auto.your_comment')?></label>
				<textarea class="form-control form-control-text" name="message" id="message"></textarea>
	        	<div class="clearfix"></div>		
			</div>

			<input type="hidden" name="_email" id="_email" value="<?php echo $profileData->subs_email?>"/>
			<input type="hidden" name="_id" id="_id" value="<?php echo $this->encrypt->encode($profileData->user_id);?>"/>

		</div>

		<div class="modal-footer block">
			<button class="btn btn-success btn-block btn-lg" type="button" id="addReviewBtn"><?php echo lang('auto.add_review')?></button>
			<div class="clearfix"></div>
		</div>

	</form>

</div>

<script type="text/javascript">
	
	$(function(){

		$(document).on('click', '#addReviewBtn', function(evt){

			evt.preventDefault();

			var $form = $('#addReviewFrm'),
				dataURI = $form.serialize();

			$.post('<?php echo HOST_URL?>/async/post_review', dataURI, function(res)
			{
				if(res.code == 200)
				{
					$form.find('.flashmessage-info').remove();
					$form.find('.flashmessage-error').remove();
                 	$form.prepend('<div class="flashmessage flashmessage-info">' + res.message + '<a class="close" onclick="javascript:$(\'.flashmessage-info\').remove();" ><i class="ion-close-round"></i></a></div><div class="clear"></div>');

                 	setTimeout(function(){ 

						Custombox.close();
						$form.find('.flashmessage-error').remove();
						$form.find('.flashmessage-info').remove();

						$("#full_name").val('');
						$("#email").val(''); 
						$("#message").val(''); 
						
					}, 1000);

				}else{

					$form.find('.flashmessage-warning').remove();
					$form.find('.flashmessage-info').remove();
                 	$form.prepend('<div class="flashmessage flashmessage-warning">' + res.message + '<a class="close" onclick="javascript:$(\'.flashmessage-warning\').remove();" ><i class="ion-close-round"></i></a></div><div class="clear"></div>');
				}

			}, 'json');

		});

	})

</script>