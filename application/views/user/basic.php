<div class="clear"></div>
		
		<script type="text/javascript" src="<?php echo base_url().'/'.EDITOR_URL?>tinyMCE/tiny_mce.js"></script>
		<script type="text/javascript">

		    tinyMCE.init({
		        mode : "specific_textareas",
		          editor_selector : "editor",
		        elements : "ajaxfilemanager",
		        theme : "advanced",
		        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
		        
		        theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,link,unlink,anchor,image,cleanup,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		        theme_advanced_buttons3 : "tablecontrols,|,removeformat,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,ltr,rtl,|,fullscreen",
		        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak",
		      
		        theme_advanced_buttons3_add_before : "",

		        theme_advanced_buttons3_add : "media",
		        theme_advanced_toolbar_location : "top",
		        theme_advanced_toolbar_align : "left",
		        extended_valid_elements : "hr[class|width|size|noshade]",
		        paste_use_dialog : false,
		        theme_advanced_resizing : true,
		        theme_advanced_resize_horizontal : true,
		        apply_source_formatting : true,
		        force_br_newlines : true,
		        force_p_newlines : false, 
		        relative_urls : false

		      });

		  </script>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $profileData->published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $profileData->published));?>
 
				<div class="setup-form block">
					
					<p class="h2 block strong"><?php echo lang('auto.basic_inform')?></p>
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
	           		
						<div class="col-60">
							
							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.company_name')?></label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('name_en')) ? 'error-border' : ''?>" name="name_en" value="<?php echo $profileData->subs_title_en?>" <?php echo (form_error('name_en')) ? 'title="'.form_error('name_en').'"' : ''?>/>
								</div>
								<div class="clear"></div>
							</div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.company_name_ar')?></label>
									<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('name_ar')) ? 'error-border' : ''?>" name="name_ar" value="<?php echo $profileData->subs_title_ar?>" <?php echo (form_error('name_ar')) ? 'title="'.form_error('name_ar').'"' : ''?>/>
								</div>
								<div class="clear"></div>
							</div>

							<div class="clear"></div>

							<div class="col-5">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.category')?></label>
									<select class="setup-form-control form-control setup-form-control-sm block <?php echo (form_error('category')) ? 'error-border' : ''?>" name="category" <?php echo (form_error('category')) ? 'title="'.form_error('category').'"' : ''?>>
										<option value=""><?php echo lang('auto.choose')?></option>
										<?php foreach($category AS $key => $value):?>
											<option value="<?php echo $value->id_category?>" <?php echo ($value->id_category == $profileData->subs_cat_id) ? 'selected': '';?>><?php echo $value->{name_.$lan}?></option>
										<?php endforeach;?>
									</select>
								</div>
							</div> 

							<div class="clear"></div>

							<div class="col-10">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.brief_description_english')?></label>
									<textarea class="setup-form-control editor setup-form-control-sm block <?php echo (form_error('description_en')) ? 'error-border' : ''?>" name="description_en" rows="8" <?php echo (form_error('description_en')) ? 'title="'.form_error('description_en').'"' : ''?>><?php echo $profileData->description_en?></textarea>
								</div>
							</div> 

							<div class="clear"></div>

							<div class="col-10">
								<div class="setup-form-group block">
									<label class="setup-form-label block"><?php echo lang('auto.brief_description_arabic')?></label>
									<textarea class="setup-form-control editor setup-form-control-sm block <?php echo (form_error('description_ar')) ? 'error-border' : ''?>" name="description_ar" rows="8" <?php echo (form_error('description_ar')) ? 'title="'.form_error('description_ar').'"' : ''?>><?php echo $profileData->description_ar?></textarea>
								</div>
							</div> 

							<div class="clear"></div>

							<button class="button button-primary" type="submit"><i class="ion-checkmark-round"></i>&nbsp;&nbsp;<?php echo lang('auto.save')?></button>
							&nbsp;&nbsp;
							<button class="button button-green" type="button" onclick="javascript: window.location.href='<?php echo HOST_URL.$nextUrl?>'"><?php echo lang('auto.next')?> &nbsp;&nbsp;<i class="ion-arrow-right-c"></i></button>
							<div class="clear"></div>

						</div>

					</form> 

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>