<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
 
              </div> 
    
    <span class="clearfix"></span>
    
    <form method="post" name="search">
        <div class="row" style="margin-top: 15px; margin-bottom: 15px;"> 

            <div class="col-sm-3" style="width: 440px;">
                <select style="width: 430px" class="chosen-select pull-left m-l-md" name="user" id="user"/>

                    <option value="">Choose Subscriber</option>

                    <?php foreach($users as $user):?>

                        <?php $_id = $this->encrypt->encode($user->user_id);?>
                        <option value="<?php echo $_id;?>" <?php echo set_select('user', $_id)?>><?php echo $user->subs_title;?></option>
                    <?php endforeach;?>

                </select>
 
            </div>
            
            <div class="col-sm-3">
                <button class="btn btn-sm btn-primary" type="submit">Search Followers!</button>
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
  <?php if($records):?>

    <a href="<?php echo $ctrlUrl?>export/<?php echo $userId;?>" class="btn btn-default btn-lg">Export Excel</a>
    <section class="panel panel-default" style="margin-top: 10px;">
 
                <div class="table-responsive">
                  <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
 
                        <th>Email Address</th>
                        <th>Added On</th> 
                      </tr>
                    </thead>
                    <tbody>
                      
                      
                        
                        <?php foreach ($records as $follow):?>
                        
                            <tr>
                             
                              <td>
                                  <?php echo $follow->follower_email?>
                              </td> 
                               
                              <td>
                                <?php echo date('d F Y', strtotime($follow->created_on))?>
                              </td> 
                              
                            </tr>
                      
                        <?php endforeach;?>
                      
                      <?php else:?>
                      <tr>

                          <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center; color:red; font-weight: bold;" colspan="2"> No records has been found !</td>
                      </tr> 
                      
                      
                    </tbody>
                    
                  </table>
                    
                </div>
                
              </section>
              <?php endif;?>
            </section>