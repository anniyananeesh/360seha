<script src="<?php echo ACTIVE_THEME?>js/ckeditor/ckeditor.js"></script>
 
<section class="scrollable padder">
    
              <div class="m-b-md">
 
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><i class="fa fa-folder-open-o"></i> <?php echo $title;?> - <strong><?php echo $record->tpl_title?></strong></h3>
                  <div class="clearfix"></div>
                  <p class="h5 font-thin pull-left m-t-sm"><?php echo $sub_title?></p>
                  
              </div> 
    
    <span class="clearfix"></span>
 
    <hr/>
    
    <?php if($this->session->flashdata('message')):?>
    
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p class="h3 font-thin"><?php echo $this->session->flashdata('message');?></p>
        </div>
    
    <?php endif;?>
    
    <?php if($this->session->flashdata('notify_error')):?>
    
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-ok-sign"></i>
            <?php echo $this->session->flashdata('notify_error');?>
        </div>
    
    <?php endif;?>
    
    <style>

		/* Style the CKEditor element to look like a textfield */
		.cke_textarea_inline
		{
			padding: 10px;
			height: 500px;
			overflow: auto;

			border: 1px solid gray;
			-webkit-appearance: textfield;
		}

	</style>

 
    <section class="panel panel-default wrapper" style="margin-top: 10px;">
        
       <div class="panel-body">
                    
           <form class="form-horizontal" method="post"> 
               
                <p class="h3 font-thin">You can manage & edit your newsletter template here </p>
               
		<div class="form-group m-t-lg">
                      <label class="col-sm-2"><strong>Newsletter Template Title</strong></label>
                      
                      <span class="clearfix"></span>
                      <div class="col-sm-4">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="tpl_title" id="tpl_title" value="<?php echo $record->tpl_title?>"/>
                          
                          <?php if(form_error('tpl_title')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('tpl_title');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                      
                </div>
               
                <div class="form-group m-t-lg">
 
                    <label class="col-sm-2"><strong>Newsletter Template Title</strong></label>
                        
                    <span class="clearfix"></span>
                    <div class="col-sm-8">
                        
                        <textarea name="article-body" id="article-body" style="height: 400px">
                            <?php echo $html_content;?>
			</textarea>
                            
                      </div>
 
                </div>
                
                <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default btn-rounded" onclick="javascript: location.href='<?php echo base_url()?>admin/language/'">Cancel</button>
                        <button type="submit" class="btn btn-success btn-rounded m-l-sm">Save changes</button>
                      </div>
                    </div>
 
	</form>

	<script>
		CKEDITOR.inline( 'article-body' );
	</script>
        
    </section>
    
</section>