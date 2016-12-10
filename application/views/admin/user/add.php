<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none"><?php echo $title;?></h3>
        <button class="btn btn-default btn-rounded" style="float: right; margin-top: -30px;" onclick="javascript: window.location.href='<?php echo base_url()?>admin/currency'"><i class="i i-list2"></i> Currency Listings</button>
    </div>
    
    <section class="panel panel-default">
        
        <header class="panel-heading" style="font-size: 15px;">
          <?php echo $sub_title;?>
        </header>
        
                <div class="panel-body">
                    
                  <form class="form-horizontal" method="post"> 

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>First Name</strong></label>
 
                      <div class="col-sm-3">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="first_name" id="first_name" value="<?php echo set_value('first_name');?>"/>
                          
                          <?php if(form_error('first_name')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('first_name');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Last Name</strong></label>
 
                      <div class="col-sm-3">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="last_name" id="last_name" value="<?php echo set_value('last_name');?>"/>
                          
                          <?php if(form_error('last_name')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('last_name');?> ...
                            </div> 
                          <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Email ID</strong></label>
 
                      <div class="col-sm-4">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="email" id="email" value="<?php echo set_value('email');?>"/>
                          
                          <?php if(form_error('email')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('email');?> ...
                            </div> 
                          <?php else:?>
                          
                          <div class="help-block">
                              Email format : john.doe@gmail.com
                          </div>
                           <?php endif;?>
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>Account Setup</strong></label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-md-6">
                            <label>Username Chosen</label>
                            <input type="text" autocomplete="off" class="form-control" placeholder="(XXX) XXXX XXX"  name="user_name" value="<?php echo set_value('user_name');?>"/>
                            <?php if(form_error('user_name')):?>
                                <div class="error_info">

                                  <?php echo form_error('user_name');?> ...
                                </div> 
                            <?php endif;?>
                          </div> 
                        </div> 
                          
                        <div class="row m-t-lg">

                          <div class="col-md-3">
                            <label>Password</label>
                            <input type="password" autocomplete="off" class="form-control" placeholder="*************" name="pwd" value="<?php echo set_value('pwd');?>"/>
                            <?php if(form_error('pwd')):?>
                                <div class="error_info">

                                  <?php echo form_error('pwd');?> ...
                                </div> 
                            <?php endif;?>
                          </div>

                          <div class="col-md-3">
                            <label>Confirm Password</label>
                            <input type="password" autocomplete="off" class="form-control" placeholder="*************" name="cfrm_pwd" value="<?php echo set_value('cfrm_pwd');?>"/>
                            <?php if(form_error('cfrm_pwd')):?>
                                <div class="error_info">

                                  <?php echo form_error('cfrm_pwd');?> ...
                                </div> 
                            <?php endif;?>
                          </div>

                        </div> 
                           
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label" for="input-id-1"><strong>User Group</strong></label>
                      <div class="col-sm-10">
                        <div class="row">
                          <div class="col-md-3">
 
                                <select style="width:360px" class="chosen-select" name="grp"/>
                                    <option value="">User Group</option>
                                    <?php foreach ($groups as $grp):?>
                                        <option value="<?php echo $grp->grp_id?>"><?php echo $grp->grp_title?></option>
                                    <?php endforeach;?>
                                </select>
                              
                                <?php if(form_error('grp')):?>
                                    <div class="error_info">

                                       <?php echo form_error('grp');?> ...
                                    </div> 
                                <?php endif;?>
                              
                          </div> 
                            
                        </div> 
                          
                      </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Notify user ?</strong></label>
                      <div class="col-sm-4">
                           <label class="checkbox m-l m-t-none m-b-none i-checks text-success">
                               <input type="checkbox" name="notify"><i></i>
                               User will receive an email containing the login credentials...
                            </label>
                      
                     </div>
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default btn-rounded" onclick="javascript: location.href='<?php echo base_url().ADMIN_URL?>user/'">Cancel</button>
                        <button type="submit" class="btn btn-success btn-rounded m-l-sm">Save changes</button>
                      </div>
                    </div>
                    
                  </form>
                </div>
              </section>
    
</section>