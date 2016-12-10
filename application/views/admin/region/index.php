<section class="scrollable padder">
    
              <div class="m-b-md">
                  
                  <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
                  <a href="<?php echo $ctrlUrl?>create" class="btn btn-s-md btn-success btn-rounded" style="margin-top: 17px; float: right;">Add Record</a>
                  
              </div> 
    
    <span class="clearfix"></span>
    
    <form method="post" name="search">
        <div class="row" style="margin-top: 15px; margin-bottom: 15px;"> 

            <div class="col-sm-3" style="width: 440px;">
                <select style="width: 200px" class="chosen-select pull-left m-l-md" name="city" id="city"/>

                    <option value="">All</option>

                    <?php foreach($cities as $c):?>

                        <?php $_id = $this->encrypt->encode($c->id);?>
                        <option value="<?php echo $_id;?>" <?php echo set_select('city', $_id)?>><?php echo $c->name;?></option>
                    <?php endforeach;?>

                </select>
                <input type="text" style="width: 200px" class="input-sm form-control pull-left m-r-sm" autocomplete="off" autofocus name="name" placeholder="Search Region...">
                
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
 
                        <th>Region</th>
                        <th>City</th>
                        <th>Added On</th>
                        <th width="240">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      <?php if($records):?>
                        
                        <?php foreach ($records as $city):?>
                        
                            <tr>
                             
                              <td><?php $_id = $this->encrypt->encode($city->id);?>
                                  <?php echo $city->reg_name?></td>
                              <td>
                                  <?php $city_detail = $this->city_service->get_city_by_pk($city->city_pk);?>
                                  <?php echo $city_detail->name?>
                              </td> 
                               
                              <td><?php echo date('d F Y', strtotime($city->created_on))?></td>
                              <td>
 
                                <a class="btn btn-default btn-xs" href="<?php echo $ctrlUrl?>edit/<?php echo $_id?>">Edit</a>&nbsp;
                                <a class="btn btn-danger btn-xs delete_entry" href="<?php echo $ctrlUrl?>delete/<?php echo $_id?>">Delete</a>
                                
                              </td>
                              
                            </tr>
                      
                        <?php endforeach;?>
                      
                      <?php else:?>
                      <tr>

                          <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center;" colspan="4">
                              No records has been found                              
                          </td>
                      </tr> 
                      <?php endif;?>
                      
                    </tbody>
                    
                  </table>
                    
                </div>
                
              </section>
            </section>