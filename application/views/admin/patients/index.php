<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
 
              </div>

<span class="clearfix"></span>
 <form method="post" name="search">
        <div class="row" style="margin-top: 15px; margin-bottom: 15px;"> 

            <div class="col-sm-3" style="width: 250px;">
                <label>Reward Points</label>
                <input type="text" class="form-control" name="reward_pts" id="reward_pts" value="<?php echo set_value('reward_pts')?>" />
            </div>
            
            <div class="col-sm-3">
                <label>&nbsp;</label>
                <span class="clearfix"></span>
                <button class="btn btn-sm btn-primary" type="submit">Search</button>
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
 
    <section class="panel panel-default" style="margin-top: 10px;">
 
        <div class="table-responsive">
            
          <table class="table table-striped b-t b-light">
            <thead>
              <tr> 
 
                <th width="200">Name</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Location</th>
                <th>Reward Points</th>
                <th>Status</th>
                <th>Added On</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

              <?php if($records):?>

                <?php foreach ($records as $patient):?>

                    <tr> 
                      
                      <td>
                          <?php $_id = $this->encrypt->encode($patient->id);?>
                          <?php echo $patient->full_name;?>
                      </td>
                      <td><?php echo $patient->email;?></td>
                      <td><?php echo $patient->phone;?></td>
                      <td><?php echo $patient->location;?></td>
                      <td><?php echo $patient->reward_points;?></td>
                      <td>
                          <?php if($patient->status == 0):?>
                            <a href="<?php echo $ctrlUrl?>status/<?php echo $_id?>/1">
                              <i class="glyphicon glyphicon-minus-sign text-danger"></i>
                            </a>
                          <?php else:?>
                            <a href="<?php echo $ctrlUrl?>status/<?php echo $_id?>/0">
                              <i class="glyphicon glyphicon-ok-sign text-success"></i>
                            </a>
                          <?php endif;?>                                  
                      </td>
                      <td><?php echo date('d F Y', strtotime($patient->created_on))?></td>
                      <td>
                        <a class="btn btn-default btn-xs" href="<?php echo $ctrlUrl?>edit/<?php echo $_id?>">Edit</a>&nbsp;
                        <a class="btn btn-danger btn-xs delete_entry" href="<?php echo $ctrlUrl?>delete/<?php echo $_id?>">Delete</a>
                      </td>

                    </tr>

                <?php endforeach;?>

              <?php else:?>
                    
                <tr>
                    <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center;" colspan="8">
                        No records has been found!
                    </td>
                </tr> 
                
              <?php endif;?>

            </tbody>

          </table>

        </div> 
        
  </section>
    
</section>