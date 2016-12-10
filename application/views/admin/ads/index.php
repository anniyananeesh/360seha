<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
                  <a href="<?php echo $ctrlUrl?>create" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">Add Record</a>
                  
              </div> 
    
    <span class="clearfix"></span>
    
    <form method="post" name="search_hotels">
        <div class="row" style="margin-top: 15px; margin-bottom: 15px;"> 

            <div class="col-sm-4">
                <input type="text" class="input-sm form-control" autocomplete="off" autofocus name="title" placeholder="Search Ads: Nike Ads, Aster Pharmacy...">
            </div>
            
            <div class="col-sm-3">
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
 
    <section class="panel panel-default" style="margin-top: 10px;">
 
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
 
                        <th>Title</th>
                        <th>Ad Location</th> 
                        <th>Show Status</th>
                        <th>Added On</th>
                        <th width="240">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php if($records):?>
                        
                        <?php foreach ($records as $ad):?>
                        
                            <tr>
 
                              <td>
                                <?php $_id = $this->encrypt->encode($ad->id);?>
                                <?php echo $ad->title?>
                              </td>
                              <td>
                                  <?php if($ad->ad_area == 1):?>
                                    Home Page Top 728 * 90
                                  <?php elseif($ad->ad_area == 2):?>
                                    Sub Page Left 300 * 250
                                  <?php elseif($ad->ad_area == 4):?>
                                    Map Banner
                                  <?php else:?>
                                    Mobile Ad
                                  <?php endif;?>
                                  
                              </td>  
                              <td>
                                  <?php if($ad->show_status == 1):?>                                  
                                      <i class="glyphicon glyphicon-minus-sign text-danger"></i>
                                  <?php else:?>
                                    
                                    <i class="glyphicon glyphicon-ok-sign text-success"></i>
                                  <?php endif;?>   
                              </td> 
                              <td><?php echo date('d F Y', strtotime($ad->created_on))?></td>
                              <td>
                              
                                <a class="btn btn-default btn-xs" href="<?php echo $ctrlUrl?>edit/<?php echo $_id?>">Edit</a>&nbsp;
                                <a class="btn btn-danger btn-xs delete_entry" href="<?php echo $ctrlUrl?>delete/<?php echo $_id?>">Delete</a>
                                
                              </td>
                              
                            </tr>
                      
                        <?php endforeach;?>
                      
                      <?php else:?>
                      <tr>

                          <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center;" colspan="5">
                              
                              No records has been found!
                               
                          </td>
                      </tr> 
                      <?php endif;?>
                      
                    </tbody>
                    
                  </table>
                    
                </div> 
        
              </section>
            </section>