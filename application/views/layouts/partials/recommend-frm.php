<!-- Modal -->
<div class="modal fade bg-warning" id="recmndFrm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title text-uppercase font-thin">Recommend <strong><?php echo $usr->subs_title?></strong></h4>
      </div>
      <div class="modal-body">
          
          <script src="<?php echo ACTIVE_THEME?>assets/js/jquery.barrating.min.js"></script>
          <script type="text/javascript">
            $(function () {

                    $('#example-a').barrating();

            });
           </script>
           
           <style>
               
               /* BUTTONS */
/* http://hellohappy.org/css3-buttons/ */

.buttons {
    margin: 0 auto 40px auto;
    width: 345px;
}

.buttons button {
    margin: 0 10px 0 10px;
}

button.blue-pill {
    background-color: #a5b8da;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #7bc0eb), color-stop(100%, #59a6d6));
    background-image: -webkit-linear-gradient(top, #7bc0eb, #59a6d6);
    background-image: -moz-linear-gradient(top, #7bc0eb, #59a6d6);
    background-image: -ms-linear-gradient(top, #7bc0eb, #59a6d6);
    background-image: -o-linear-gradient(top, #7bc0eb, #59a6d6);
    background-image: linear-gradient(top, #7bc0eb, #59a6d6);
    border-top: 1px solid #758fba;
    border-right: 1px solid #6c84ab;
    border-bottom: 1px solid #5c6f91;
    border-left: 1px solid #6c84ab;
    -webkit-border-radius: 18px;
    -moz-border-radius: 18px;
    border-radius: 18px;
    -webkit-box-shadow: inset 0 1px 0 0 #aec3e5;
    -moz-box-shadow: inset 0 1px 0 0 #aec3e5;
    box-shadow: inset 0 1px 0 0 #aec3e5;
    color: #fff;
    font-family: 'Source Sans Pro', sans-serif;
    font-size: 12px;
    font-weight: 700;
    line-height: 1;
    padding: 8px 0;
    text-align: center;
    text-shadow: 0 -1px 1px #4f768e;
    text-transform: uppercase;
    width: 150px;
}

button.blue-pill:hover {
    background-color: #9badcc;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #71b1da), color-stop(100%, #478dba));
    background-image: -webkit-linear-gradient(top, #71b1da, #478dba);
    background-image: -moz-linear-gradient(top, #71b1da, #478dba);
    background-image: -ms-linear-gradient(top, #71b1da, #478dba);
    background-image: -o-linear-gradient(top, #71b1da, #478dba);
    background-image: linear-gradient(top, #71b1da, #478dba);
    border-top: 1px solid #4f768e;
    border-right: 1px solid #4f768e;
    border-bottom: 1px solid #4f768e;
    border-left: 1px solid #4f768e;
    cursor: pointer;
}

button.blue-pill:active {
    border: 1px solid #4f768e;
    -webkit-box-shadow: inset 0 0 8px 2px #5285a5, 0 1px 0 0 #eeeeee;
    -moz-box-shadow: inset 0 0 8px 2px #5285a5, 0 1px 0 0 #eeeeee;
    box-shadow: inset 0 0 8px 2px #5285a5, 0 1px 0 0 #eeeeee;
}

button.blue-pill.deactivated {
    opacity: .4;
}

button.blue-pill.deactivated:hover {
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #7bc0eb), color-stop(100%, #59a6d6));
    background-image: -webkit-linear-gradient(top, #7bc0eb, #59a6d6);
    background-image: -moz-linear-gradient(top, #7bc0eb, #59a6d6);
    background-image: -ms-linear-gradient(top, #7bc0eb, #59a6d6);
    background-image: -o-linear-gradient(top, #7bc0eb, #59a6d6);
    background-image: linear-gradient(top, #7bc0eb, #59a6d6);
    border-top: 1px solid #758fba;
    border-right: 1px solid #6c84ab;
    border-bottom: 1px solid #5c6f91;
    border-left: 1px solid #6c84ab;
    cursor: auto;
}

/******* EXAMPLE A *******/

.rating-a .br-widget {
    height: 52px;
}

.rating-a .br-widget a {
    display: block;
    width: 15px;
    padding: 5px 0 5px 0;
    height: 30px;
    float: left;
    background-color: #e3e3e3;
    margin: 1px;
    text-align: center;
}

.rating-a .br-widget a.br-active,
.rating-a .br-widget a.br-selected {
    background-color: #179775;
}

.rating-a .br-widget .br-current-rating {
    font-size: 20px;
    line-height: 2;
    float: left;
    padding: 0 20px 0 20px;
    color: #646464;
}

/******* EXAMPLE B *******/

.rating-b .br-widget {
    height: 25px;
}

.rating-b .br-widget a {
    display: block;
    width: 70px;
    height: 16px;
    float: left;
    background-color: #e3e3e3;
    margin: 1px;
}

.rating-b .br-widget a.br-active,
.rating-b .br-widget a.br-selected {
    background-color: #179775;
}

.rating-b .br-widget .br-current-rating {
    line-height: 1.1;
    float: left;
    padding: 0 20px 0 20px;
    color: #646464;
}

.rating-b .br-readonly a.br-active,
.rating-b .br-readonly a.br-selected {
    background-color: #cbcbcb;
}

/******* EXAMPLE C *******/

.rating-c .br-widget {
    height: 52px;
}

.rating-c .br-widget a {
    display: block;
    width: 35px;
    height: 35px;
    float: left;
    background-color: #e3e3e3;
    margin: 2px;
    text-decoration: none;
    font-size: 16px;
    font-weight: 400;
    line-height: 2.2;
    text-align: center;
    color: #b6b6b6;
}

.rating-c .br-widget a.br-active,
.rating-c .br-widget a.br-selected {
    background-color: #59a6d6;
    color: white;
}

/******* EXAMPLE D *******/

.rating-d .br-widget {
    height: 52px;
}

.rating-d .br-widget a {
    display: block;
    width: 40px;
    padding: 5px 0 5px 0;
    height: 30px;
    float: left;
    background-color: white;
    border-bottom: 2px solid #e3e3e3;
    color: #646464;
    margin: 1px;
    text-decoration: none;
    line-height: 2.1;
    text-align: center;
}

.rating-d .br-widget a span {
    color: white;
}

.rating-d .br-widget a.br-active,
.rating-d .br-widget a.br-selected {

    border-bottom: 2px solid #646464;
}

.rating-d .br-widget a:hover span,
.rating-d .br-widget a.br-current span {
    color: #646464;
}

/******* EXAMPLE E *******/

.rating-e .br-widget a {
    padding: 5px;
    color: #646464;
    text-decoration: none;
    font-size: 11px;
    font-weight: 400;
    line-height: 3;
    text-align: center;
}

.rating-e .br-widget a.br-active {
    background-color: #e3e3e3;
    color: #646464;
}

.rating-e .br-widget a.br-selected {
    background-color: #59a6d6;
    color: white;
}

/******* EXAMPLE F *******/

.rating-f .br-widget {
    height: 24px;
}

.rating-f .br-widget a {
    background: url('../img/star.png');
    width: 24px;
    height: 24px;
    display: block;
    float: left;
}

.rating-f .br-widget a:hover,
.rating-f .br-widget a.br-active,
.rating-f .br-widget a.br-selected {
    background-position: 0 24px;
}

/******* EXAMPLE G *******/

.rating-g .br-widget {
    height: 25px;
}

.rating-g .br-widget a {
    display: block;
    width: 50px;
    height: 16px;
    float: left;
    background-color: #e3e3e3;
    margin: 1px;
}

.rating-g .br-widget a.br-active,
.rating-g .br-widget a.br-selected {
    background-color: #59a6d6;
}

.rating-g .br-widget .br-current-rating {
    line-height: 1.1;
    float: left;
    padding: 0 20px 0 20px;
    color: #646464;
}

@media
only screen and (-webkit-min-device-pixel-ratio: 1.5),
only screen and (min-device-pixel-ratio : 1.5),
(min-resolution: 192dpi) {
    .rating-f .br-widget a {
        background: url('../img/star@2x.png');
        background-size: 24px 48px;
    }
}
               
           </style>
        
          <form role="form" class="col-md-12 m-auto fl-none rmdFrm">
              
              <div class="ajx_rst_ldr"></div>   
              
              <div class="m-t-md">
              	 
                 <div class="col-md-12">
                     
                     <div class="row">

                        <div class="col-md-6">
                            <label class="text-muted h5"><?php echo lang("FIRST NAME");?></label>
                            <input type="text" id="first_name" name="first_name" class="form-control" value=""/>
                        </div>

                        <div class="col-md-6">
                            <label class="text-muted h5"><?php echo lang("LAST NAME");?></label>
                            <input type="text" id="last_name" name="last_name" class="form-control" value=""/>
                        </div>

                    </div>
 
                    <div class="clearfix"></div>
                    
                    <div class="input select rating-a m-t-md">
                        <label for="example-a"><?php echo lang('Please rate your experience: *')?></label>
                        <select id="example-a" name="rblCom">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    
                </div>
 
              </div>
              
              <div class="clearfix"></div>  
              
              <div class="m-t-sm">
              	 <input type="hidden" id="subs" name="subs" value="<?php echo $this->encrypt->encode($usr->id)?>"/>
                 <div class="col-md-12">
                    <label class="text-dark h4"><?php echo lang('Message')?></label>
                    <textarea class="form-control input-sm" rows="3" name="rc_treatments" id="rc_treatments"></textarea>
                </div>
                 
              </div>
              
              <div class="clearfix"></div> 
               
            </form>
          
      </div>
      <div class="modal-footer text-center">
          <button type="button" class="btn btn-primary sbmtRecommend"><?php echo lang('Recommend')?></button>
      </div>
    </div>
  </div>
</div>