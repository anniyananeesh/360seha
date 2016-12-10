<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none"><?php echo $title;?></h3>
    </div>

    <section class="panel panel-default">

                <div class="panel-body">

                  <?php if(isset($error) && $error):?>

                      <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <?php echo $message;?>
                      </div>

                  <?php endif;?>

                    <form class="form-horizontal" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label class="col-sm-2 control-label"><strong>Category Title <span class="required-txt">*</span></strong></label>
                      <div class="clearfix"></div>
                      <div class="col-sm-2">
                          <label>English <span class="required-txt">*</span></label>
                          <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('c_title')):?>has-error<?php endif;?>" name="c_title" id="c_title" value="<?php echo set_value('c_title');?>"/>

                          <?php if(form_error('c_title')):?>
                            <div class="error_info">

                                <?php echo form_error('c_title');?> ...
                            </div>
                          <?php else:?>

                            <span class="help-block m-b-none text-muted">Eg:- Medical insurance, Hospitals...</span>
                          <?php endif;?>
                      </div>
                      <div class="clearfix"></div>
                      <div class="col-sm-2 p-t-sm">
                          <label>Arabic <span class="required-txt">*</span></label>
                          <input type="text" autofocus autocomplete="off" class="form-control <?php if(form_error('c_title_ar')):?>has-error<?php endif;?>" name="c_title_ar" id="c_title" value="<?php echo set_value('c_title_ar');?>"/>

                          <?php if(form_error('c_title_ar')):?>
                            <div class="error_info">

                                <?php echo form_error('c_title_ar');?> ...
                            </div>
                          <?php endif;?>
                      </div>
                    </div>  

                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">

                      <div class="col-sm-4">
                        <button type="button" class="btn btn-default" onclick="javascript: location.href='<?php echo $ctrlUrl?>'">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>

                    </div>

                  </form>

                </div>

            </section>

</section>
