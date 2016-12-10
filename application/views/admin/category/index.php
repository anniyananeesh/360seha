<section class="scrollable padder">
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
                  <a href="<?php echo $ctrlUrl?>create/" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">Add Record</a>
                  
              </div> 
    
    <span class="clearfix"></span>
    
    <form method="post" name="search_hotels">
        <div class="row" style="margin-top: 15px; margin-bottom: 15px;"> 

            <div style="display: block; width: 120px; float: left; margin-left: 30px;">
                <select class="chosen-select pull-left" name="root" id="root"/>

                    <option value="">All </option>
                    <?php if($root):?>
                        <?php foreach ($root AS $rt):?>
                        <option value="<?php echo $rt['id']?>"><?php echo $rt['name']?></option>
                        <?php endforeach;?>
                    <?php endif;?>
                </select>
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
    
    <div class="clearfix"></div>
    
    <form method="post" name="grp_action" action="<?php echo $ctrlUrl?>grp_action/">

    <section class="panel panel-default" style="margin-top: 10px;">

            <div class="row wrapper bg-light bg-gradient">
                    
              <div class="col-sm-5 m-b-xs">
 
                  <select class="input-sm form-control input-s-lg inline v-middle" name="action">
                    <option value="order">Change Order</option>  
                  </select>
                  <button type="submit" class="btn btn-sm btn-default" id="grp_submit">Apply</button>                
              </div> 

            </div>


            <div class="table-responsive">
              <table class="table table-striped b-t b-light">
                <thead>
                  <tr>

                    <th>Name</th>
                    <th>Order</th>  
                    <th>Added On</th>
                    <th width="240">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php if($records):?>

                    <?php foreach ($records as $cat):?>

                        <tr>
 
                          <td>
                              <?php $_id = $this->encrypt->encode($cat->id_category);?>
                              <?php echo $cat->name?>
                              
                          </td>
                          <td>
                              <input type="text" name="orderby[]" id="orderby[]" style="width:30px;text-align:center" class="index_list" value="<?php echo $cat->orderby; ?>" tabindex="<?php echo $key; ?>"/>
                              <input type="hidden" name="idarray[]" id="idarray[]" value="<?php echo $_id; ?>"/>
                          </td>

                          <td>
                              <?php echo date('d F Y', strtotime($cat->created))?>
                            
                          </td>
                          <td>

                            <a class="btn btn-default btn-xs" href="<?php echo $ctrlUrl?>edit/<?php echo $_id?>">Edit</a>&nbsp;
                            <a class="btn btn-danger btn-xs delete_entry" href="<?php echo $ctrlUrl?>delete/<?php echo $_id?>">Delete</a>

                          </td>

                        </tr>

                    <?php endforeach;?>

                  <?php else:?>
                  <tr>

                      <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center;" colspan="3">
                          No records has been found!

                      </td>
                  </tr> 
                  <?php endif;?>

                </tbody>

              </table>

            </div>  
        
    </section>

    </form>

</section>