<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <?php $list_id = $this->encrypt->encode($list_id);?>
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><i class="fa fa-folder-open-o"></i> <strong><?php echo $clist->list_title?></strong> <?php echo $title;?> </h3>
                  <a href="<?php echo base_url()?>admin/contactlist/add_contact/<?php echo $list_id?>" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">Add Contact</a>
                  
                  <div class="clearfix"></div>
                  <p class="h5 font-thin pull-left m-t-sm"><?php echo $sub_title?> <strong><?php echo $clist->list_title?></strong> contact list</p>
                  
              </div> 
    
    <span class="clearfix"></span>
    
    <form method="post" name="search_hotels">
        <div class="row" style="margin-top: 15px; margin-bottom: 15px;"> 

            <div class="col-sm-4">
                <input type="text" class="input-sm form-control" autocomplete="off" autofocus name="list_title" placeholder="Search email. eg: john.doe@example.com..">
            </div>
            
            <div class="col-sm-3">
                <button class="btn btn-sm btn-default" type="submit">Go!</button>
            </div>
            
        </div>
    </form>
    
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
 
    <section class="panel panel-default" style="margin-top: 10px;">
 
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
 
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Added On</th>
                        <th width="240">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php if($records):?>
                        
                        <?php foreach ($records as $cList):?>
                        
                            <tr <?php if($cList->er_description != NULL):?> class="text-danger" title="<?php echo $cList->er_description?>"<?php endif;?>>
 
                              <td><?php echo $cList->first_name?></td>
                              <td><?php echo $cList->last_name?></td> 
                              
                              <td><?php echo $cList->email;?></td> 
                              <td><?php echo date('d F Y', strtotime($cList->created_on))?></td>
                              <td>
 
                                <?php $_id = $this->encrypt->encode($cList->id);?>

                                <a class="btn btn-default btn-xs" href="<?php echo base_url()?>admin/contactlist/edit_contact/<?php echo $list_id?>/<?php echo $_id?>">Edit</a>&nbsp;
                                <a class="btn btn-danger btn-xs delete_entry" href="<?php echo base_url()?>admin/contactlist/delete_contact/<?php echo $list_id?>/<?php echo $_id?>">Delete</a>
                                
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
        
              </section>
            </section>