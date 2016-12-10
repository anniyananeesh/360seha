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

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">

				<?php $this->load->view('user/status', array('isPublish' => $published));?>

				<div class="setup-form block">

          <p class="h2 block strong"><?php echo lang('auto.news');?></p>
					<p class="h3 block"><?php echo lang('auto.profile_news_subhead');?></p>

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

						<div class="col-10">

							<div class="col-60">

								<div class="col-12">
									<div class="setup-form-group block">
										<label class="setup-form-label block"><?php echo lang('auto.title');?> <span class="required">*</span></label>
										<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('name_en')) ? 'error-border' : ''?>" <?php echo (form_error('name_en')) ? 'title="'.form_error('name_en').'"' : ''?> value="<?php echo (isset($post['name_en'])) ? $post['name_en']: '' ?>" id="name_en" name="name_en"/>
									</div>
									<div class="clear"></div>
								</div>

                <div class="clear"></div>

								<div class="col-12">
									<div class="setup-form-group block">
										<label class="setup-form-label block"><?php echo lang('auto.title_arabic');?> <span class="required">*</span></label>
										<input type="text" class="setup-form-control setup-form-control-sm block <?php echo (form_error('name_ar')) ? 'error-border' : ''?>" <?php echo (form_error('name_ar')) ? 'title="'.form_error('name_ar').'"' : ''?> value="<?php echo (isset($post['name_ar'])) ? $post['name_ar']: '' ?>" id="name_ar" name="name_ar"/>
									</div>
								</div>

                <div class="clear"></div>

								<div class="col-5">
									<div class="setup-form-group block">
										<label class="setup-form-label block">Upload image (1280px X 640px) . Maximum 1Mb filesize <span class="required">*</span></label>
										<input type="file" name="userfile" id="userfile"/>
									</div>
								</div>

								<div class="clear"></div>

                <div class="col-12">
									<div class="setup-form-group block">
										<label class="setup-form-label block"><?php echo lang('auto.description');?></label>
										<textarea class="setup-form-control editor setup-form-control-sm block <?php echo (form_error('description_en')) ? 'error-border' : ''?>" name="description_en" rows="8" <?php echo (form_error('description_en')) ? 'title="'.form_error('description_en').'"' : ''?>><?php echo (isset($post['description_en'])) ? $post['description_en']: '' ?></textarea>
									</div>
								</div>

                <div class="clear"></div>

                <div class="col-12">
									<div class="setup-form-group block">
										<label class="setup-form-label block"><?php echo lang('auto.description_arabic');?></label>
										<textarea class="setup-form-control editor setup-form-control-sm block <?php echo (form_error('description_ar')) ? 'error-border' : ''?>" name="description_ar" rows="8" <?php echo (form_error('description_ar')) ? 'title="'.form_error('description_ar').'"' : ''?>><?php echo (isset($post['description_ar'])) ? $post['description_ar']: '' ?></textarea>
									</div>
								</div>

								<div class="clear"></div>

								<button class="button button-green" type="submit">Save</button>
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
