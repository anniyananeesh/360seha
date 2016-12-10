<section>

    <div class="m-l-lg m-b-md">
        <h3 class="m-b-none font-thin"><i class="i i-browser"></i> <?php echo $title;?></h3>
        <p class="h4 font-thin pull-left m-t-sm"><?php echo $sub_title;?></p>
    </div>
    
    <div class="clearfix"></div>
    
    <?php if($this->session->flashdata('message')):?>
    
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-ok-sign"></i>
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
    
    <div class="clearfix"></div>
    
    <hr/>
    <div class="row wrapper m-l-xs">
 
        <div class="col-md-9" style="margin-top: 30px;">

          <div class="row row-sm"> 
              
            <div class="col-xs-6 col-sm-4 col-md-3">
                
                <div class="thumbnail">
                    
                    <a class="view_image text-center" href="<?php echo base_url().ADMIN_URL?>newsletters/upload_template/">
                        
                        <i class="i i-plus text-muted font-thin" style="font-size: 80px; margin-top: 55px;"></i>
                        
                    </a>

                    <div class="caption">
                        
                        <div class="checkbox i-checks text-success" style="float: left;">Upload New Template</div>
                        <div class="clearfix"></div>
                        
                    </div>
                    
                </div>
                
            </div>

            <?php foreach($tpls as $tpl):?>
              
            <div class="col-xs-6 col-sm-4 col-md-3">
                
                <?php $_id = $this->encrypt->encode( $tpl->tpl_id)?>
                
                <div class="thumbnail" id="thumb_<?php echo $tpl->tpl_id?>">
                    <a class="view_image" href="<?php echo base_url().ADMIN_URL?>newsletters/view_template/<?php echo $_id?>">
                        
                        <?php if($tpl->tpl_thumb != NULL):?>
                            <img src="<?php echo base_url().'uploads/newsletter/'.$tpl->tpl_thumb?>"/>
                        <?php else:?>
                            <img src="<?php echo base_url().NO_THUMB_NEWSLETTER?>"/>
                        <?php endif;?>
                    </a>

                    <div class="caption">
                        
                        <div class="checkbox i-checks" style="float: left;">
 
                            <?php echo (strlen($tpl->tpl_title) > 18) ? substr( $tpl->tpl_title, 0, 18).'...' : $tpl->tpl_title;?>
                        </div>
 
                        <a href="<?php echo base_url().ADMIN_URL?>newsletters/delete_template/<?php echo $this->encrypt->encode( $tpl->tpl_id)?>" class="m-t-sm pull-right">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                        
                        <a href="<?php echo base_url().ADMIN_URL?>newsletters/edit_template/<?php echo $this->encrypt->encode( $tpl->tpl_id)?>" class="m-t-sm pull-right m-r-sm" data-uri="<?php echo $this->encrypt->encode( $tpl->tpl_id)?>">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        
                        <div class="clearfix"></div>
                        
                    </div>
                    
                </div>
                
            </div>
              
            <?php endforeach;?>               

          </div>

          <div class="clearfix visible-xs"></div>  

        </div>
        
    </div>
    
</section>