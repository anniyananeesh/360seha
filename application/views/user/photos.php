<div class="clear"></div>

		<div class="setup-body container-fluid text-center bg-grayed">

			<?php $this->load->view('user/menu', array('isPublish' => $published));?>

			<div class="content-body block">
 
				<?php $this->load->view('user/status', array('isPublish' => $published));?>
 				
				<div class="setup-form block">
 					
 					<link rel="stylesheet" href="<?php echo PLUGINS_DIR?>/upload/css/jquery.fileupload.css">
					<link rel="stylesheet" href="<?php echo PLUGINS_DIR?>/upload/css/jquery.fileupload.ui.css">
					<!-- CSS adjustments for browsers with JavaScript disabled -->
					<noscript><link rel="stylesheet" href="<?php echo PLUGINS_DIR?>/upload/css/jquery.fileupload.noscript.css"></noscript>
					<noscript><link rel="stylesheet" href="<?php echo PLUGINS_DIR?>/upload/css/jquery.fileupload.ui.noscript.css"></noscript>
 
					<p class="h2 block strong"><?php echo lang('auto.photos')?></p>
					<p class="h3 block"><?php echo lang('auto.setup_subhead')?></p>

					 <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="<?php echo HOST_URL?>/account/async/upload" method="POST" enctype="multipart/form-data">
 
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar" dir="rtl">
            <div class="col-lg-7" dir="rtl">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="button button-sm button-primary fileinput-button button-media-sm left">
                    <i class="ion-plus-round"></i>
                    <span><?php echo lang('auto.add_files')?></span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="button button-sm button-success start button-media-sm left">
                    <i class="ion-play"></i>
                    <span><?php echo lang('auto.start_upload')?></span>
                </button>
                <button type="reset" class="button button-sm button-dark cancel button-media-sm left">
                    <i class="ion-close-round"></i>
                    <span><?php echo lang('auto.cancel_upload')?></span>
                </button>
                <button type="button" class="button button-sm button-danger delete button-media-sm left">
                    <i class="ion-trash-a"></i>
                    <span><?php echo lang('auto.delete')?></span>
                </button>

                <input type="checkbox" class="toggle left">
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>

            </div>

            <div class="clear"></div>

            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped" id="photosList">

            <tbody class="files">
            
            <?php if($records):?>

                <?php foreach($records AS $key => $value):?>

                        <tr class="template-download fade">
                            <td>
                                <span class="preview">
                                    
                                    <a href="<?php echo $imageShowPath.$value->img_url?>" title="Image" download="<?php echo $imageShowPath.$value->img_url?>" data-gallery><img src="<?php echo $imageShowPath.$value->img_url?>" width="80"></a>
                                    
                                </span>
                                <input type="hidden" value="<?php echo $value->img_id?>" class="index-row-<?php echo $key?>" id="index-row-<?php echo $key?>"/>
                            </td>
                            <td>
                                <span class="size"></span>
                                <span class="sort-handler" title="Arrange your photos"><i class="ion-arrow-move"></i></span>
                            </td>
                            <td>
                              
                                   <button class="button button-xs button-danger delete" data-type="DELETE" data-url="<?php echo HOST_URL?>/account/async/image_delete/?file=<?php echo $value->img_url?>">
                                        <i class="ion-trash-a"></i>
                                    </button>
                                    <input type="checkbox" name="delete" value="1" class="toggle">
 
                            </td>
                        </tr>

                <?php endforeach;?>

            <?php endif;?>

            </tbody>

        </table>
        
    </form>

                <!-- Row sorting-->
                <script type="text/javascript">
                    
                    RowSorter('#photosList', {
                        handler: 'span.sort-handler i',
                        stickFirstRow : true,
                        stickLastRow  : false,
                        onDragStart: function(tbody, row, index)
                        {
                            
                        },
                        onDrop: function(tbody, row, new_index, old_index)
                        { 
                            var imgID = $('#index-row-'+old_index).val();
                            $.get('<?php echo HOST_URL?>/account/async/save_image_order/'+imgID+'/'+new_index, function(res){

                                if(!res.error && res.code == 200)
                                {
                                    //console.log('Order changed :)');
                                }
                                else
                                {
                                    alert('Something went wrong :(');
                                    window.location.reload();
                                }

                            },'json');

                        }
                    });

                </script>

                <style type="text/css">
                    
                    span.sort-handler
                    {
                        background: #333;
                        font-size: 15px;
                        display: inline-block;
                        position: relative;
                        margin-top: 10px;
                        color: #fff;
                        border-radius: 2px;
                        padding: 4px;
                        cursor: move;
                    }


                </style>
					 

					<div class="clear"></div>

				</div>

				<div class="clear"></div>

			</div>

			<div class="clear"></div>

		</div>

		<script type="text/javascript">
			
			'use strict';

			$(function () {
			 
			    // Initialize the jQuery File Upload widget:
			    $('#fileupload').fileupload({
			        // Uncomment the following to send cross-domain cookies:
			        //xhrFields: {withCredentials: true},
			        url: '<?php echo HOST_URL?>/account/async/upload',
			        sequentialUploads: true
			    }); 

                $('#fileupload').bind('fileuploaddone', function (e, data){

                    var activeUploads = $('#fileupload').fileupload('active');

                    if(activeUploads == 1)
                    {
                        window.location.reload();
                    } 

                });

			});

		</script>

		<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td valign="middle" align="center">
            <span class="preview"></span>
        </td>
        <td valign="middle" align="center">
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td valign="middle" align="center">
            {% if (!i && !o.options.autoUpload) { %}
                <button class="button button-xs button-primary start" disabled>
                    <i class="ion-play"></i>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="button button-xs button-danger cancel">
                    <i class="ion-trash-a"></i>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                {% } %}
            </span>
        </td>

        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            {% if (file.deleteUrl) { %}
                <button class="button button-xs button-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="ion-trash-a"></i>
                </button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            {% } else { %}
                <button class="button button-xs button-primary cancel">
                    <i class="ion-close-round"></i>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>

<script src="<?php echo PLUGINS_DIR?>/upload/vendor/jquery.ui.widget.js"></script>
					<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
					<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
					<script src="<?php echo PLUGINS_DIR?>/upload/jquery.iframe-transport.js"></script>
					<script src="<?php echo PLUGINS_DIR?>/upload/jquery.fileupload.js"></script>
					<script src="<?php echo PLUGINS_DIR?>/upload/jquery.fileupload-process.js"></script>
					<script src="<?php echo PLUGINS_DIR?>/upload/jquery.fileupload-image.js"></script>
					<script src="<?php echo PLUGINS_DIR?>/upload/jquery.fileupload-validate.js"></script>
					<script src="<?php echo PLUGINS_DIR?>/upload/jquery.fileupload-ui.js"></script>