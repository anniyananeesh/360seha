<!-- Modal -->
<div class="modal fade bg-warning" id="send-query" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title text-uppercase font-thin"><?php echo lang('SEND AN ENQUIRY')?> to <strong><?php echo $usr->subs_title?></strong></h4>
      </div>
        <div class="modal-body">
 
            <form role="form" class="col-md-12 m-auto fl-none form" id="appointFrm">
              
                <div class="ajx_rst_ldr"></div>
                
                <div class="row">

                    <div class="col-md-5 m-l-md">
                        <label class="text-muted h5"><?php echo lang('FIRST NAME')?></label>
                        <input type="text" id="first_name" name="first_name" class="form-control"/>
                    </div>

                    <div class="col-md-5 m-l-md">
                        <label class="text-muted h5"><?php echo lang('LAST NAME')?></label>
                        <input type="text" id="last_name" name="last_name" class="form-control"/>
                        <input type="hidden" id="email_subs" name="email_subs" value="<?php echo $usr->subs_email?>"/>
                        <input type="hidden" id="title_subs" name="title_subs" value="<?php echo $usr->subs_title?>"/>
                    </div>
              
                </div> 
              
                <div class="row m-t-md">

                   <div class="col-md-10 m-l-md">
                      <label class="text-muted h5"><?php echo lang('YOUR QUERY')?></label>
                      <textarea class="form-control" rows="3" name="myappt_qry" id="myappt_qry"></textarea>
                  </div>

                </div>
              
                <div class="clearfix"></div> 
              
            </form> 
            
    </div>
        
        <div class="modal-footer text-center">
            <button type="button" id="send_qry" class="btn btn-primary font-thin text-uppercase send_qry"><?php echo lang('Send Query')?></button>  
        </div>
    </div>
  </div>
</div>