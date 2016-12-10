<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
                  <a href="<?php echo $ctrlUrl?>add" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">Add Record</a>
                  
              </div> 
    
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
                
        <form action="<?php echo $ctrlUrl?>save_order" method="post">
            
            <div class="table-responsive">
              <table class="table table-striped b-t b-light">
                <thead>
                  <tr>
                    <th>Sponsor name</th>
                    <th>Website URL</th>
                    <th>Country</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Added On</th>
                    <th width="240">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php if($records):?>

                    <?php foreach ($records as $sponsor):?>

                        <tr>

                          <td><?php $_id = $this->encrypt->encode($sponsor->sponsor_id);?>
                              <?php echo $sponsor->title_en?></td>
                          <td><?php echo $sponsor->sponsor_url?></td> 

                          <td><?php $country = $this->modelCountryAlias->fetchById($sponsor->country_fk); echo ($country) ? $country->name_en: '';?></td>
                          <td>
                              <img src="<?php echo base_url()?>uploads/sponsors/<?php echo $sponsor->thumb_url?>"/>
                          </td>
                          <td>
                              <?php if($sponsor->status == 0):?>
                                <a href="<?php echo $ctrlUrl?>status/<?php echo $_id?>/1">
                                  <i class="glyphicon glyphicon-ok-sign text-success"></i>
                                </a>
                              <?php else:?>
                                <a href="<?php echo $ctrlUrl?>status/<?php echo $_id?>/0">
                                  <i class="glyphicon glyphicon-minus-sign text-danger"></i>
                                </a>
                              <?php endif;?>                                  
                          </td>
                          <td><?php echo date('d F Y', strtotime($sponsor->created_on))?></td>
                          <td>

                            <a class="btn btn-default btn-xs" href="<?php echo $ctrlUrl?>edit/<?php echo $_id?>">Edit</a>&nbsp;
                            <a class="btn btn-danger btn-xs delete_entry" href="<?php echo $ctrlUrl?>delete/<?php echo $_id?>">Delete</a>

                          </td>

                        </tr>

                    <?php endforeach;?>

                  <?php else:?>
                  <tr>

                      <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center;" colspan="6">
                         No records has been found!
                      </td>
                  </tr> 
                  <?php endif;?>

                </tbody>

              </table>

            </div>
         
        </form>
        
    </section>
    
</section>