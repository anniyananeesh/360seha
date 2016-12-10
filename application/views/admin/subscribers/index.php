<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><i class="fa fa-users"></i> <?php echo $title;?></h3>
                  <a href="<?php echo base_url().ADMIN_URL?>subscribers/create" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">Create Subscriber</a>
                  
              </div> 
    
    <span class="clearfix"></span>
    
    <form method="post" name="search_hotels">
        <div class="row" style="margin-top: 15px; margin-bottom: 15px;"> 

            <div class="col-sm-8">
                <input type="text" class="input-sm form-control pull-left m-r-sm" style="width: 340px;" autocomplete="off" autofocus name="subs_title" placeholder="Search subscribers...">
                <div class="pull-left m-r-sm">
                  <select class="chosen-select" name="subs_type" id="subs_type"/>

                    <option value="">All </option>

                    <?php foreach($categories AS $data):?>
                    <option value="<?php echo $data->id_category?>" <?php echo (isset($_POST["subs_type"]) && $_POST['subs_type'] == $data->id_category) ? 'selected' : '';?>><?php echo $data->name_en?></option>
                    <?php endforeach;?>
                  </select>
                </div>
                <button class="btn btn-sm btn-default" type="submit">Go!</button>
            </div> 
            
        </div>
    </form>
    
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
    
    <form method="post" name="grp_action" action="<?php echo base_url()?>admin/subscribers/grp_action/">
    <section class="panel panel-default" style="margin-top: 10px;">
            
                <div class="row wrapper bg-light bg-gradient">
                    
                    <div class="col-sm-5 m-b-xs">
 
                        <select class="input-sm form-control input-s-lg inline v-middle" name="action">
                            <option value="approve">Publish Subscribers</option>
                            <option value="disapprove">Unpublish Subscribers</option>
                            <option value="enable">Enable Subscribers</option>
                            <option value="disable">Disable Subscribers</option>
                            <option value="delete">Delete Subscribers</option>
                            <!-- <option value="featured">Mark as Featured</option>
                            <option value="unfeatured">Mark as Unfeatured</option>-->
                            <!-- <option value="normal">Make Normal</option>
                            <option value="private">Make Private</option>
                            <option value="public">Make Public</option>

                            <option value="show_map">Show On Map</option>
                            <option value="hide_map">Hide from Map</option>-->
                            
                        </select>
                        <button type="submit" class="btn btn-sm btn-default" id="grp_submit">Apply</button>                
                    </div>
                    
                    <script type="text/javascript">
                        
                        $(function(){
                            
                            $('.LnkAccntTag').on('change', function(){
                                var user = $(this).parent().find('.subscriberUrl').val(),
                                    data = $(this).val();
                                
                                $.get('<?php echo base_url()?>async/update_account_link', { user: user, val: data}, function(res){
                                    
                                    if(!res.error)
                                    {
                                          jAlert(res.message, 'Forward Account Link');
                                    }else{
                                        jAlert('Something went wrong :(', 'Forward Account Link');
                                    }
                                    
                                }, 'json');
                            });
                            
                            $('.SwitchbxType').on('change', function(){
                                var checked = $(this).val(),
                                    user = $(this).parent().find('.usrBxHdn').val();
                                $.get('<?php echo base_url()?>async/change_account_type', { user: user, status: checked}, function(res){
                                    if(!res.error)
                                    {
                                        jAlert(res.message, 'Change Account Type');
                                        elem.html(res.status);
                                    }else{
                                        jAlert('Something went wrong :(' , 'Change Account Type');
                                    }
                                }, 'json');
                            });
                            
                        });
                        
                    </script>

                </div>
        
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th width="20">
                            <label class="checkbox m-l m-t-none m-b-none i-checks">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Title</th>
                        <th>Email</th>
                        <th>Primary Contact</th>
                        <th>Location</th>
                        <th>Published</th>
                        <th>Account Type</th>
                        <th>Added On</th>
                        <th width="220">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php if($records):?>
                        
                        <?php foreach ($records as $subs):?>
                        
                            <tr>
                                <td<?php if($subs->is_featured == 1 && $subs->show_featured_home == 1):?> style="border-left: solid 2px red;"<?php endif;?>>
                                  
                                  <?php $_id = $this->encrypt->encode($subs->user_id);?>
                                  <label class="checkbox m-l m-t-none m-b-none i-checks">
                                      <input type="checkbox" name="cb[]" value="<?php echo $_id?>"><i></i>
                                  </label>
                              </td>
                              <td>
                                  
                                  <p class="h5 font-bold"><?php echo $subs->subs_title?></p>
 
                                    <div class="h6 m-t-md m-b-md">
                                        <input type="hidden" value="<?php echo $_id?>" class="subscriberUrl"/>
                                        <?php $contact = $this->subscriber_service->get_subscriber_page($subs->user_id, TBL_CONTACT_US_PAGE);?>
                                         <span class="clearfix"></span> 
                                    </div>
                                    
                              </td>
                              <td><?php echo $subs->subs_email?></td> 
                              <td><?php echo $subs->subs_primary_contact?></td> 
                              <td><?php echo $subs->name?></td> 
                              <td>
                                  
                                  <?php if($subs->published == 0):?>
                                        <a href="<?php echo base_url().ADMIN_URL?>subscribers/publish/<?php echo $_id?>/1" title="Publish user"><i class="glyphicon glyphicon-minus-sign text-danger"></i></a>
                                  <?php else:?>
                                        <a href="<?php echo base_url().ADMIN_URL?>subscribers/publish/<?php echo $_id?>/0" title="Unpublish user"><i class="glyphicon glyphicon-ok-sign text-success"></i></a>
                                  <?php endif;?>
                                  
                              </td>  

                              <td>

                                <select name="account_type" id="account_type" class="account_type">
                                  <option value="1" <?php echo ($subs->account_type == 1) ? 'selected' : '';?>>Featured</option>
                                  <option value="2" <?php echo ($subs->account_type == 2) ? 'selected' : '';?>>Normal Listing</option>
                                  <option value="3" <?php echo ($subs->account_type == 3) ? 'selected' : '';?>>Basic Lisiting</option>
                                </select>

                                <input type="hidden" class="account_type_id" value="<?php echo $_id?>" />

                              </td>

                              <td><?php echo date('d F Y', strtotime($subs->subs_created))?></td>
                              
                              <td> 
                        
                                &nbsp;
                                  
                                  <a class="btn btn-success btn-xs" href="<?php echo base_url().ADMIN_URL?>subscribers/edit/<?php echo $_id?>" title="Edit Profile"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp;

                                  <a class="btn btn-success btn-xs" href="<?php echo base_url().ADMIN_URL?>subscribers/profile/<?php echo $_id?>" title="View Subscriber Profile"><i class="glyphicon glyphicon-user"></i></a>&nbsp;
                                  
                                  <?php if($subs->is_featured == 1):?>
                                    <a class="btn btn-success btn-xs set_featured btn-warning" href="<?php echo base_url().ADMIN_URL?>subscribers/unfeatured/<?php echo $_id?>" title="Set this subscriber as Unfeatured"><i class="fa fa-star"></i></a>&nbsp;
                                  <?php else:?>
                                    <a class="btn btn-success btn-xs set_featured" href="<?php echo base_url().ADMIN_URL?>subscribers/featured/<?php echo $_id?>" title="Set this subscriber as Featured"><i class="fa fa-star"></i></a>&nbsp;
                                  <?php endif;?> 
                                  
                              </td>
                              
                            </tr>
                      
                        <?php endforeach;?>
                      
                      <?php else:?>
                      <tr>

                          <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center;" colspan="7">
                              
                              
                          </td>
                      </tr> 
                      <?php endif;?>
                      
                    </tbody>
                    
                  </table>
                    
                </div> 
        
                <?php //echo $this->pagination->create_links(); ?>

                <script type="text/javascript">
                  
                  $(function(){

                      $(document).on('change', '.account_type', function(e){

                          e.preventDefault();

                          var type = $(this).val(), id = $(this).parent().find('.account_type_id').val();

                          $.get('<?php echo HOST_URL?>/admin/async/save_account_type/' + id + '/' + type, function(res){

                              if(res.code == 200)
                              {
                                 location.reload();
                              }
                              else
                              {
                                 alert('Cannot write the changes to database. Please redo action');
                              }

                          }, 'json');


                      });

                  })

                </script>
        
              </section>
        
        </form>
    
    </section>