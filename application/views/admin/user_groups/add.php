<script type="text/javascript">
	
	$(function(){
		 
		
		//Create an selected element array
		var selArray = new Array();

                $(document).on('click', '.priv-button', function(){
			
			var privId = $(this).attr("data-priv"); 
 
			if($(this).hasClass('btn-success')){
				
				$(this).removeClass('btn-success');
                                $(this).addClass('btn-default');
				
				selArray = selArray.remove(privId);
				
			}else{
				
				$(this).addClass('btn-success');
                                $(this).removeClass('btn-default');
				
				selArray.push(privId);
			 
			}
			
			$("#privs").val(selArray);  

                        return false;
			
		}); 
		 
	});
	
	//Removing array items by value
	Array.prototype.remove= function(){

            var what, a= arguments, L= a.length, ax;
            while(L && this.length){

                what= a[--L];
                while((ax= this.indexOf(what))!= -1){
                    this.splice(ax, 1);
                }

             }
             return this;
             
        }
		
	
</script> 
<section class="scrollable padder">
    <div class="m-b-md">
        <h3 class="m-b-none font-thin"><?php echo $title;?></h3>
        <button class="btn btn-default btn-rounded" style="float: right; margin-top: -30px;" onclick="javascript: window.location.href='<?php echo base_url()?>admin/user_group'"><i class="i i-list2"></i> User Groups</button>
    </div>
    
    <section class="panel panel-default">
        
        <header class="panel-heading" style="font-size: 15px;">
          <?php echo $sub_title;?>
        </header>
        
                <div class="panel-body">
                    
                  <form class="form-horizontal" method="post">
                      
                    <input type="hidden" name="privs" id="privs" value=""/>

                    <div class="form-group">
                        <label class="col-sm-2 control-label"><strong>Group Title</strong></label>
 
                      <div class="col-sm-4">
                          <input type="text" autofocus autocomplete="off" class="form-control" name="grp_title" id="grp_title" value="<?php echo set_value('grp_title');?>"/>
                          
                          <?php if(form_error('grp_title')):?>
                            <div class="error_info">
                                                                
                                <?php echo form_error('grp_title');?> ...
                            </div>
                          <?php else:?>
                          
                            <span class="help-block m-b-none text-muted">Eg:- Administrator, Normal User,...</span>
                          <?php endif;?>
                      </div>
                    </div>
                      
                    <div class="line line-dashed b-b line-lg pull-in"></div> 
                    
                    <div class="form-group">
                        
                        <label class="col-sm-2 control-label"><strong>User Role</strong></label>
                        
                        <div class="col-sm-4">
                            
                            <select style="width:260px" class="chosen-select" name="user_role" id="user_role"/>
                                    
                                    <option value="">Choose User Role</option>
                                    <option value="<?php echo ROLE_SEHA_SUPER_ADMINS;?>" <?php echo set_select('user_role', ROLE_SEHA_SUPER_ADMINS)?>>Super Admin</option>
                                    <option value="<?php echo ROLE_SEHA_ADMINS;?>" <?php echo set_select('user_role', ROLE_SEHA_ADMINS)?>>Administrators</option>
                                    <option value="<?php echo ROLE_SEHA_USER;?>" <?php echo set_select('user_role', ROLE_SEHA_USER)?>>Restricted User Privileges</option>
                                    
                            </select>
                            
                            <?php if(form_error('user_role')):?>
                                <div class="error_info">

                                    <?php echo form_error('user_role');?> ...
                                </div> 
                            <?php endif;?>
                            
                        </div>
                        
                    </div>
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    <div class="row wrapper padder">
                        
                        <label class="col-sm-2 control-label"><strong>Choose Subscribers to be included</strong></label>
                        <div class="col-sm-8">
                            
                            <div class="panel panel-default">
 
                                <div>
 
                                    <table class="table table-striped b-t b-light">
 
                                        <thead>
                                            
                                            <tr>
 
                                              <th width="220">Module</th>
                                              <th>Action</th>
                                              
                                            </tr>
                                            
                                        </thead>
                                        
                                        <?php foreach($modules as $m):?>
                                            
                                            <tr>
                                                
                                              <td><?php echo ucfirst($m['title'])?></td>
                                              
                                              <td>
                                                  
                                                  <?php if(is_array($m['actions'])):?>
                                                    
                                                    <?php foreach ($m['actions'] as $act):?>
                                                        <a href="" class="btn btn-default btn-xs pull-left m-r-xs priv-button" data-priv = "<?php echo $m['controller'].'_'.$act;?>"><?php echo ucfirst($act);?></a>
                                                    <?php endforeach;?>
                                                  
                                                  <?php endif;?>
                                                  
                                              </td>
                                              
                                            </tr>
                                        
                                        <?php endforeach;?>
 
                                    </table>
                                    
                                    <div class="clearfix"></div>
                                     
                                </div>

                            </div>
                            
                            <?php if(form_error('privs')):?>
                                <div class="error_info">

                                    <?php echo form_error('privs');?> ...
                                </div> 
                            <?php endif;?>
                            
                        </div>
                          
                    </div>
                    
                    
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                    
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                        <button type="button" class="btn btn-default btn-rounded" onclick="javascript: location.href='<?php echo base_url()?>admin/user_group/'">Cancel</button>
                        <button type="submit" class="btn btn-success btn-rounded m-l-sm">Save changes</button>
                      </div>
                    </div>
                    
                  </form>
                </div>
              </section>
    
</section>