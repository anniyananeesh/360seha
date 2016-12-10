<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><?php echo $title;?></h3>
    </div>

    <?php if(isset($message)):?>
    
        <div class="alert alert-success">
 
            <i class="fa fa-ok-sign"></i>
            <?php echo $message;?>
        </div>
    
    <?php endif;?>
    
    <section class="panel panel-default">
        
        <header class="panel-heading" style="font-size: 15px;">
          <?php echo $title;?>
        </header>

        <div class="panel-body">

          <form class="form-horizontal" method="post">
              
 

            <div class="form-group">

              <label class="col-sm-12 control-label"><strong>Name</strong></label>
              <div class="clearfix"></div>
              <div class="col-sm-4">
 
                  <input type="text" autofocus autocomplete="off" class="form-control" name="name" id="name" value="<?php echo $record->full_name?>"/>
                  <?php if(form_error('name')):?>
                    <div class="error_info">

                        <?php echo form_error('name');?> ...
                    </div> 
                  <?php endif;?>
              </div> 

            </div>

            <div class="line line-dashed b-b line-lg pull-in"></div> 

            <div class="form-group">
                <label class="col-sm-12 control-label"><strong>Email</strong></label>
                <div class="clearfix"></div>
              <div class="col-sm-4">
 
                  <input type="text" autofocus autocomplete="off" class="form-control" name="email" id="email" value="<?php echo $record->email?>"/>
                  <?php if(form_error('email')):?>
                    <div class="error_info">

                        <?php echo form_error('email');?> ...
                    </div> 
                  <?php endif;?>
              </div> 

            </div>  

            <div class="line line-dashed b-b line-lg pull-in"></div> 

            <div class="form-group">
                <label class="col-sm-12 control-label"><strong>Phone</strong></label>
                <div class="clearfix"></div>
              <div class="col-sm-4">
 
                  <input type="text" autofocus autocomplete="off" class="form-control" name="phone" id="phone" value="<?php echo $record->phone?>"/>
                  <?php if(form_error('phone')):?>
                    <div class="error_info">

                        <?php echo form_error('phone');?> ...
                    </div> 
                  <?php endif;?>
              </div> 

            </div>

            <div class="line line-dashed b-b line-lg pull-in"></div> 

            <div class="form-group">
                <label class="col-sm-12 control-label"><strong>Location</strong></label>
                <div class="clearfix"></div>
              <div class="col-sm-4">
 
                  <input type="text" autofocus autocomplete="off" class="form-control" readonly name="location" id="location" value="<?php echo $record->location?>"/>
                  <?php if(form_error('location')):?>
                    <div class="error_info">

                        <?php echo form_error('location');?> ...
                    </div> 
                  <?php endif;?>
              </div> 

            </div>

            <div class="line line-dashed b-b line-lg pull-in m-t-lg"></div>

            <div class="form-group">
              <div class="col-sm-4">
                <button type="submit" class="btn btn-success btn-lg btn-rounded font-thin">Save</button>
              </div>
            </div>

          </form>

        </div>

      </section>
    
</section> 