<section class="scrollable padder">
    
    <div class="m-b-md">
        <h3 class="m-b-none">Upload Featured Image</h3>
    </div>
    
    <section class="panel panel-default">
 
                <div class="panel-body">
 
                  <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
                      
                    <div class="form-group text-center">
 
                          <br/><br/>
                          <?php if($userfile):?>
                            <img src="<?php echo $userfile?>"/>
                          <?php endif;?>
                          <br/>
                          <input type="file" class="filestyle m-t-lg" name="userfile" id="userfile" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                          <div class="help-block text-muted">
                                Upload the subscriber profile / logo Image file | Res. 87 X 119 Pixels | Max File Size - <?php echo $config['max_size']['value'];?>  KB              
                          </div> 
                          <?php if(isset($error)):?>
                                <div class="error_info">
                                  <?php echo $error;?> ...
                                </div> 
                            <?php endif;?>
                          
                    </div> 
                      
                    <div class="line line-dashed b-b  pull-in"></div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label"><strong>Show on home page?</strong></label>
                        <div class="col-sm-4">

                            <div class="col-sm-12">

                              <label class="switch left">
                                  <input type="checkbox" value="1" name="show_featured_home"/>
                                  <span></span>
                              </label> 

                            </div>

                        </div>

                    </div> 

                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                        
                      <div class="col-sm-4 col-sm-offset-2">
                          
                        <button type="button" class="btn btn-default" onclick="javascript: location.href='<?php echo base_url().ADMIN_URL?>subscribers/'">Cancel</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                      </div>
                        
                    </div>
                    
                  </form>
                    
                </div>
        
    </section>
    
</section>