<section class="scrollable padder">
    
    <div class="m-b-md">
        <h3 class="m-b-none font-thin" style="float: left; margin-right: 20px;"><?php echo $title;?></h3>
        <div class="clearfix"></div>
        <small>User ips who made visit to 360seha.com</small>
    </div> 
    
    <span class="clearfix"></span>

    <section class="panel panel-default" style="margin-top: 10px;">
 
       <div class="table-responsive">
          <table class="table table-striped b-t b-light">
            <thead>
              <tr>
                <th>Ip</th>
                <th>Added On</th>
              </tr>
            </thead>
            <tbody>

              <?php if($records):?>

                <?php foreach ($records as $visit):?>

                    <tr>
                      <td><?php echo $visit->ip?></td>
                      <td><?php echo date('d F Y', strtotime($visit->created_on))?></td>
                    </tr>

                <?php endforeach;?>

              <?php else:?>
                    <tr>
                        <td height="80" align="center" valign="middle" style="vertical-align:  middle; text-align: center;" colspan="7"></td>
                    </tr> 
              <?php endif;?>

            </tbody>

          </table>

        </div> 

    </section>

</section>