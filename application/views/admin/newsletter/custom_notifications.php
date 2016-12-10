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

              <label class="col-sm-2 control-label"><strong>Devices Now Registered: </strong></label>
              <div class="col-sm-4">
                  <h1 style="margin: 0;"><?php echo count($devices);?></h1>
              </div>
            </div>

            <div class="line line-dashed b-b line-lg pull-in"></div>

            <div class="form-group">

              <label class="col-sm-2 control-label"><strong>Title</strong></label>
              <div class="col-sm-4">

                  <input type="text" autofocus autocomplete="off" class="form-control" name="title" id="title" value=""/>
                  <?php if(form_error('title')):?>
                    <div class="error_info">

                        <?php echo form_error('title');?> ...
                    </div> 
                  <?php endif;?>
              </div>
            </div>

            <div class="line line-dashed b-b line-lg pull-in"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label"><strong>Message</strong></label>
              <div class="col-sm-4">

                  <input type="text" autofocus autocomplete="off" class="form-control" name="message" id="message" value=""/>
                  <?php if(form_error('message')):?>
                    <div class="error_info">

                        <?php echo form_error('message');?> ...
                    </div> 
                  <?php endif;?>
              </div>
            </div> 

            <div class="line line-dashed b-b line-lg pull-in m-t-lg"></div>

            <div class="form-group">
              <div class="col-sm-4 col-sm-offset-2">
                <button type="submit" class="btn btn-success btn-lg btn-rounded font-thin">Send notification</button>
              </div>
            </div>

          </form>

        </div>

      </section>
    
</section> 