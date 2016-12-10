<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
                  <a href="<?php echo $ctrlUrl?>add" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">Add Record</a>
                  
              </div> 
    <form method="post" name="search">
        <div class="row" style="margin-top: 15px; margin-bottom: 15px;"> 

            <div class="col-sm-3" style="width: 440px;">
                <select style="width: 430px" class="chosen-select pull-left m-l-md" name="subscriber" id="subscriber"/>

                    <option value="">Choose Subscriber</option>

                    <?php foreach($subscribers as $user):?>

                        <?php $_id = $this->encrypt->encode($user->user_id);?>
                        <option value="<?php echo $_id;?>" <?php echo set_select('user', $_id)?>><?php echo $user->subs_title;?></option>
                    <?php endforeach;?>

                </select>
 
            </div>
            
            <div class="col-sm-3">
                <button class="btn btn-sm btn-primary" type="submit">Search Pins!</button>
            </div>
            
        </div>
    </form>

    <span class="clearfix"></span> 
    
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
 
                <th width="200">Thumb</th>
                <th>Subscriber</th>
                <th>Title En</th>
                <th>Voucher Code</th>
                <th>Send</th>
                <th>Status</th>
                <th>Added On</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php if($wall_items):?>

                <?php foreach ($wall_items as $wi):?>

                    <tr> 
                      
                      <td>
                          <?php $_id = $this->encrypt->encode($wi->wall_id);?>
                          <img src="<?php echo base_url()?>uploads/subscribers/wall/<?php echo $wi->thumb_url?>" width="150" class="b b-gray img-responsive"/>
                      </td>
                      <td><?php echo $wi->subs_title;?></td>
                      <td><?php echo character_limiter($wi->title_en, 50, '...')?></td>
                      <td><?php echo $wi->voucher_code?></td>

                      <td>
 
                        <a href="<?php echo $ctrlUrl?>send/<?php echo $_id?>">
                          <i class="glyphicon glyphicon-ok-sign text-success"></i>
                        </a> 

                      </td>

                      <td>
                          <?php if($wi->status == 0):?>
                            <a href="<?php echo $ctrlUrl?>status/<?php echo $_id?>/1">
                              <i class="glyphicon glyphicon-minus-sign text-danger"></i>
                            </a>
                          <?php else:?>
                            <a href="<?php echo $ctrlUrl?>status/<?php echo $_id?>/0">
                              <i class="glyphicon glyphicon-ok-sign text-success"></i>
                            </a>
                          <?php endif;?>                                  
                      </td>
                      <td><?php echo date('d F Y', strtotime($wi->created_on))?></td>
                      <td>
 
                        <a class="btn btn-default btn-xs" href="<?php echo $ctrlUrl?>edit/<?php echo $_id?>">Edit</a>&nbsp;
                        <a class="btn btn-danger btn-xs delete_entry" href="<?php echo $ctrlUrl?>delete/<?php echo $_id?>">Delete</a>

                      </td>

                    </tr>

                <?php endforeach;?>

              <?php else:?>
                    
                <tr>
                    <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center;" colspan="7">
                       No records has been found!
                    </td>
                </tr> 
                
              <?php endif;?>

            </tbody>

          </table>

        </div> 
        
  </section>
    
</section>