
<section class="scrollable padder">

    <div class="m-b-md">
        <h3 class="m-b-none"><?php echo $title;?></h3>
        <small class="text-muted inline m-b-sm" style="margin-top: 28px;"><?php echo $sub_title;?></small>
    </div>
    

    <?php if($this->session->flashdata('message')):?>
    
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-ok-sign"></i>
            <?php echo $this->session->flashdata('message');?>
        </div>
    
    <?php endif;?>
    
    <?php if($this->session->flashdata('notify_error')):?>
    
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-ok-sign"></i>
            <?php echo $this->session->flashdata('notify_error');?>
        </div>
    
    <?php endif;?>
    
    <section class="panel panel-default">
 
        <div class="panel-body">
            
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
 
                <div class="form-group">

                    <label class="col-sm-2 control-label"><strong>Username <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-sm-4"> 
                        <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('username')):?>has-error<?php endif;?>" name="username" id="username" value="<?php echo set_value('username');?>"/>
                        <?php if(form_error('username')):?>
                            <div class="error_info">
                                <?php echo form_error('username');?>
                            </div> 
                        <?php endif;?>
                    </div>
                    <div class="clearfix"></div> 

                </div>
                
                <div class="line line-dashed b-b line-lg pull-in"></div>

                <div class="form-group">

                    <label class="col-sm-2 control-label"><strong>Put your password <span class="required-txt">*</span></strong></label>
                    <div class="clearfix"></div>
                    <div class="col-sm-4">
                        <label>Password</label> 
                        <input type="password" autofocus autocomplete="off" class="form-control <?php if(form_error('password')):?>has-error<?php endif;?>" name="password" id="password" value="<?php echo set_value('password');?>"/>
                        <?php if(form_error('password')):?>
                            <div class="error_info">
                                <?php echo form_error('password');?>
                            </div> 
                        <?php endif;?>
                    </div>

                    <div class="col-sm-4">
                        <label>Confirm password</label> 
                        <input type="password" autofocus autocomplete="off" class="form-control <?php if(form_error('cpassword')):?>has-error<?php endif;?>" name="cpassword" id="cpassword" value="<?php echo set_value('cpassword');?>"/>
                        <?php if(form_error('cpassword')):?>
                            <div class="error_info">
                                <?php echo form_error('cpassword');?>
                            </div> 
                        <?php endif;?>
                    </div>
                    <div class="clearfix"></div> 

                </div>    
                
                <div class="line line-dashed b-b  pull-in"></div>

                <div class="form-group">
                    <div class="col-sm-4">  
                        <button type="submit" class="btn btn-primary">Save & Feature this user</button>
                    </div>
                </div>
 
            </form>
            
        </div>
        
    </section>
    
</section>